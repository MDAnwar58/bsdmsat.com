<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    function index()
    {
        $sliders = Slider::all();
        return view('pages.backend.slider.index', compact('sliders'));
    }
    function getSlider()
    {
        return Slider::get();
    }
    function store(Request $request)
    {
        $slider = new Slider();
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-slider-' . $extension;
            $file->move('upload/images/sliders', $filename);
            $slider->img = $filename;
        }
        $slider->save();

        return response()->json([
            'status' => 'success',
            'message' => 'সেলাইডার এ্যাডেড!',
        ], 200);
    }

    function edit($id)
    {
        return Slider::findOrFail(intval($id));
    }
    function update(Request $request, $id)
    {
        $slider = Slider::findOrFail(intval($id));
        if ($request->hasFile('img')) {
            $file_path = public_path() . '/upload/images/sliders/' . $slider->img;

            if (File::exists($file_path)) {
                File::delete($file_path);
            }
            $file = $request->file('img');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-slider-update-' . $extension;
            $file->move('upload/images/sliders', $filename);
            $slider->img = $filename;
        }
        $slider->update();

        return response()->json([
            'status' => 'success',
            'message' => 'সেলাইডার আপডেটেড!',
        ], 200);
    }
    function destroy($id)
    {
        $slider = Slider::findOrFail(intval($id));
        $file_path = public_path() . '/upload/images/sliders/' . $slider->img;

        if (File::exists($file_path)) {
            File::delete($file_path);
        }
        $slider->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'সেলাইডার ডিলিট!',
        ], 200);
    }
}