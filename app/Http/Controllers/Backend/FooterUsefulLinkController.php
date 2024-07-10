<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FooterUsefulLink;
use Illuminate\Http\Request;

class FooterUsefulLinkController extends Controller
{
    function get()
    {
        return FooterUsefulLink::with('navbar')->get();
    }
    function store(Request $request)
    {
        FooterUsefulLink::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'ফুটার ইউজফুল লিংক এ্যাডেড!'
        ]);
    }
    function edit($id)
    {
        return FooterUsefulLink::findOrFail(intval($id));
    }
    function update(Request $request, $id)
    {
        FooterUsefulLink::findOrFail(intval($id))->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'ফুটার ইউজফুল লিংক আপডেটেড!'
        ]);
    }
    function destroy($id)
    {
        $footerUsefulLink = FooterUsefulLink::findOrFail(intval($id));
        $footerUsefulLink->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'ফুটার ইউজফুল লিংক ডিলিট!'
        ]);
    }
}
