<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\OfficeWorker;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OfficeWorkerController extends Controller
{
    function index()
    {
        return view('pages.backend.office_worker.index');
    }
    function get()
    {
        return OfficeWorker::get();
    }
    function store(Request $request)
    {
        $slug = $this->generateSlug($request->name);
        $office_worker = new OfficeWorker();
        $office_worker->name = $request->name;
        $office_worker->slug = $slug;
        $office_worker->position = $request->position;
        $office_worker->indexNo = $request->indexNo;
        $office_worker->dateOfBirth = $request->dateOfBirth;
        $office_worker->joiningDate = $request->joiningDate;
        $office_worker->educationalQualification = $request->educationalQualification;
        $office_worker->address = $request->address;
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-office_worker-' . $extension;
            $file->move('upload/images/office_worker', $filename);
            $office_worker->img = $filename;
        }
        $office_worker->save();

        return response()->json([
            'status' => 'success',
            'message' => 'অফিস কর্মচারির তথ্য এ্যাডেড!'
        ]);
    }
    function generateSlug($name)
    {
        $office_worker = OfficeWorker::where('name', $name)->get();
        if ($office_worker->count() > 0) {
            $count = $office_worker->count();
            $slug = str_replace(' ', '-', $name) . '-' . $count;
        } else {
            $slug = str_replace(' ', '-', $name);
        }
        return $slug;
    }
    function edit($id)
    {
        return OfficeWorker::findOrFail(intval($id));
    }
    function update(Request $request, $id)
    {
        $office_worker = OfficeWorker::findOrFail(intval($id));
        if ($office_worker->name != $request->name) {
            $slug = $this->generateSlug($request->name);
        } else {
            $slug = $office_worker->slug;
        }
        $office_worker->name = $request->name;
        $office_worker->slug = $slug;
        $office_worker->position = $request->position;
        $office_worker->indexNo = $request->indexNo;
        $office_worker->dateOfBirth = $request->dateOfBirth;
        $office_worker->joiningDate = $request->joiningDate;
        $office_worker->educationalQualification = $request->educationalQualification;
        $office_worker->address = $request->address;
        if ($request->hasFile('img')) {
            $file_path = public_path() . '/upload/images/office_worker/' . $office_worker->img;

            if (File::exists($file_path)) {
                File::delete($file_path);
            }
            $file = $request->file('img');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-office_worker-update-' . $extension;
            $file->move('upload/images/office_worker', $filename);
            $office_worker->img = $filename;
        }
        $office_worker->update();

        return response()->json([
            'status' => 'success',
            'message' => 'অফিস কর্মচারির তথ্য আপডেটেড!'
        ]);
    }
    function destroy($id)
    {
        $office_worker = OfficeWorker::findOrFail(intval($id));
        $file_path = public_path() . '/upload/images/office_worker/' . $office_worker->img;

        if (File::exists($file_path)) {
            File::delete($file_path);
        }
        $office_worker->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'অফিস কর্মচারির তথ্য ডিলিট!'
        ]);
    }
}