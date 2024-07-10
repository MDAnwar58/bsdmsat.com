<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactPlaceholder;
use App\Models\FooterLogo;
use App\Models\FooterQuickContact;
use App\Models\FooterUsefulLink;
use App\Models\FooterUsefulLinkTitle;
use App\Models\LocalUserContact;
use App\Models\Logo;
use App\Models\Navbar;
use App\Models\Topbar;
use Illuminate\Http\Request;

class FContactController extends Controller
{
    function index()
    {
        $topbars = Topbar::get();
        $logos = Logo::get();
        $navbars = Navbar::get();
    
        $contacts = Contact::get();
        $contactPlaceholders = ContactPlaceholder::get();
        // footer
        $footerLogoParts = FooterLogo::get();
        $footerUsefulLinkTitles = FooterUsefulLinkTitle::get();
        $footerUsefulLinks = FooterUsefulLink::get();
        $footerQuickContacts = FooterQuickContact::get();
        return view('pages.frontend.contact.index', compact('topbars', 'logos', 'navbars', 'contacts', 'contactPlaceholders', 'footerLogoParts', 'footerUsefulLinkTitles', 'footerUsefulLinks', 'footerQuickContacts'));
    }
    function contactRequest(Request $request)
    {
        LocalUserContact::create($request->all());

        return response()->json([
            'message' => 'আপনার ম্যাসেজটি সেন্ড হয়েছে।'
        ], 200);
    }
}
