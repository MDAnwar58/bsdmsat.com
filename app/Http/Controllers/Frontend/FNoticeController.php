<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FooterLogo;
use App\Models\FooterQuickContact;
use App\Models\FooterUsefulLink;
use App\Models\FooterUsefulLinkTitle;
use App\Models\Logo;
use App\Models\Navbar;
use App\Models\Notice;
use App\Models\Topbar;
use Illuminate\Http\Request;

class FNoticeController extends Controller
{
    function index()
    {
        // for top bar
        $topbars = Topbar::get();
        $logos = Logo::get();
        $navbars = Navbar::get();
        // footer
        $footerLogoParts = FooterLogo::get();
        $footerUsefulLinkTitles = FooterUsefulLinkTitle::get();
        $footerUsefulLinks = FooterUsefulLink::get();
        $footerQuickContacts = FooterQuickContact::get();

        $notices = Notice::latest()->get();
        return view('pages.frontend.notice.index', compact('notices', 'topbars', 'logos', 'navbars', 'footerLogoParts', 'footerUsefulLinkTitles', 'footerUsefulLinks', 'footerQuickContacts'));
    }
    function show($id)
    { 
        // for top bar
        $topbars = Topbar::get();
        $logos = Logo::get();
        $navbars = Navbar::get();
        // footer
        $footerLogoParts = FooterLogo::get();
        $footerUsefulLinkTitles = FooterUsefulLinkTitle::get();
        $footerUsefulLinks = FooterUsefulLink::get();
        $footerQuickContacts = FooterQuickContact::get();

        $notice = Notice::findOrFail(intval($id));
        return view('pages.frontend.notice.show', compact('notice', 'topbars', 'logos', 'navbars', 'footerLogoParts', 'footerUsefulLinkTitles', 'footerUsefulLinks', 'footerQuickContacts'));
    }
}
