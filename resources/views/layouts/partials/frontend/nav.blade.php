@if (!Route::is('teacher'))
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
        <div class="container">

            @if ($logos->count() > 0)
                @foreach ($logos as $logo)
                    <a class="navbar-brand" href="#">
                        <img src="{{ url('upload/images/logo', $logo->img) }}" alt="">
                    </a>
                @endforeach
            @endif
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">

                @if ($navbars->count() > 0)
                    @foreach ($navbars as $navbar)
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is('home') ? 'active' : '' }} text-uppercase fw-semibold"
                                    aria-current="page" href="{{ route('home') }}"
                                    id="firstManu">{{ $navbar->firstManus }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase fw-semibold {{ Route::is('about') ? 'active' : '' }}"
                                    href="{{ route('about') }}" id="secondManu">{{ $navbar->secondManus }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase fw-semibold {{ Route::is('period') ? 'active' : '' }}"
                                    href="{{ route('period') }}" id="fourthManu">{{ $navbar->fourthManus }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase fw-semibold {{ Route::is('teacher') ? 'active' : '' }}"
                                    href="{{ route('teacher') }}" id="fifthManu">{{ $navbar->fifthManus }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase fw-semibold {{ Route::is('contact') ? 'active' : '' }}"
                                    href="{{ route('contact') }}" id="saventhManu">{{ $navbar->seventhManus }}</a>
                            </li>
                        </ul>
                    @endforeach
                @endif
            </div>
        </div>
    </nav>
@else
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
        <div class="container">
            @if ($logos->count() > 0)
                @foreach ($logos as $logo)
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{ url('upload/images/logo', $logo->img) }}" alt="">
                    </a>
                @endforeach
            @endif
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="mx-auto position-relative">
                    <form action="{{ route('teacher') }}" method="GET" class="d-flex" role="search">
                        <input class="form-control rounded-end-0 rounded-start-5 ps-4" name="search" onkeyup="searchTeacher(event)" id="searchCloseBtn" type="search" placeholder="শিক্ষকের তথ্য খুঁজুন" aria-label="Search">
                        <button class="btn btn-outline-dark rounded-start-0 rounded-end-5" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                    <ul class="navbar-nav flex-column position-absolute mt-3 py-2 w-100 rounded bg-light d-none" id="searchNav"></ul>
                </div>
                @if ($navbars->count() > 0)
                    @foreach ($navbars as $navbar)
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link  {{ Route::is('home') ? 'active' : '' }} text-uppercase fw-semibold"
                                    aria-current="page" href="{{ route('home') }}"
                                    id="firstManu">{{ $navbar->firstManus }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase fw-semibold {{ Route::is('about') ? 'active' : '' }}"
                                    href="{{ route('about') }}" id="secondManu">{{ $navbar->secondManus }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase fw-semibold {{ Route::is('period') ? 'active' : '' }}"
                                    href="{{ route('period') }}" id="fourthManu">{{ $navbar->fourthManus }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase fw-semibold {{ Route::is('teacher') ? 'active' : '' }}"
                                    href="{{ route('teacher') }}" id="fifthManu">{{ $navbar->fifthManus }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase fw-semibold {{ Route::is('contact') ? 'active' : '' }}"
                                    href="{{ route('contact') }}" id="saventhManu">{{ $navbar->seventhManus }}</a>
                            </li>
                        </ul>
                    @endforeach
                @endif
            </div>
        </div>
    </nav>
@endif
