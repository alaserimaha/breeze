# my_django_project/urls.py

from django.contrib import admin
from django.urls import include, path

urlpatterns = [
    path('admin/', admin.site.urls),
    path('trash-detection/', include('trash_detection.urls')),
]

