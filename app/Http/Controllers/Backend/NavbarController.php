<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Navbar;
use Illuminate\Http\Request;

class NavbarController extends Controller
{
    function index()
    {
        return view('pages.backend.navbar.index');
    }
    function get()
    {
        return Navbar::get();
    }
    function storeOrUpdate(Request $request)
    {
        $id = $request->id;
        if ($id) {
            Navbar::find($id)->update($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'ন্যাভবার আপডেটেড!'
            ], 200);
        } else {
            Navbar::create($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'ন্যাভবার এ্যাডেড!'
            ], 200);
        }
    }
    // function edit($id)
    // {
    //     return Navbar::findOrFail(intval($id));
    // }
    // function update(Request $request, $id)
    // {
    //     Navbar::find($id)->update($request->all());

    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'Navbar Updated!'
    //     ], 200);
    // }
    // function destroy($id)
    // {
    //     $topbar = Navbar::findOrFail(intval($id));
    //     $topbar->delete();

    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'Topbar Deleted!'
    //     ], 200);
    // }
}