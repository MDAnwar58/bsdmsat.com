<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Topbar;
use Illuminate\Http\Request;

class TopbarController extends Controller
{
    function index()
    {
        return view('pages.backend.topbar.index');
    }
    function get()
    {
        return Topbar::get();
    }
    function storeOrUpdate(Request $request)
    {
        $id = $request->id;
        if ($id) {
            Topbar::find($id)->update($request->all());
    
            return response()->json([
                'status' => 'success',
                'message' => 'টপবার আপডেটেড!'
            ], 200);
        }else{
            Topbar::create($request->all());
            
            return response()->json([
                'status' => 'success',
                'message' => 'টপবার এ্যাডেড!'
            ], 200);
        }
    }
}
