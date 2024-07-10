<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NoticeController extends Controller
{
    function index()
    {
        return view('pages.backend.notice.index');
    }
    function get()
    {
        return Notice::get();
    }
    function store(Request $request)
    {
        $notice = new Notice();
        $notice->title = $request->title;
        $notice->content = $request->content;
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-notice-' . $extension;
            $file->move('upload/images/notice', $filename);
            $notice->img = $filename;
        }
        $notice->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Notice Created!'
        ]);
    }
    function edit($id)
    {
        return Notice::findOrFail(intval($id));
    }
    function update(Request $request, $id)
    {
        $notice = Notice::findOrFail(intval($id));
        $notice->title = $request->title;
        $notice->content = $request->content;
        if ($request->hasFile('img')) {
            $file_path = public_path() . '/upload/images/notice/' . $notice->img;

            if (File::exists($file_path)) {
                File::delete($file_path);
            }
            $file = $request->file('img');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-notice-update-' . $extension;
            $file->move('upload/images/notice', $filename);
            $notice->img = $filename;
        }
        $notice->update();

        return response()->json([
            'status' => 'success',
            'message' => 'Notice Updated!'
        ]);
    }
    function destroy($id)
    {
        $notice = Notice::findOrFail(intval($id));
        $file_path = public_path() . '/upload/images/notice/' . $notice->img;

        if (File::exists($file_path)) {
            File::delete($file_path);
        }
        $notice->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Notice Deleted!'
        ]);
    }
}