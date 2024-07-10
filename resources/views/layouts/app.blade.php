<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('assets/backend/images/logo.svg') }}" type="image/x-icon">
    <title>bsdmsat - @yield('title')</title>
    <link href="{{ asset('assets/backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/toastify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/progress_loader.css') }}">
    @if (
        !Route::is('login.page') &&
            !Route::is('register.page') &&
            !Route::is('forget.password.page') &&
            !Route::is('reset.password.page'))
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
            referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('assets/backend/css/jquery.dataTables.min.css') }}">
        <!-- include summernote css -->
        <link href="{{ asset('assets/backend/summernote/summernote-lite.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/backend/css/main.css') }}">
    @endif

    <script src="{{ asset('assets/backend/js/axios.min.js') }}"></script>
</head>

<body>
    <div class="loader d-none" id="loader">
        <div class="loader__element"></div>
    </div>
    @if (
        !Route::is('login.page') &&
            !Route::is('register.page') &&
            !Route::is('forget.password.page') &&
            !Route::is('reset.password.page'))
        @include('layouts.partials.backend.nav')
        <div class="row">
            @include('layouts.partials.backend.sidebar')
            <div class="col-md-9 col-sm-10 col-9 px-sm-4 px-2 pt-3" id="content">
                @php
                    $user = \App\Models\User::count();
                @endphp
                @yield('content')
            </div>
        </div>
    @else
        @yield('content')
    @endif

    @if (
        !Route::is('login.page') &&
            !Route::is('register.page') &&
            !Route::is('forget.password.page') &&
            !Route::is('reset.password.page'))
        <script src="{{ asset('assets/backend/js/jquery-3.7.0.min.js') }}"></script>
        <script src="{{ asset('assets/backend/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/backend/js/bootstrap.bundle.min.js') }}"></script>
        <!-- include summernote js -->
        <script src="{{ asset('assets/backend/summernote/summernote-lite.min.js') }}"></script>
        <script src="{{ asset('assets/backend/js/main.js') }}"></script>
    @endif
    <script src="{{ asset('assets/backend/js/toastify.js') }}"></script>
    <script src="{{ asset('assets/backend/js/config.js') }}"></script>
    @yield('script')

    @if (
        !Route::is('login.page') &&
            !Route::is('register.page') &&
            !Route::is('forget.password.page') &&
            !Route::is('reset.password.page'))
        @if ($user == 0)
            <script>
                removeToken();
                async function removeToken() {
                    var userCount = @json($user);
                    // if (userCount === 0) {
                    const response = await axios.get("/token/remove");
                    if (response.status === 200) {
                        errorToast(response.data.message);
                        window.location.href = "/login";
                    }
                    // }
                }

            </script>
        @endif
    @endif
</body>

</html>
