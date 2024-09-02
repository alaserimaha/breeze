from django.urls import path
from .views import TrashDetectionView

urlpatterns = [
    path('process-image/', TrashDetectionView.as_view(), name='trash-detection'),
]
