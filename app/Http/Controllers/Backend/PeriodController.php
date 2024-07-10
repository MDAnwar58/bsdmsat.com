<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    function index()
    {
        return view('pages.backend.period.index');
    }
    function get()
    {
        return Period::get();
    }
    function store(Request $request)
    {
        $No = $request->No;
        $check = Period::where('No', $No)->first();
        if ($check) {
            return response()->json([
                'status' => 'fail',
                'message' => 'এই ক্র:নং নাম্বারটি আগে ব্যবহআর হয়েছে!'
            ], 200);
        } else {
            Period::create($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'পিরিয়ড এ্যাডেড!'
            ], 200);
        }
    }
    function edit($id)
    {
        return Period::findOrFail(intval($id));
    }
    function update(Request $request, $id)
    {
        Period::findOrFail(intval($id))->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'পিরিয়ড আপডেটেড!'
        ], 200);
    }
    function destroy($id)
    {
        $period = Period::findOrFail(intval($id));
        $period->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'পিরিয়ড ডিলিট!'
        ]);
    }
}