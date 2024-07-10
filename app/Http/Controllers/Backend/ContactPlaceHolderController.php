<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactPlaceholder;
use Illuminate\Http\Request;

class ContactPlaceHolderController extends Controller
{
    function get()
    {
        return ContactPlaceholder::get();
    }
    function storeOrUpdate(Request $request)
    {
        $id = $request->id;
        if ($id) {
            ContactPlaceholder::find($id)->update($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'কনট্যাক্ট প্যালেহোলডার আপডেটেড!'
            ]);
        }else{
            ContactPlaceholder::create($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'কনট্যাক্ট প্যালেহোলডার এ্যাডেড!'
            ]);
        }
    }
}
