<section class="office_worker-show-page-bg py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 pb-3">
                <h2 class="text-uppercase text-center">নোটিশ</h2>
            </div>
            <div class="col-md-12">
                <div class="row office_worker_row">
                    @if ($notices->count() > 0)
                        @foreach ($notices as $notice)
                            @if ($notice->img == null)
                                <div class="col-lg-4 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <a href="{{ route('notice.show', $notice->id) }}" class="text-capitalize title fw-semibold text-dark text-decoration-none">{{ $notice->title }}</a>
                                            <p class="card-text text-muted">{!! Str::words($notice->content, 12, ' ...') !!}</p>
                                            <div class="text-end">
                                                <span
                                                    class="text-secondary">{{ $notice->created_at->diffForHumans() }}</span>
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
                                                <span
                                                    class="text-secondary">{{ $notice->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="col-12">
                            <div class="card">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <span class="h5">কোনো নোটিশ নেই</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
