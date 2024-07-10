<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryImageController extends Controller
{
    function get()
    {
        return GalleryImage::with('category')->get();
    }
    function store(Request $request)
    {
        $galleryImage = new GalleryImage();
        $galleryImage->gallery_category_id = $request->gallery_category_id;
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-gallery-' . $extension;
            $file->move('upload/images/gallery', $filename);
            $galleryImage->img = $filename;
        }
        $galleryImage->save();

        return response()->json([
            'status' => 'success',
            'message' => 'গ্যালারি ছবি এ্যাডেড!'
        ]);
    }
    function edit($id)
    {
        return GalleryImage::findOrFail(intval($id));
    }
    function update(Request $request, $id)
    {
        $galleryImage = GalleryImage::findOrFail(intval($id));
        $galleryImage->gallery_category_id = $request->gallery_category_id;
        if ($request->hasFile('img')) {
            $file_path = public_path() . '/upload/images/gallery/' . $galleryImage->img;

            if (File::exists($file_path)) {
                File::delete($file_path);
            }
            $file = $request->file('img');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-gallery-update-' . $extension;
            $file->move('upload/images/gallery', $filename);
            $galleryImage->img = $filename;
        }
        $galleryImage->update();

        return response()->json([
            'status' => 'success',
            'message' => 'গ্যালারি ছবি আপডেটেড!'
        ]);
    }
    function destroy($id)
    {
        $galleryImage = GalleryImage::findOrFail(intval($id));
        $file_path = public_path() . '/upload/images/gallery/' . $galleryImage->img;

        if (File::exists($file_path)) {
            File::delete($file_path);
        }

        $galleryImage->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'গ্যালারি ছবি ডিলিট!'
        ]);
    }
}