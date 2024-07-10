<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\FooterLogo;
use App\Models\FooterQuickContact;
use App\Models\FooterUsefulLink;
use App\Models\FooterUsefulLinkTitle;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\GalleryImage;
use App\Models\Logo;
use App\Models\Navbar;
use App\Models\Notice;
use App\Models\Sector;
use App\Models\Slider;
use App\Models\Teacher;
use App\Models\Topbar;

class HomeController extends Controller
{
    function index()
    {
        $topbars = Topbar::get();
        $logos = Logo::get();
        $navbars = Navbar::latest()->get();
        // content
        $sliders = Slider::oldest()->get();
        $abouts = About::get();
        $sectors = Sector::get();
        $galleries = Gallery::get();
        $galleryCategories = GalleryCategory::oldest()->get();
        $teachers = Teacher::get();
        // footer
        $footerLogoParts = FooterLogo::get();
        $footerUsefulLinkTitles = FooterUsefulLinkTitle::get();
        $footerUsefulLinks = FooterUsefulLink::get();
        $footerQuickContacts = FooterQuickContact::get();
        $notices = Notice::latest()->take(3)->get();
        return view('pages.frontend.home.index', compact('topbars', 'logos', 'navbars', 'sliders', 'abouts', 'sectors', 'galleries', 'galleryCategories', 'teachers', 'footerLogoParts', 'footerUsefulLinkTitles', 'footerUsefulLinks', 'footerQuickContacts', 'notices'));
    }
    function sliderShow($id)
    {
        return GalleryImage::findOrFail(intval($id));
    }
}
