<?php

use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\CommonController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\ContactMessageController;
use App\Http\Controllers\Backend\ContactPlaceHolderController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FooterLogoController;
use App\Http\Controllers\Backend\FooterQuickContactController;
use App\Http\Controllers\Backend\FooterUsefulLinkController;
use App\Http\Controllers\Backend\FooterUsefulLinkTitleController;
use App\Http\Controllers\Backend\GalleryCategoryController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\GalleryImageController;
use App\Http\Controllers\Backend\LandController;
use App\Http\Controllers\Backend\LogoController;
use App\Http\Controllers\Backend\ManagingCommitteeController;
use App\Http\Controllers\Backend\SectorController;
use App\Http\Controllers\Backend\NavbarController;
use App\Http\Controllers\Backend\NoticeController;
use App\Http\Controllers\Backend\OfficeWorkerController;
use App\Http\Controllers\Backend\PeriodController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\TeacherController;
use App\Http\Controllers\Backend\TopbarController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\CommitteeController;
use App\Http\Controllers\Frontend\FAboutController;
use App\Http\Controllers\Frontend\FCommonController;
use App\Http\Controllers\Frontend\FContactController;
use App\Http\Controllers\Frontend\FNoticeController;
use App\Http\Controllers\Frontend\FOfficeWorkerController;
use App\Http\Controllers\Frontend\FPeriodController;
use App\Http\Controllers\Frontend\FTeacherController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\TokenRemoveController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/slider-show/{id}', [HomeController::class, 'sliderShow']);
// contact page
Route::get('/কনট্যাক্ট', [FContactController::class, 'index'])->name('contact');
Route::post('/কনট্যাক্ট/request', [FContactController::class, 'contactRequest']);
// contact page
Route::get('/শিক্ষক-গন', [FTeacherController::class, 'index'])->name('teacher');
Route::get('/শিক্ষকের-তথ্য/{id}', [FTeacherController::class, 'show'])->name('teacher.show');
Route::post('/শিক্ষকের-তথ্য-খুঁজুন', [FTeacherController::class, 'searchTeacherInfo']);
// period
Route::get('/পিরিয়ড', [FPeriodController::class, 'index'])->name('period');
// about
Route::get('/মাদ্রাসা-সম্পর্কিত-তথ্য', [FAboutController::class, 'index'])->name('about');
// managing committee
Route::get('/ম্যানেজিং-কমিটি', [CommitteeController::class, 'index'])->name('managing.committee');
// office worker
Route::get('/অফিস-কর্মচারির-গন', [FOfficeWorkerController::class, 'index'])->name('office.worker');
Route::get('/অফিস-কর্মচারির-তথ্য/{id}', [FOfficeWorkerController::class, 'show'])->name('office.worker.show');
Route::get('/নোটিশ', [FNoticeController::class, 'index'])->name('notice');
Route::get('/নোটিশ/{id}', [FNoticeController::class, 'show'])->name('notice.show');

Route::middleware('authGuest')->group(function () {
    // auth page routes
    Route::get('/login', [LoginController::class, 'loginPage'])->name('login.page');
    Route::get('/register', [RegisterController::class, 'registerPage'])->name('register.page');
    Route::get('/forget-password', [ForgetPasswordController::class, 'forgetPasswordPage'])->name('forget.password.page');
    Route::get('/reset-password/1s2a3tm8db-bsdmsat', [ResetPasswordController::class, 'resetPasswordPage'])->name('reset.password.page');

    // auth api routes
    Route::post('/login-request', [LoginController::class, 'loginRequest']);
    Route::post('/register-request', [RegisterController::class, 'registerRequest']);
    Route::post('/send-email-for-password-reset', [ForgetPasswordController::class, 'sendEmail']);
    Route::post('/reset-password-request', [ResetPasswordController::class, 'resetPasswordRequest']);
});

Route::middleware('authToken')->group(function () {

    Route::get('/get-user', [CommonController::class, 'getUser']);
    // Route::get('/get-local-user-message', [CommonController::class, 'getLocalUserMessage']);
    Route::get('/get-local-user-message-count', [CommonController::class, 'getLocalUserMessageCount']);

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::middleware('userPermission')->group(function () {

        // user routes
        Route::get('/admin/users', [UserController::class, 'index'])->name('admin.user');
        // user api routes
        Route::get('/get-users-row', [UserController::class, 'getUsersRow']);
        Route::post('/set-users-row', [UserController::class, 'setUsersRow']);
        Route::get('/get-users', [UserController::class, 'getUsers']);
        Route::get('/permission-or-cancel/{id}', [UserController::class, 'userPermission']);
        Route::get('/user-destroy/{id}', [UserController::class, 'destroy']);

        // sliders routes
        Route::get('/admin/sliders', [SliderController::class, 'index'])->name('admin.slider');
        // sliders api routes
        Route::get('/admin/get-sliders', [SliderController::class, 'getSlider']);
        Route::post('/admin/store', [SliderController::class, 'store']);
        Route::get('/admin/slider-edit/{id}', [SliderController::class, 'edit']);
        Route::post('/admin/slider-update/{id}', [SliderController::class, 'update']);
        Route::get('/admin/slider-destroy/{id}', [SliderController::class, 'destroy']);

        // topbar routes
        Route::get('/admin/topbar', [TopbarController::class, 'index'])->name('admin.topbar');
        // topbar api routes
        Route::get('/admin/get-topbar', [TopbarController::class, 'get']);
        Route::post('/admin/topbar-store-or-update', [TopbarController::class, 'storeOrUpdate']);

        // navbar routes
        Route::get('/admin/navbar', [NavbarController::class, 'index'])->name('admin.navbar');
        // logo api routes
        Route::get('/admin/get-logo', [LogoController::class, 'get']);
        Route::post('/admin/logo-store-or-update', [LogoController::class, 'storeOrUpdate']);
        // navbar api routes
        Route::get('/admin/navbar-get', [NavbarController::class, 'get']);
        Route::post('/admin/navbar-store-or-update', [NavbarController::class, 'storeOrUpdate']);


        // member Organization routes
        Route::get('/admin/sector', [SectorController::class, 'index'])->name('admin.sector');
        // member Organization api routes
        Route::get('/admin/sector-get', [SectorController::class, 'get']);
        Route::post('/admin/sector-store-or-update', [SectorController::class, 'storeOrUpdate']);

        // gallery routes
        Route::get('/admin/gallery', [GalleryController::class, 'index'])->name('admin.gallery');
        // gallery api routes
        Route::get('/admin/gallery-get', [GalleryController::class, 'get']);
        Route::post('/admin/gallery-store-or-update', [GalleryController::class, 'storeOrUpdate']);
        // gallery category routes
        Route::get('/admin/gallery-category-get', [GalleryCategoryController::class, 'get']);
        Route::post('/admin/gallery-category-store', [GalleryCategoryController::class, 'store']);
        Route::get('/admin/gallery-category-edit/{id}', [GalleryCategoryController::class, 'edit']);
        Route::post('/admin/gallery-category-update/{id}', [GalleryCategoryController::class, 'update']);
        Route::get('/admin/gallery-category-destroy/{id}', [GalleryCategoryController::class, 'destroy']);
        // gallery image routes
        Route::get('/admin/gallery-image-get', [GalleryImageController::class, 'get']);
        Route::post('/admin/gallery-image-store', [GalleryImageController::class, 'store']);
        Route::get('/admin/gallery-image-edit/{id}', [GalleryImageController::class, 'edit']);
        Route::post('/admin/gallery-image-update/{id}', [GalleryImageController::class, 'update']);
        Route::get('/admin/gallery-image-destroy/{id}', [GalleryImageController::class, 'destroy']);

        // footer logo routes
        Route::get('/admin/footer-logo-part', [FooterLogoController::class, 'index'])->name('admin.footer.logo.part');
        // footer logo  api routes
        Route::get('/admin/footer-logo-part-get', [FooterLogoController::class, 'get']);
        Route::post('/admin/footer-logo-part-store-or-update', [FooterLogoController::class, 'storeOrUpdate']);
        // footer UsefulLInkTitle api routes
        Route::get('/admin/footer-usefulLink-title-part-get', [FooterUsefulLinkTitleController::class, 'get']);
        Route::post('/admin/footer-usefulLink-title-part-store-or-update', [FooterUsefulLinkTitleController::class, 'storeOrUpdate']);
        // footer usefulLink routes
        Route::get('/admin/footer-usefulLink-get', [FooterUsefulLinkController::class, 'get']);
        Route::post('/admin/footer-usefulLink-store', [FooterUsefulLinkController::class, 'store']);
        Route::get('/admin/footer-usefulLink-edit/{id}', [FooterUsefulLinkController::class, 'edit']);
        Route::post('/admin/footer-usefulLink-update/{id}', [FooterUsefulLinkController::class, 'update']);
        Route::get('/admin/footer-usefulLink-destroy/{id}', [FooterUsefulLinkController::class, 'destroy']);
        // quick contact  api routes
        Route::get('/admin/footer-quick-contact-part-get', [FooterQuickContactController::class, 'get']);
        Route::post('/admin/footer-quick-contact-part-store-or-update', [FooterQuickContactController::class, 'storeOrUpdate']);


        // about routes
        Route::get('/admin/about', [AboutController::class, 'index'])->name('admin.about');
        // about api routes
        Route::get('/admin/about-get', [AboutController::class, 'get']);
        Route::post('/admin/about-store-or-update', [AboutController::class, 'storeOrUpdate']);
        // land api routes
        Route::get('/admin/land-get', [LandController::class, 'get']);
        Route::post('/admin/land-store', [LandController::class, 'store']);
        Route::get('/admin/land-edit/{id}', [LandController::class, 'edit']);
        Route::post('/admin/land-update/{id}', [LandController::class, 'update']);
        Route::get('/admin/land-destroy/{id}', [LandController::class, 'destroy']);


        // contact routes
        Route::get('/admin/contact', [ContactController::class, 'index'])->name('admin.contact');
        // contact api routes
        Route::get('/admin/contact-get', [ContactController::class, 'get']);
        Route::post('/admin/contact-store-or-update', [ContactController::class, 'storeOrUpdate']);
        // contact Placeholder api routes
        Route::get('/admin/contact-placeholder-get', [ContactPlaceHolderController::class, 'get']);
        Route::post('/admin/contact-placeholder-store-or-update', [ContactPlaceHolderController::class, 'storeOrUpdate']);


        // ManagingCommittee routes
        Route::get('/admin/managing-committee', [ManagingCommitteeController::class, 'index'])->name('admin.managing.committee');
        // ManagingCommittee api routes
        Route::get('/admin/managing-committee-get', [ManagingCommitteeController::class, 'get']);
        Route::post('/admin/managing-committee-store', [ManagingCommitteeController::class, 'store']);
        Route::get('/admin/managing-committee-edit/{id}', [ManagingCommitteeController::class, 'edit']);
        Route::post('/admin/managing-committee-update/{id}', [ManagingCommitteeController::class, 'update']);
        Route::get('/admin/managing-committee-destroy/{id}', [ManagingCommitteeController::class, 'destroy']);

        // Period routes
        Route::get('/admin/period', [PeriodController::class, 'index'])->name('admin.period');
        // period api routes
        Route::get('/admin/period-get', [PeriodController::class, 'get']);
        Route::post('/admin/period-store', [PeriodController::class, 'store']);
        Route::get('/admin/period-edit/{id}', [PeriodController::class, 'edit']);
        Route::post('/admin/period-update/{id}', [PeriodController::class, 'update']);
        Route::get('/admin/period-destroy/{id}', [PeriodController::class, 'destroy']);


        // teacher routes
        Route::get('/admin/teacher', [TeacherController::class, 'index'])->name('admin.teacher');
        // teacher api routes
        Route::get('/admin/teacher-get', [TeacherController::class, 'get']);
        Route::post('/admin/teacher-store', [TeacherController::class, 'store']);
        Route::get('/admin/teacher-edit/{id}', [TeacherController::class, 'edit']);
        Route::post('/admin/teacher-update/{id}', [TeacherController::class, 'update']);
        Route::get('/admin/teacher-destroy/{id}', [TeacherController::class, 'destroy']);


        // office_worker routes
        Route::get('/admin/office_worker', [OfficeWorkerController::class, 'index'])->name('admin.office_worker');
        // office_worker api routes
        Route::get('/admin/office_worker-get', [OfficeWorkerController::class, 'get']);
        Route::post('/admin/office_worker-store', [OfficeWorkerController::class, 'store']);
        Route::get('/admin/office_worker-edit/{id}', [OfficeWorkerController::class, 'edit']);
        Route::post('/admin/office_worker-update/{id}', [OfficeWorkerController::class, 'update']);
        Route::get('/admin/office_worker-destroy/{id}', [OfficeWorkerController::class, 'destroy']);

        // contact message routes
        Route::get('/admin/contact-message', [ContactMessageController::class, 'index'])->name('admin.contact.message');
        // contact message api routes
        Route::get('/admin/contact-message-get', [ContactMessageController::class, 'get']);
        Route::get('/admin/contact-message-view/{id}', [ContactMessageController::class, 'view'])->name('admin.contact.message.view');
    });


    // notice routes
    Route::get('/admin/notice', [NoticeController::class, 'index'])->name('admin.notice');
    // notice api routes
    Route::get('/admin/notice-get', [NoticeController::class, 'get']);
    Route::post('/admin/notice-store', [NoticeController::class, 'store']);
    Route::get('/admin/notice-edit/{id}', [NoticeController::class, 'edit']);
    Route::post('/admin/notice-update/{id}', [NoticeController::class, 'update']);
    Route::get('/admin/notice-destroy/{id}', [NoticeController::class, 'destroy']);


    // logout route
    Route::get('/token/remove', [TokenRemoveController::class, 'tokenRemove']);
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
