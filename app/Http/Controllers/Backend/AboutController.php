<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    function index()
    {
        $abouts = About::get();
        return view('pages.backend.about.index', compact('abouts'));    
    }
    function get()
    {
        return About::get();
    }
    function storeOrUpdate(Request $request)
    {
        $id = $request->id;
        if ($id) {
            // return $request->all();
            $about = About::findOrFail(intval($id));
            $about->title = $request->title;
            $about->name = $request->name;
            $about->short_des = $request->short_des;
            if ($request->hasFile('img')) {
                $file_path = public_path() . '/upload/images/about/' . $about->img;
    
                if (File::exists($file_path)) {
                    File::delete($file_path);
                }
                $file = $request->file('img');
                $extension = $file->getClientOriginalName();
                $filename = time() . '-about-update-' . $extension;
                $file->move('upload/images/about', $filename);
                $about->img = $filename;
            }
            $about->des = $request->des;
            $about->extraDes = $request->extraDes;
            $about->update();

            return response()->json([
                'status' => 'success',
                'message' => 'মাদ্রাসা সম্পর্কিত তথ্য আপডেটেড!'
            ]);
        }else{
            $about = new About();
            $about->title = $request->title;
            $about->name = $request->name;
            $about->short_des = $request->short_des;
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $extension = $file->getClientOriginalName();
                $filename = time() . '-about-' . $extension;
                $file->move('upload/images/about', $filename);
                $about->img = $filename;
            }
            $about->des = $request->des;
            $about->extraDes = $request->extraDes;
            $about->save();

            return response()->json([
                'status' => 'success',
                'message' => 'মাদ্রাসা সম্পর্কিত তথ্য এ্যাডেড!'
            ]);
        }
    }
}
