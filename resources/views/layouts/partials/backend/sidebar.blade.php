<div class="sidebar col-md-3 col-sm-2 col-3 pt-md-0 bg-light" id="sidebar">
    <div class="row sticky-top pt-3">
        <div class="col-12 mx-auto">
            <ul class="nav flex-column ps-sm-2 pe-sm-2 pe-0 ps-0 pt-md-0 pt-3">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }} d-md-flex rounded ps-md-4 ps-0 pe-2 text-md-start text-center"
                        aria-current="page" href="{{ route('admin.dashboard') }}">
                        <span class="icon d-flex align-items-center justify-content-center"><i class="fa fa-tachometer" aria-hidden="true"></i></span>
                        <span class="d-md-block d-none ms-md-2 ms-0">ড্যাসবোড</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.user') ? 'active' : '' }} ps-md-4 ps-0 d-md-flex text-md-start text-center"
                        href="{{ route('admin.user') }}">
                        <span class="icon d-flex align-items-center justify-content-center"><i class="fa fa-users" aria-hidden="true"></i></span>
                        <span class="d-md-block d-none ms-md-2 ms-0">ইউজার</span>
                    </a>
                </li>
                <li class="nav-item">
                    <span
                        class="nav-link {{ Route::is('admin.topbar') ? 'active' : '' }} {{ Route::is('admin.navbar') ? 'active' : '' }} {{ Route::is('admin.footer.logo.part') ? 'active' : '' }} ps-md-4 ps-0 d-md-flex text-md-start text-center"
                        data-bs-toggle="collapse" href="#common-part" role="button" aria-expanded="false"
                        aria-controls="collapseExample">
                        <span class="icon d-flex align-items-center justify-content-center"><i class="fa fa-creative-commons" aria-hidden="true"></i></span>
                        <span class="d-md-block d-none ms-md-2 ms-0">কমোন পার্ট</span>
                    </span>
                    <ul class="collapse" id="common-part">
                        <a class="nav-link d-md-flex text-md-start text-center {{ Route::is('admin.topbar') ? 'active' : '' }}"
                            href="{{ route('admin.topbar') }}">
                            <span class="d-flex align-items-center justify-content-center">
                                <i class="fa fa-align-justify" aria-hidden="true"></i>
                            </span>
                            <span class="d-md-block d-none ms-md-2 ms-0">টপবার</span>
                        </a>
                        <a class="nav-link d-md-flex text-md-start text-center {{ Route::is('admin.navbar') ? 'active' : '' }}"
                            href="{{ route('admin.navbar') }}">
                            <span class="d-flex align-items-center justify-content-center">
                                <i class="fa fa-list" aria-hidden="true"></i>
                            </span>
                            <span class="d-md-block d-none ms-md-2 ms-0">ন্যাভবার</span>
                        </a>
                        <a class="nav-link d-md-flex text-md-start text-center {{ Route::is('admin.footer.logo.part') ? 'active' : '' }}"
                            href="{{ route('admin.footer.logo.part') }}">
                            <span class="d-flex align-items-center justify-content-center">
                                <i class="fa fa-align-left" aria-hidden="true"></i>
                            </span>
                            <span class="d-md-block d-none ms-md-2 ms-0">ফুটার</span>
                        </a>
                    </ul>
                </li>
                <li class="nav-item">
                    <span
                        class="nav-link {{ Route::is('admin.slider') ? 'active' : '' }} {{ Route::is('admin.sector') ? 'active' : '' }} {{ Route::is('admin.gallery') ? 'active' : '' }} ps-md-4 ps-0 d-md-flex text-md-start text-center"
                        data-bs-toggle="collapse" href="#home-page" role="button" aria-expanded="false"
                        aria-controls="collapseExample">
                        <span class="icon d-flex align-items-center justify-content-center"><i class="fa fa-file-text" aria-hidden="true"></i></span>
                        <span class="d-md-block d-none ms-md-2 ms-0">হোম পেজ</span>
                    </span>
                    <ul class="collapse" id="home-page">
                        <a class="nav-link d-md-flex text-md-start text-center {{ Route::is('admin.slider') ? 'active' : '' }}"
                            href="{{ route('admin.slider') }}">
                            <span class="d-flex align-items-center justify-content-center"><i class="fa fa-plus-circle"
                                    aria-hidden="true"></i></span>
                            <span class="d-md-block d-none ms-md-2 ms-0">সেলাইডার</span>
                        </a>
                        <a class="nav-link d-md-flex text-md-start text-center {{ Route::is('admin.sector') ? 'active' : '' }}"
                            href="{{ route('admin.sector') }}">
                            <span class="d-flex align-items-center justify-content-center">
                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                            </span>
                            <span class="d-md-block d-none ms-md-2 ms-0">বিভিন্ন সেক্টরের</span>
                        </a>
                        <a class="nav-link d-md-flex text-md-start text-center {{ Route::is('admin.gallery') ? 'active' : '' }}"
                            href="{{ route('admin.gallery') }}">
                            <span class="d-flex align-items-center justify-content-center">
                                <i class="fa fa-bandcamp" aria-hidden="true"></i>
                            </span>
                            <span class="d-md-block d-none ms-md-2 ms-0">গ্যালরি</span>
                        </a>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link ps-md-4 ps-0 d-md-flex text-md-start text-center {{ Route::is('admin.about') ? 'active' : '' }}"
                        href="{{ route('admin.about') }}">
                        <span class="icon d-flex align-items-center justify-content-center"><i class="fa fa-window-maximize" aria-hidden="true"></i></span>
                        <span class="d-md-block d-none ms-md-2 ms-0">মাদ্রাসা সম্পর্কিত তথ্য</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ps-md-4 ps-0 d-md-flex text-md-start text-center {{ Route::is('admin.managing.committee') ? 'active' : '' }}"
                        href="{{ route('admin.managing.committee') }}">
                        <span class="icon d-flex align-items-center justify-content-center"><i class="fa fa-first-order" aria-hidden="true"></i></span>
                        <span class="d-md-block d-none ms-md-2 ms-0">ম্যানেজিং কমিটি</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ps-md-4 ps-0 d-md-flex text-md-start text-center {{ Route::is('admin.period') ? 'active' : '' }}"
                        href="{{ route('admin.period') }}">
                        <span class="icon d-flex align-items-center justify-content-center"><i class="fa fa-ravelry" aria-hidden="true"></i></span>
                        <span class="d-md-block d-none ms-md-2 ms-0">পিরিয়ড</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ps-md-4 ps-0 d-md-flex text-md-start text-center {{ Route::is('admin.teacher') ? 'active' : '' }}"
                        href="{{ route('admin.teacher') }}">
                        <span class="icon d-flex align-items-center justify-content-center"><i class="fa fa-address-card" aria-hidden="true"></i></span>
                        <span class="d-md-block d-none ms-md-2 ms-0">শিক্ষক গনের তথ্য</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ps-md-4 ps-0 d-md-flex text-md-start text-center {{ Route::is('admin.office_worker') ? 'active' : '' }}"
                        href="{{ route('admin.office_worker') }}">
                        <span class="icon d-flex align-items-center justify-content-center"><i class="fa fa-address-card-o" aria-hidden="true"></i></span>
                        <span class="d-md-block d-none ms-md-2 ms-0">অফিস কর্মচারির তথ্য</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ps-md-4 ps-0 d-md-flex text-md-start text-center {{ Route::is('admin.notice') ? 'active' : '' }}" href="{{ route('admin.notice') }}">
                        <span class="icon d-flex align-items-center justify-content-center"><i class="fa fa-sticky-note" aria-hidden="true"></i></span>
                        <span class="d-md-block d-none ms-md-2 ms-0">নোটিশ</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ps-md-4 ps-0 d-md-flex text-md-start text-center {{ Route::is('admin.contact') ? 'active' : '' }}"
                        href="{{ route('admin.contact') }}">
                        <span class="icon d-flex align-items-center justify-content-center"><i class="fa fa-window-restore" aria-hidden="true"></i></span>
                        <span class="d-md-block d-none ms-md-2 ms-0">কনট্যাক্ট পেজ</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ps-md-4 ps-0 d-md-flex text-md-start text-center {{ Route::is('admin.contact.message') ? 'active' : '' }}" href="{{ route('admin.contact.message') }}">
                        <span class="icon d-flex align-items-center justify-content-center">
                            <i class="fa fa-commenting" aria-hidden="true"></i>
                            <span class="badge bg-danger ms-2 d-md-none" id="badgeIcon">0</span>
                        </span>
                        <span class="d-md-block d-none ms-md-2 ms-0">
                            কনট্যাক্ট মেসেজ
                            <span class="badge bg-danger ms-2" id="badge">0</span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
    async function getMsgCount()
    {
        let badgeIcon = document.getElementById('badgeIcon');
        let badge = document.getElementById('badge');
        const response = await axios.get('/get-local-user-message-count'); 
        badge.innerHTML = response.data;
        badgeIcon.innerHTML = response.data;
    }   
    getMsgCount();
</script>
