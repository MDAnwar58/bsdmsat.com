<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactPlaceholder;
use App\Models\FooterLogo;
use App\Models\FooterQuickContact;
use App\Models\FooterUsefulLink;
use App\Models\FooterUsefulLinkTitle;
use App\Models\Logo;
use App\Models\Navbar;
use App\Models\Teacher;
use App\Models\Topbar;
use Illuminate\Http\Request;

class FTeacherController extends Controller
{
    function index(Request $request)
    {
        $topbars = Topbar::get();
        $logos = Logo::get();
        $navbars = Navbar::get();
        if ($request->search) {
            $teachers = Teacher::where('name', 'like', '%'.$request->search.'%')
                ->orWhere('position', 'like', '%'.$request->search.'%')
                ->orWhere('indexNo', 'like', '%'.$request->search.'%')
                ->simplePaginate(12);
        } else {
            $teachers = Teacher::simplePaginate(12);
        }
        // footer
        $footerLogoParts = FooterLogo::get();
        $footerUsefulLinkTitles = FooterUsefulLinkTitle::get();
        $footerUsefulLinks = FooterUsefulLink::get();
        $footerQuickContacts = FooterQuickContact::get();
        return view('pages.frontend.teacher.index', compact('topbars', 'logos', 'navbars', 'teachers', 'footerLogoParts', 'footerUsefulLinkTitles', 'footerUsefulLinks', 'footerQuickContacts'));
    }
    function show($id)
    {
        $topbars = Topbar::get();
        $logos = Logo::get();
        $navbars = Navbar::get();

        $teacher = Teacher::findOrFail(intval($id));
        // footer
        $footerLogoParts = FooterLogo::get();
        $footerUsefulLinkTitles = FooterUsefulLinkTitle::get();
        $footerUsefulLinks = FooterUsefulLink::get();
        $footerQuickContacts = FooterQuickContact::get();
        return view('pages.frontend.teacher.show', compact('topbars', 'logos', 'navbars', 'teacher', 'footerLogoParts', 'footerUsefulLinkTitles', 'footerUsefulLinks', 'footerQuickContacts'));
    }
    function searchTeacherInfo(Request $request)
    {
        if (!$request->search == null) {
            $search = $request->search;
            $teachers = Teacher::where('name', 'like', '%' . $search . '%')->orWhere('position', 'like', '%' . $search . '%')->get();
            return $teachers;
        } else {
            return response()->json([
                'status' => 'null',
            ]);
            // 'message' => "শিক্ষকের তথ্য নেই"
        }
    }
}