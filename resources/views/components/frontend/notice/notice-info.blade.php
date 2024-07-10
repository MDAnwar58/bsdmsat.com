<section class="office_worker-show-page-bg py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 pb-3 text-center">
                <h2 class="text-uppercase">নোটিশ</h2>
                <span class="text-muted">{{ date('d F, Y', strtotime($notice->created_at)) }}</span>
            </div>
            <div class="col-md-12">
                <div class="row">
                    @if ($notice->img != null)
                        <img src="{{ url('upload/images/notice', $notice->img) }}" class="w-100" alt="">
                        <h4 class="mt-3 text-muted text-decoration-underline">{{ $notice->title }}</h4>
                        <p class="text-secondary">{!! $notice->content !!}</p>
                    @else
                        <h4 class="mt-3 text-muted text-decoration-underline">{{ $notice->title }}</h4>
                        <p class="text-secondary">{!! $notice->content !!}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
