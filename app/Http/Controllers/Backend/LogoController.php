<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LogoController extends Controller
{

    function get()
    {
        return Logo::get();
    }
    function storeOrUpdate(Request $request)
    {
        $id = $request->id;
        if ($id) {
            $logo = Logo::findOrFail(intval($id));
            if ($request->hasFile('img')) {
                $file_path = public_path() . '/upload/images/logo/' . $logo->img;

                if (File::exists($file_path)) {
                    File::delete($file_path);
                }
                $file = $request->file('img');
                $extension = $file->getClientOriginalName();
                $filename = time() . '-logo-update-' . $extension;
                $file->move('upload/images/logo', $filename);
                $logo->img = $filename;
            }
            $logo->update();

            return response()->json([
                'status' => 'success',
                'message' => 'ন্যাভবার লোগ আপডেটেড!'
            ], 200);
        } else {
            $logo = new Logo();
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $extension = $file->getClientOriginalName();
                $filename = time() . '-logo-' . $extension;
                $file->move('upload/images/logo', $filename);
                $logo->img = $filename;
            }
            $logo->save();

            return response()->json([
                'status' => 'success',
                'message' => 'ন্যাভবার লোগ এ্যাডেড!'
            ], 200);
        }
    }
}