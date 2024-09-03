# trash_detection/views.py

from rest_framework import status
from rest_framework.response import Response
from rest_framework.views import APIView
from PIL import Image, ImageDraw
import numpy as np
import torch
from ultralytics import YOLO
import mediapipe as mp
from io import BytesIO
import base64
from math import sqrt

# Define waste and vehicle categories
TRASH_CLASSES = {
    0: 'cardboard_box', 1: 'can', 2: 'plastic_bottle_cap', 3: 'plastic_bottle', 
    4: 'reuseable_paper', 5: 'plastic_bag', 6: 'scrap_paper', 7: 'stick', 
    8: 'plastic_cup', 9: 'snack_bag', 10: 'plastic_box', 11: 'straw', 
    12: 'plastic_cup_lid', 13: 'scrap_plastic', 14: 'cardboard_bowl', 
    15: 'plastic_cultery', 16: 'battery', 17: 'chemical_spray_can', 
    18: 'chemical_plastic_bottle', 19: 'chemical_plastic_gallon', 
    20: 'light_bulb', 21: 'paint_bucket'
}

VEHICLE_CLASSES = {2: 'Car', 3: 'Motorcycle', 5: 'Bus', 6: 'Train', 7: 'Truck'}
HELPER_TRASH_CLASSES = {
    39: 'Bottle', 40: 'Wine Glass', 41: 'Cup', 42: 'Fork', 43: 'Knife', 
    44: 'Spoon', 45: 'Bowl', 46: 'Banana', 47: 'Apple', 48: 'Sandwich', 
    49: 'Orange', 50: 'Broccoli', 51: 'Carrot', 52: 'Hot Dog', 53: 'Pizza', 
    54: 'Donut', 55: 'Cake', 56: 'Can', 57: 'Paper', 58: 'Tissue'
}

# Load the YOLO models
trash_model = YOLO("django/breeze/trash_detection/best_trash.pt")  # Main model for trash detection
helper_model = YOLO("yolov8m.pt")  # Helper model for vehicles and additional trash detection

class TrashDetectionView(APIView):
    def post(self, request, format=None):
        image_file = request.FILES.get('image')
        if not image_file:
            return Response({'error': 'No image provided'}, status=status.HTTP_400_BAD_REQUEST)
        
        # Load image from uploaded file
        image = Image.open(image_file)
        image = image.resize((612, 408))  # Resize image
        image_np = np.array(image)

        # Perform trash detection with the `best_trash.pt` model
        trash_results = trash_model(image_np)
        trash_result = trash_results[0]
        trash_bboxes = np.array(trash_result.boxes.xyxy.cpu(), dtype="int")
        trash_classes = np.array(trash_result.boxes.cls.cpu(), dtype="int")

        # Perform additional detection with the `yolov8m.pt` model
        helper_results = helper_model(image_np)
        helper_result = helper_results[0]
        helper_bboxes = np.array(helper_result.boxes.xyxy.cpu(), dtype="int")
        helper_classes = np.array(helper_result.boxes.cls.cpu(), dtype="int")

        # Create a draw object for the PIL image
        draw = ImageDraw.Draw(image)
        object_detected_counter = {}

        # Process trash detections from `best_trash.pt`
        for cls, bbox in zip(trash_classes, trash_bboxes):
            (x, y, x2, y2) = bbox
            class_name = TRASH_CLASSES.get(cls, "Unknown")

            # Increment the counter for the detected class
            if class_name not in object_detected_counter:
                object_detected_counter[class_name] = 0
            object_detected_counter[class_name] += 1

            # Draw rectangle around detected trash
            draw.rectangle([x, y, x2, y2], outline="red", width=3)
            draw.text((x, y), f"{class_name}", fill="red")

        # Process helper detections for vehicles and additional trash items
        for cls, bbox in zip(helper_classes, helper_bboxes):
            (x, y, x2, y2) = bbox
            if VEHICLE_CLASSES.get(cls) or HELPER_TRASH_CLASSES.get(cls):
                class_name = VEHICLE_CLASSES.get(cls, HELPER_TRASH_CLASSES.get(cls, "Unknown"))

                # Increment the counter for the detected class
                if class_name not in object_detected_counter:
                    object_detected_counter[class_name] = 0
                object_detected_counter[class_name] += 1

                # Draw rectangle around detected objects
                draw.rectangle([x, y, x2, y2], outline="green", width=2)
                draw.text((x, y), f"{class_name}", fill="green")

        # Detect hands
        proximity_found, hand_boxes = self.detect_hands(image, draw, trash_bboxes, trash_classes)

        # Save result image
        result_image_base64 = self.image_to_base64(image)

        # Prepare response data
        response_data = {
            'result_image': result_image_base64,
            'vehicle_detected': self.detect_vehicle(object_detected_counter),
            'trash_detected': self.detect_trash(object_detected_counter),
            'hand_boxes': hand_boxes,
            'proximity_found': proximity_found
        }
        return Response(response_data, status=status.HTTP_200_OK)

    def detect_hands(self, image, draw, trash_bboxes, trash_classes):
        # Convert image to numpy array for Mediapipe
        image_rgb = image.convert("RGB")
        image_np = np.array(image_rgb)

        # Use Mediapipe to detect hands
        mp_hands = mp.solutions.hands.Hands(static_image_mode=False, max_num_hands=1, min_detection_confidence=0.1)
        hand_results = mp_hands.process(image_np)

        hand_boxes = []
        proximity_found = False
        if hand_results.multi_hand_landmarks:
            for hand_landmarks in hand_results.multi_hand_landmarks:
                x_coords = [landmark.x for landmark in hand_landmarks.landmark]
                y_coords = [landmark.y for landmark in hand_landmarks.landmark]

                # Convert coordinates from normalized to pixel values
                x_min = int(min(x_coords) * image.width)
                y_min = int(min(y_coords) * image.height)
                x_max = int(max(x_coords) * image.width)
                y_max = int(max(y_coords) * image.height)

                # Draw green rectangle around detected hand
                draw.rectangle([x_min, y_min, x_max, y_max], outline="green", width=3)
                hand_boxes.append([x_min, y_min, x_max, y_max])

        # Check for proximity between hands and trash
        if hand_boxes:
            trash_boxes = [box for *box, cls in zip(trash_bboxes, trash_classes) if cls in TRASH_CLASSES.keys()]
            for hand_box in hand_boxes:
                for trash_box in trash_boxes:
                    try:
                        distance = self.calculate_distance(hand_box, trash_box)
                        if distance < 50:  # Threshold for proximity in pixels
                            proximity_found = True
                            break
                    except ValueError as e:
                        print(f"Error calculating distance: {e}")
                if proximity_found:
                    break

        return proximity_found, hand_boxes

    def calculate_distance(self, box1, box2):
        if len(box1) != 4 or len(box2) != 4:
            raise ValueError("Bounding boxes should have exactly 4 values: x_min, y_min, x_max, y_max")

        x1_min, y1_min, x1_max, y1_max = box1
        x2_min, y2_min, x2_max, y2_max = box2

        # Calculate center points of the bounding boxes
        x1_center = (x1_min + x1_max) / 2
        y1_center = (y1_min + y1_max) / 2
        x2_center = (x2_min + x2_max) / 2
        y2_center = (y2_min + y2_max) / 2

        # Calculate Euclidean distance
        return sqrt((x2_center - x1_center) ** 2 + (y2_center - y1_center) ** 2)

    def image_to_base64(self, image):
        """ Convert image to a base64-encoded string. """
        # Ensure the image is in RGB mode (JPEG does not support RGBA)
        if image.mode == 'RGBA':
            image = image.convert('RGB')
        
        buffered = BytesIO()
        image.save(buffered, format="JPEG")
        return base64.b64encode(buffered.getvalue()).decode()
