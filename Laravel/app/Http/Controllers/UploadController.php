<?php

// app/Http/Controllers/UploadController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UploadController extends Controller
{
    public function showForm()
    {
        return view('user.uploade');
    }

    // return redirect()->route('upload.image')->with('data', $responseData);


    public function uploadImage(Request $request)
    {
        $data = session('data');

        $result_image = $data['result_image'];
        $vehicle_detected = $data['vehicle_detected'];
        $trash_detected = $data['trash_detected'];
        $proximity_found = $data['proximity_found'];

        
        return view('user.result', compact('result_image', 'vehicle_detected', 'trash_detected', 'proximity_found'));
    }
}
