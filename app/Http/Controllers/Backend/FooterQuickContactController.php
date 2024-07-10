<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FooterQuickContact;
use Illuminate\Http\Request;

class FooterQuickContactController extends Controller
{
    function get()
    {
        return FooterQuickContact::get();
    }
    function storeOrUpdate(Request $request)
    {
        $id = $request->id;
        if ($id) {
            FooterQuickContact::findOrFail(intval($id))->update($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'ফুটার কুইক কনট্যাক্ট আপডেটেড!'
            ]);
        }else{
            FooterQuickContact::create($request->all());
            
            return response()->json([
                'status' => 'success',
                'message' => 'ফুটার কুইক কনট্যাক্ট এ্যাডেড!'
            ]);
        }
    }
}
