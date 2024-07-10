@if ($notices->count() > 0)
<section class="recent-news-bg pb-5">
    <div class="container">
        <div class="row pb-4">
            <div class="col-md-12 d-flex justify-content-between pb-2">
                <h3 class="fs-3 fw-bold">নোটিশ</h3>
                <div>
                    <a href="{{ route('notice') }}" class="text-uppercase btn btn-sm btn-dark more-news fw-semibold">আরও দেখুন</a>
                </div>
            </div>
                @foreach ($notices as $notice)
                    @if ($notice->img == null)
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <a href="{{ route('notice.show', $notice->id) }}" class="text-capitalize title fw-semibold text-dark text-decoration-none">{{ $notice->title }}</a>
                                    <p class="card-text text-muted">{!!  \Illuminate\Support\Str::words($notice->content, 10, "...")  !!}</p>
                                    <div class="text-end">
                                        <span class="text-secondary">{{ $notice->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-4 col-md-6 mb-3">
                            <div class="card">
                                <img src="{{ url('upload/images/notice', $notice->img) }}" class="card-img-top"
                                    alt="...">
                                <div class="card-body">
                                    <a href="{{ route('notice.show', $notice->id) }}" class="text-capitalize title fw-semibold text-dark text-decoration-none">{{ $notice->title }}</a>
                                    <p class="card-text text-muted">{!!  \Illuminate\Support\Str::words($notice->content, 10)  !!}</p>
                                    <div class="text-end">
                                        <span class="text-secondary">{{ $notice->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
        </div>
    </div>
</section>
@endif
