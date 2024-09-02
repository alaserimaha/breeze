<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;

class ImageUpload extends Component
{
    use WithFileUploads;

    public $image;
    public $imageName = 'Upload the infraction image';
    public $uploading = false;

    public function updatedImage()
    {
        $this->imageName = $this->image->getClientOriginalName();
    }

    public function upload()
    {
        $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $this->uploading = true;

        $path = $this->image->store('uploads', 'public');

        // Prepare API request
        $response = Http::attach(
            'image', file_get_contents(storage_path('app/public/' . $path)), 'image.jpg'
        )->post(route('upload.image'));

        $responseData = $response->json();

        // Process response data as needed
        $this->uploading = false;
    }

    public function render()
    {
        return view('livewire.image-upload');
    }

    //sub()
    public function submit()
    {
        $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $this->uploading = true;

        $image = $this->image;
        $path = $image->store('uploads', 'public');

        // Prepare the API request
        $response = Http::attach(
            'image',
            file_get_contents(storage_path('app/public/' . $path)),
            'image.jpg'
        )->post(env('DJANGO_API_URL') . '/trash-detection/process-image/');

        $responseData = $response->json();

        return redirect()->route('upload.image')->with('data', $responseData);
    }
}

