# trash_detection/views.py

from rest_framework import status
from rest_framework.response import Response
from rest_framework.views import APIView
from PIL import Image, ImageDraw
import numpy as np
import torch
import mediapipe as mp
from io import BytesIO
import base64
from math import sqrt

# Define vehicle and trash class names
vehicle_classes = {2: 'Car', 3: 'Motorcycle', 5: 'Bus', 6: 'Train', 7: 'Truck'}
trash_classes = {39: 'Bottle', 40: 'Wine Glass', 41: 'Cup'}

class TrashDetectionView(APIView):
    def post(self, request, format=None):
        image_file = request.FILES.get('image')
        if not image_file:
            return Response({'error': 'No image provided'}, status=status.HTTP_400_BAD_REQUEST)
        
        # Load image from uploaded file
        image = Image.open(image_file)
        image = image.resize((612, 408))  # Resize image

        # Load YOLOv5 model
        model = torch.hub.load('ultralytics/yolov5', 'yolov5s')

        # Perform inference on the image
        results = model(image)

        # Process detections
        filtered_detections = self.filter_detections(results)
        draw = ImageDraw.Draw(image)
        object_detected_counter = self.process_detections(filtered_detections, draw)
        
        # Detect trash
        trash_detected_counter = self.detect_trash(object_detected_counter)

        # Detect hands
        proximity_found, hand_boxes = self.detect_hands(image, draw)

        # Save result image
        result_image_base64 = self.image_to_base64(image)

        # Prepare response data
        response_data = {
            'result_image': result_image_base64,
            'detection_result': object_detected_counter,
            'trash_detected': trash_detected_counter,
            'proximity_found': proximity_found
        }
        return Response(response_data, status=status.HTTP_200_OK)

    def filter_detections(self, results):
        # Filter detections by class
        car_results = results.xyxy[0][results.xyxy[0][:, 5] == 2]  # Class 2: Car
        motorcycle_results = results.xyxy[0][results.xyxy[0][:, 5] == 3]  # Class 3: Motorcycle
        bus_results = results.xyxy[0][results.xyxy[0][:, 5] == 5]  # Class 5: Bus
        train_results = results.xyxy[0][results.xyxy[0][:, 5] == 6]  # Class 6: Train
        truck_results = results.xyxy[0][results.xyxy[0][:, 5] == 7]  # Class 7: Truck
        bottle_results = results.xyxy[0][results.xyxy[0][:, 5] == 39]  # Class 39: Bottle
        wine_glass_results = results.xyxy[0][results.xyxy[0][:, 5] == 40]  # Class 40: Wine Glass
        cup_results = results.xyxy[0][results.xyxy[0][:, 5] == 41]  # Class 41: Cup
        return torch.cat((car_results, motorcycle_results, bus_results, train_results, truck_results, bottle_results, wine_glass_results, cup_results), 0)

    def process_detections(self, detections, draw):
        object_detected_counter = {}
        for i, (*box, conf, cls) in enumerate(detections, 1):
            class_id = int(cls)
            class_name = vehicle_classes.get(class_id, trash_classes.get(class_id, f"Class {class_id}"))

            # Increment the counter for the detected class
            if class_name not in object_detected_counter:
                object_detected_counter[class_name] = 0
            object_detected_counter[class_name] += 1

            # Convert coordinates to integers
            x1, y1, x2, y2 = map(int, box)

            # Assign colors based on class name
            color = "red" if class_name == 'Car' else \
                    "blue" if class_name == 'Motorcycle' else \
                    "green" if class_name == 'Bus' else \
                    "yellow" if class_name == 'Train' else \
                    "black" if class_name == 'Truck' else \
                    "cyan" if class_name == 'Bottle' else \
                    "magenta" if class_name == 'Wine Glass' else \
                    "orange"

            draw.rectangle([x1, y1, x2, y2], outline=color, width=3)
            draw.text((x1, y1), f"{class_name} {conf:.2f}", fill=color)

        return object_detected_counter

    def detect_trash(self, detections):
        trash_detected = {name: count for name, count in detections.items() if name in trash_classes.values()}
        return trash_detected

    def detect_hands(self, image, draw):
        # Convert image to numpy array for Mediapipe
        image_rgb = image.convert("RGB")
        image_np = np.array(image_rgb)

        # Use Mediapipe to detect hands
        mp_hands = mp.solutions.hands.Hands(static_image_mode=True, max_num_hands=2, min_detection_confidence=0.5)
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
            trash_boxes = [box for *box, conf, cls in detections if int(cls) in trash_classes.keys()]
            for hand_box in hand_boxes:
                for trash_box in trash_boxes:
                    try:
                        distance = self.calculate_distance(hand_box, trash_box)
                        if distance > 20:  # Threshold for proximity in pixels
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
        buffered = BytesIO()
        image.save(buffered, format="JPEG")
        return base64.b64encode(buffered.getvalue()).decode()
