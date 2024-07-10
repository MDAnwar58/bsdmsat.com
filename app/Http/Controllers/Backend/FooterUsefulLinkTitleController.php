<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FooterUsefulLinkTitle;
use Illuminate\Http\Request;

class FooterUsefulLinkTitleController extends Controller
{
    function get()
    {
        return FooterUsefulLinkTitle::get();
    }
    function storeOrUpdate(Request $request)
    {
        $id = $request->id;
        if ($id) {
            FooterUsefulLinkTitle::findOrFail(intval($id))->update($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'ফুটার ইউজফুল লিংক টাইটেল আপডেটেড!',
            ]);
        }else{
            FooterUsefulLinkTitle::create($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'ফুটার ইউজফুল লিংক টাইটেল এ্যাডেড!',
            ]);
        }
    }
}
