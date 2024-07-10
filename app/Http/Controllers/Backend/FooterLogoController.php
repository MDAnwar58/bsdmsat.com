<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FooterLogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FooterLogoController extends Controller
{
    function index()
    {
        return view('pages.backend.footer.index');
    }
    function get()
    {
        return FooterLogo::get();
    }
    function storeOrUpdate(Request $request)
    {
        $id = $request->id;
        if ($id) {
            $footerLogo = FooterLogo::findOrFail(intval($id));
            if ($request->hasFile('logo')) {
                $file_path = public_path() . '/upload/images/footer_logo/' . $footerLogo->logo;

                if (File::exists($file_path)) {
                    File::delete($file_path);
                }
                $file = $request->file('logo');
                $extension = $file->getClientOriginalName();
                $filename = time() . '-footer_logo-update-' . $extension;
                $file->move('upload/images/footer_logo', $filename);
                $footerLogo->logo = $filename;
            }
            $footerLogo->short_des = $request->short_des;
            $footerLogo->save();

            return response()->json([
                'status' => 'success',
                'message' => 'ফুটার লোগো এবং ডিচকৃপশান আপডেটেড!'
            ]);
        } else {
            $footerLogo = new FooterLogo();
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $extension = $file->getClientOriginalName();
                $filename = time() . '-footer_logo-' . $extension;
                $file->move('upload/images/footer_logo', $filename);
                $footerLogo->logo = $filename;
            }
            $footerLogo->short_des = $request->short_des;
            $footerLogo->save();

            return response()->json([
                'status' => 'success',
                'message' => 'ফুটার লোগো এবং ডিচকৃপশান এ্যাডেড!'
            ]);
        }
    }
}