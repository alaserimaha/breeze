<?php

// app/Http/Controllers/UploadController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UploadController extends Controller
{
    public function showForm()
    {
        return view('upload');
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $image = $request->file('image');
        $path = $image->store('uploads', 'public');

        // Prepare the API request
        $response = Http::attach(
            'image', file_get_contents(storage_path('app/public/' . $path)), 'image.jpg'
        )->post(env('DJANGO_API_URL') . '/process-image/');

        // Process the response from Django
        $resultPath = $response->json()['result_path'];

        return view('result', ['result_path' => $resultPath]);
    }
}
