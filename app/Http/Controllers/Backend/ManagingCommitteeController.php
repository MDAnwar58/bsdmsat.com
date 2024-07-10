<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ManagingCommittee;
use Illuminate\Http\Request;

class ManagingCommitteeController extends Controller
{
    function index()
    {
        return view('pages.backend.managing_committee.index');
    }
    function get()
    {
        return ManagingCommittee::get();
    }
    function store(Request $request)
    {
        ManagingCommittee::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'ম্যানেজিং কমিটির তথ্য এ্যাডেড!'
        ], 200);
    }
    function edit($id)
    {
        return ManagingCommittee::findOrFail(intval($id));
    }
    function update(Request $request, $id)
    {
        ManagingCommittee::findOrFail(intval($id))->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'ম্যানেজিং কমিটির তথ্য আপডেটেড!'
        ], 200);
    }
    function destroy($id)
    {
        $managing_committee = ManagingCommittee::findOrFail(intval($id));
        $managing_committee->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'ম্যানেজিং কমিটির তথ্য ডিলিট!'
        ], 200);
    }
}
