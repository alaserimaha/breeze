# trash_detection/serializers.py

from rest_framework import serializers
from .models import TrashDetection

class TrashDetectionSerializer(serializers.ModelSerializer):
    class Meta:
        model = TrashDetection
        fields = ['id', 'image', 'result_image', 'detection_result', 'created_at']
