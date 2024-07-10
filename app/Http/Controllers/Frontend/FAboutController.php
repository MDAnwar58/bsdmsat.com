<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\FooterLogo;
use App\Models\FooterQuickContact;
use App\Models\FooterUsefulLink;
use App\Models\FooterUsefulLinkTitle;
use App\Models\Land;
use App\Models\Logo;
use App\Models\Navbar;
use App\Models\Period;
use App\Models\Topbar;
use Illuminate\Http\Request;

class FAboutController extends Controller
{
    function index()
    {
        $topbars = Topbar::get();
        $logos = Logo::get();
        $navbars = Navbar::get();
    
        $abouts = About::latest()->get();
        $lands = Land::get();
        // footer
        $footerLogoParts = FooterLogo::get();
        $footerUsefulLinkTitles = FooterUsefulLinkTitle::get();
        $footerUsefulLinks = FooterUsefulLink::get();
        $footerQuickContacts = FooterQuickContact::get();
        return view('pages.frontend.about.index', compact('topbars', 'logos', 'navbars', 'abouts', 'lands', 'footerLogoParts', 'footerUsefulLinkTitles', 'footerUsefulLinks', 'footerQuickContacts'));
    }
}
