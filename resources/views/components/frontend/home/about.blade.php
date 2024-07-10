<section class="about-bg py-5 mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card text-bg-dark py-5">
                    <div class="d-flex align-items-center justify-content-center py-5 px-5">
                        @if ($abouts->count() > 0)
                            @foreach ($abouts as $about)
                                <div class="text-center">
                                    <img src="{{ url('upload/images/about', $about->img) }}" style="height: 30%; width: 100%;"
                                        class="" alt="...">
                                    <p class="card-text mt-2">{{ $about->short_des }}</p>
                                    <a href="{{ route('about') }}" class="btn btn-outline-light fw-semibold">{{ $about->title }}</a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>