<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function index()
    {
        return view('pages.backend.contact.index');
    }
    function get()
    {
        return Contact::get();
    }
    function storeOrUpdate(Request $request)
    {
        $id = $request->id;
        if ($id) {
            Contact::find($id)->update($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'কনট্যাক্ট কন্টেন্ট আপডেটেড!'
            ]);
        }else{
            Contact::create($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'কনট্যাক্ট কন্টেন্ট এ্যাডেড!'
            ]);
        }
    }
}
