<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager as Image;
use Illuminate\Support\Facades\Auth;

class ImageCropController extends Controller
{
    function index()
    {
     return view('image_crop');
    }

    function upload(Request $request)
    {
     if($request->ajax())
     {
        
      $image_data = $request->image;
      
      $image_array_1 = explode(";", $image_data);
      $image_array_2 = explode(",", $image_array_1[1]);
      $data = base64_decode($image_array_2[1]);
      $image_name = time() . '.png';
      $upload_path = public_path('storage/avatar/' . $image_name);
      file_put_contents($upload_path, $data);

      Auth::user()->profile->update([ 'pic_path' => '/storage/avatar/' . $image_name]);
      return response()->json(['path' => '/storage/avatar/' . $image_name]);
      
     }
    }
}


