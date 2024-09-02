# trash_detection/models.py

from django.db import models

class TrashDetection(models.Model):
    image = models.ImageField(upload_to='uploads/')
    result_image = models.ImageField(upload_to='results/', null=True, blank=True)
    detection_result = models.JSONField(null=True, blank=True)
    created_at = models.DateTimeField(auto_now_add=True)

    def __str__(self):
        return f'Trash Detection {self.id}'
