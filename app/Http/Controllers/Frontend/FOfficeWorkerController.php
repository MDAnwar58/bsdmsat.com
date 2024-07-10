<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FooterLogo;
use App\Models\FooterQuickContact;
use App\Models\FooterUsefulLink;
use App\Models\FooterUsefulLinkTitle;
use App\Models\Logo;
use App\Models\Navbar;
use App\Models\OfficeWorker;
use App\Models\Topbar;

class FOfficeWorkerController extends Controller
{
    function index()
    {
        $topbars = Topbar::get();
        $logos = Logo::get();
        $navbars = Navbar::get();
    
        $officeWorkers = OfficeWorker::get();
        // footer
        $footerLogoParts = FooterLogo::get();
        $footerUsefulLinkTitles = FooterUsefulLinkTitle::get();
        $footerUsefulLinks = FooterUsefulLink::get();
        $footerQuickContacts = FooterQuickContact::get();
        return view('pages.frontend.office_worker.index', compact('topbars', 'logos', 'navbars', 'officeWorkers', 'footerLogoParts', 'footerUsefulLinkTitles', 'footerUsefulLinks', 'footerQuickContacts'));
    }
    function show($id)
    {
        $topbars = Topbar::get();
        $logos = Logo::get();
        $navbars = Navbar::get();
    
        $officeWorker = OfficeWorker::findOrFail(intval($id));
        // footer
        $footerLogoParts = FooterLogo::get();
        $footerUsefulLinkTitles = FooterUsefulLinkTitle::get();
        $footerUsefulLinks = FooterUsefulLink::get();
        $footerQuickContacts = FooterQuickContact::get();
        return view('pages.frontend.office_worker.show', compact('topbars', 'logos', 'navbars', 'officeWorker', 'footerLogoParts', 'footerUsefulLinkTitles', 'footerUsefulLinks', 'footerQuickContacts'));
    }
}
