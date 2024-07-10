<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;

class GalleryCategoryController extends Controller
{
    function get()
    {
        return GalleryCategory::get();
    }
    function store(Request $request)
    {
        GalleryCategory::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'গ্যালারি ক্যাটাগরি এ্যাডেড!'
        ]);
    }
    function edit($id)
    {
        return GalleryCategory::findOrFail(intval($id));
    }
    function update(Request $request, $id)
    {
        GalleryCategory::findOrFail(intval($id))->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'গ্যালারি ক্যাটাগরি আপডেটেড!'
        ]);
    }
    function destroy($id)
    {
        $galleryCategory = GalleryCategory::findOrFail(intval($id));
        $galleryCategory->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'গ্যালারি ক্যাটাগরি ডিলিট!'
        ]);
    }
}