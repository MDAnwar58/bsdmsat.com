<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\Empty_;

class TeacherController extends Controller
{
    function index()
    {
        return view('pages.backend.teacher.index');
    }
    function get()
    {
        return Teacher::get();
    }
    function store(Request $request)
    {
        $slug = $this->generateSlug($request->name);
        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->slug = $slug;
        $teacher->position = $request->position;
        $teacher->indexNo = $request->indexNo;
        $teacher->dateOfBirth = $request->dateOfBirth;
        $teacher->joiningDate = $request->joiningDate;
        $teacher->educationalQualification = $request->educationalQualification;
        $teacher->address = $request->address;
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-teacher-' . $extension;
            $file->move('upload/images/teachers', $filename);
            $teacher->img = $filename;
        }
        $teacher->save();

        return response()->json([
            'status' => 'success',
            'message' => 'শিক্ষকের তথ্য এ্যাডেড!'
        ]);
    }
    function generateSlug($name)
    {
        $teacher = Teacher::where('name', $name)->get();
        if ($teacher->count() > 0) {
            $count = $teacher->count();
            $slug = str_replace(' ', '-', $name) . '-' . $count;
        } else {
            $slug = str_replace(' ', '-', $name);
        }
        return $slug;
    }
    function edit($id)
    {
        return Teacher::findOrFail(intval($id));
    }
    function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail(intval($id));

        if ($teacher->name != $request->name) {
            $slug = $this->generateSlug($request->name);
        } else {
            $slug = $teacher->slug;
        }

        $teacher->name = $request->name;
        $teacher->slug = $slug;
        $teacher->position = $request->position;
        $teacher->indexNo = $request->indexNo;
        $teacher->dateOfBirth = $request->dateOfBirth;
        $teacher->joiningDate = $request->joiningDate;
        $teacher->educationalQualification = $request->educationalQualification;
        $teacher->address = $request->address;
        if ($request->hasFile('img')) {
            $file_path = public_path() . '/upload/images/teachers/' . $teacher->img;

            if (File::exists($file_path)) {
                File::delete($file_path);
            }
            $file = $request->file('img');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-teacher-update-' . $extension;
            $file->move('upload/images/teachers', $filename);
            $teacher->img = $filename;
        }
        $teacher->update();

        return response()->json([
            'status' => 'success',
            'message' => 'শিক্ষকের তথ্য আপডেটেড!'
        ]);
    }
    function destroy($id)
    {
        $teacher = Teacher::findOrFail(intval($id));
        $file_path = public_path() . '/upload/images/teachers/' . $teacher->img;

        if (File::exists($file_path)) {
            File::delete($file_path);
        }
        $teacher->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'শিক্ষকের তথ্য ডিলিট!'
        ]);
    }
}