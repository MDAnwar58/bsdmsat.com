<section class="hero-bg">
    <div class="owl-carousel owl-theme hero-carousel">
        @if ($sliders->count() > 0)
            @foreach ($sliders as $slider)
                <div class="item">
                    <img src="{{ url('upload/images/sliders', $slider->img) }}" class="darken-image" alt="">
                </div>
            @endforeach
        @endif
    </div>
</section>
