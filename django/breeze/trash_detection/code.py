import cv2
from ultralytics import YOLO
import numpy as np
from PIL import Image, ImageDraw
import mediapipe as mp
from math import sqrt

# Define the waste categories for the best.pt model
TRASH_CLASSES = {
    0: 'cardboard_box',
    1: 'can',
    2: 'plastic_bottle_cap',
    3: 'plastic_bottle',
    4: 'reuseable_paper',
    5: 'plastic_bag',
    6: 'scrap_paper',
    7: 'stick',
    8: 'plastic_cup',
    9: 'snack_bag',
    10: 'plastic_box',
    11: 'straw',
    12: 'plastic_cup_lid',
    13: 'scrap_plastic',
    14: 'cardboard_bowl',
    15: 'plastic_cultery',
    16: 'battery',
    17: 'chemical_spray_can',
    18: 'chemical_plastic_bottle',
    19: 'chemical_plastic_gallon',
    20: 'light_bulb',
    21: 'paint_bucket'
}

# Vehicle and other classes for the helper model
VEHICLE_CLASSES = {2: 'Car', 3: 'Motorcycle', 5: 'Bus', 6: 'Train', 7: 'Truck'}
HELPER_TRASH_CLASSES = {
    39: 'Bottle', 40: 'Wine Glass', 41: 'Cup', 42: 'Fork', 43: 'Knife', 44: 'Spoon', 
    45: 'Bowl', 46: 'Banana', 47: 'Apple', 48: 'Sandwich', 49: 'Orange', 50: 'Broccoli', 
    51: 'Carrot', 52: 'Hot Dog', 53: 'Pizza', 54: 'Donut', 55: 'Cake', 56: 'Can', 57: 'Paper', 58: 'Tissue'
}

# Load the YOLO models
trash_model = YOLO("best_trash.pt")  # Main model for trash detection
helper_model = YOLO("yolov8m.pt")  # Helper model for vehicles, hands, and additional trash detection

# Open the video file
cap = cv2.VideoCapture('vid3.mov')

while cap.isOpened():
    ret, frame = cap.read()
    if not ret:
        print("Finished processing video or failed to grab frame")
        break

    # Perform trash detection with the best_trash.pt model
    trash_results = trash_model(frame, device="mps")
    trash_result = trash_results[0]
    trash_bboxes = np.array(trash_result.boxes.xyxy.cpu(), dtype="int")
    trash_classes = np.array(trash_result.boxes.cls.cpu(), dtype="int")

    # Perform additional detection with the yolov8m.pt model
    helper_results = helper_model(frame, device="mps")
    helper_result = helper_results[0]
    helper_bboxes = np.array(helper_result.boxes.xyxy.cpu(), dtype="int")
    helper_classes = np.array(helper_result.boxes.cls.cpu(), dtype="int")

    # Process trash detections from best_trash.pt
    for cls, bbox in zip(trash_classes, trash_bboxes):
        (x, y, x2, y2) = bbox
        class_name = TRASH_CLASSES.get(cls, "Unknown")

        # Draw rectangle around detected trash
        cv2.rectangle(frame, (x, y), (x2, y2), (0, 0, 225), 4)
        # Put class label text on the frame
        cv2.putText(frame, class_name, (x, y - 5), cv2.FONT_HERSHEY_PLAIN, 2, (0, 0, 225), 4)

    # Process helper detections for vehicles, hands, and additional trash items
    for cls, bbox in zip(helper_classes, helper_bboxes):
        (x, y, x2, y2) = bbox
        if VEHICLE_CLASSES.get(cls) or HELPER_TRASH_CLASSES.get(cls):
            class_name = VEHICLE_CLASSES.get(cls, HELPER_TRASH_CLASSES.get(cls, "Unknown"))

            # Draw rectangle around detected objects
            cv2.rectangle(frame, (x, y), (x2, y2), (0, 255, 0), 2)
            # Put class label text on the frame
            cv2.putText(frame, class_name, (x, y - 5), cv2.FONT_HERSHEY_PLAIN, 2, (0, 255, 0), 4)

    # Integrate hand detection using Mediapipe
    mp_hands = mp.solutions.hands.Hands(static_image_mode=False, max_num_hands=1, min_detection_confidence=0.1)
    image_rgb = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)
    hand_results = mp_hands.process(image_rgb)

    if hand_results.multi_hand_landmarks:
        for hand_landmarks in hand_results.multi_hand_landmarks:
            x_coords = [landmark.x for landmark in hand_landmarks.landmark]
            y_coords = [landmark.y for landmark in hand_landmarks.landmark]

            x_min = int(min(x_coords) * frame.shape[1])
            y_min = int(min(y_coords) * frame.shape[0])
            x_max = int(max(x_coords) * frame.shape[1])
            y_max = int(max(y_coords) * frame.shape[0])

            # Draw rectangle around detected hands
            cv2.rectangle(frame, (x_min, y_min), (x_max, y_max), (255, 0, 0), 4)

    # Display the frame
    cv2.imshow("Video", frame)
    key = cv2.waitKey(1)
    if key == 27:  # ESC key to exit
        break

cap.release()
cv2.destroyAllWindows()