<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/backend/images/logo.svg') }}" type="image/x-icon">
    <title>bsdmsat @if (!Route::is('home'))- @yield('title')@endif</title>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @if (Route::is('home'))
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.theme.default.css') }}" />
        <!-- Add the slick-theme.css if you want default styling -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/slick.css') }}" />
        <!-- Add the slick-theme.css if you want default styling -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/slick-theme.css') }}" />
    @endif
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css') }}">
    <style>
        .darken-image {
            filter: brightness(55%);
        }
    </style>
    @yield('css')
    @if (Route::is('contact'))
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/toastify.min.css') }}">
    @endif
    @if (Route::is('home') or Route::is('contact') or Route::is('teacher'))
        <script src="{{ asset('assets/frontend/js/axios.min.js') }}"></script>
    @endif
    @if (Route::is('contact'))
        <script src="{{ asset('assets/frontend/js/toastify.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/config.js') }}"></script>
    @endif
</head>

<body>

    <!-- topbar start -->
    @include('layouts.partials.frontend.topbar')
    <!-- topbar end -->
    <!-- navbar start -->
    @include('layouts.partials.frontend.nav')
    <!-- navbar end -->
    <main>

        @yield('content')


        <!--======================= footer start =======================-->
        @include('layouts.partials.frontend.footer')
        <!--======================= footer end =======================-->
    </main>


    <script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
    @if (Route::is('home'))
        <script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/frontend/js/slick.min.js') }}"></script>

        <script>
            var owl = $('.hero-carousel');
            owl.owlCarousel({
                animateOut: 'fadeOut',
                loop: true,
                margin: 10,
                nav: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });
            owl.trigger('play.owl.autoplay', [4000]);

            $('.teacher-carousel').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                responsive: [{
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 425,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
        </script>
    @endif
</body>

</html>
