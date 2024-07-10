<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Land;
use Illuminate\Http\Request;

class LandController extends Controller
{
    function get()
    {
        return Land::get();
    }
    function store(Request $request)
    {
        Land::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => ' 	জমির পরিমান এ্যাডেড!'
        ]);
    }
    function edit($id)
    {
        return Land::findOrFail(intval($id));
    }
    function update(Request $request, $id)
    {
        Land::findOrFail(intval($id))->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => ' 	জমির পরিমান আপডেটেড!'
        ]);
    }
    function destroy($id)
    {
        $land = Land::findOrFail(intval($id));
        $land->delete();

        return response()->json([
            'status' => 'success',
            'message' => ' 	জমির পরিমান ডিলিট!'
        ]);
    }
}
