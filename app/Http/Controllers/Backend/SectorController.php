<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    function index()
    {
        return view('pages.backend.member.index');
    }
    function get()
    {
        return Sector::get();
    }
    function storeOrUpdate(Request $request)
    {
        $id = $request->id;
        if ($id) {
            Sector::find($id)->update($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'প্রতিষ্ঠানের সেক্টর গুলো আপডেটেড!'
            ], 200);
        } else {
            Sector::create($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'প্রতিষ্ঠানের সেক্টর গুলো এ্যাডেড!'
            ], 200);
        }
    }
}