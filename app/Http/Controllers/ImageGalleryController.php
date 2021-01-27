<?php

namespace App\Http\Controllers;

use App\ImageGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageGalleryController extends Controller
{
    //
    public function imageUpload (Request $request) {

        if ($request->hasFile('image')) {
            //  Let's do everything here
            if ($request->file('image')->isValid()) {
                //
                $validated = $request->validate([
                    'tag' => 'string|max:255',
                    'image' => 'mimes:jpg,jpeg,png|max:5096',
                ]);
                $file_name = $request->file('image')->getClientOriginalName();
                $file_name = pathinfo($file_name, PATHINFO_FILENAME);
                $file_name = str_replace(' ','_', $file_name);
                $file_name = $file_name."_".time();
                $extension = $request->file('image')->extension();
                $file_with_ext = $file_name.".".$extension;
                $request->file('image')->storeAs('/public', $file_with_ext);
                $url = Storage::url($file_with_ext);
                $file = ImageGallery::create([
                    'image_src' => $url,
                    'tags' => $request->tags,
                ]);

                return response()->json(['status' => 'success', 'image_src' => $url, 'msg' => 'Uploaded successfully']);
            }
        }

        return response()->json(['status' => 'error', 'msg' => 'Could not upload image']);
    }

    public function viewUploads () {

        $images = ImageGallery::all();
        return response()->json(['status'=>'success', 'data' => $images->toArray()]);
    }

}
