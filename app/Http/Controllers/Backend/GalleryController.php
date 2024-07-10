<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    function index()
    {
        return view('pages.backend.gallery.index');
    }
    function get()
    {
        return Gallery::get();
    }
    function storeOrUpdate(Request $request)
    {
        $id = $request->id;
        if ($id) {
            Gallery::find($id)->update($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'গ্যালারি আপডেটেড!'
            ]);
        }else{
            Gallery::create($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'গ্যালারি এ্যাডেড!'
            ]);
        }
    }
}
