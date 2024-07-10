<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\FooterLogo;
use App\Models\FooterQuickContact;
use App\Models\FooterUsefulLink;
use App\Models\FooterUsefulLinkTitle;
use App\Models\Logo;
use App\Models\ManagingCommittee;
use App\Models\Navbar;
use App\Models\Topbar;
use Illuminate\Http\Request;

class CommitteeController extends Controller
{
    function index()
    {
        $topbars = Topbar::get();
        $logos = Logo::get();
        $navbars = Navbar::get();
    
        $managingCommittees = ManagingCommittee::oldest()->get();
        // footer
        $footerLogoParts = FooterLogo::get();
        $footerUsefulLinkTitles = FooterUsefulLinkTitle::get();
        $footerUsefulLinks = FooterUsefulLink::get();
        $footerQuickContacts = FooterQuickContact::get();
        return view('pages.frontend.committee.index', compact('topbars', 'logos', 'navbars', 'managingCommittees', 'footerLogoParts', 'footerUsefulLinkTitles', 'footerUsefulLinks', 'footerQuickContacts'));
    }
}
