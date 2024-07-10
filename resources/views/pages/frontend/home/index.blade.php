@extends('layouts.frontendApp')

@section('content')
    <!--======================= hero start =======================-->
    @include('components.frontend.home.hero')
    <!--======================= hero end =======================-->

    <!--======================= about start =======================-->
    @include('components.frontend.home.about')
    <!--======================= about end =======================-->

    <!--======================= sector start =======================-->
    @include('components.frontend.home.every-sector-member-or-count')
    <!--======================= sector end =======================-->
    <!--======================= our gallery end =======================-->
    @include('components.frontend.home.gallery')
    
    <!--======================= our gallery end =======================-->
    <!--======================== gallery show start ========================-->
    <!-- Modal -->
    @include('components.frontend.home.gallery-image-show-modal')
    <!--======================== gallery show end ========================-->
    <!--======================= our Teachers start =======================-->
    @include('components.frontend.home.teacher')
    <!--======================= our Teachers end =======================-->

    <!--======================= recent news start =======================-->
    @include('components.frontend.home.notice')
    
    <!--======================= recent news end =======================-->
@endsection
