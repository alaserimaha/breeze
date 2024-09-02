# my_django_project/urls.py

from django.contrib import admin
from django.urls import path
from django.conf import settings
from django.conf.urls.static import static
from trash_detection import views

urlpatterns = [
    path('admin/', admin.site.urls),
    path('api/v1/trash-detection/', views.TrashDetectionView.as_view(), name='trash-detection'),
] + static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)
