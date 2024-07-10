<nav class="topbar bg-dark py-1">
    <div class="container">
        @if ($topbars->count() > 0)
            @foreach ($topbars as $topbar)
                <div class="row">
                    <div class="col-lg-6 col-md-8">
                        <div class="row">
                            <div class="col-lg-4 col-md-5 col-sm-6 d-block-sm d-flex justify-content-center">
                                <div class="text-light fs-6 fw-normal d-flex">
                                    <i class="bi bi-telephone-forward me-1"></i>
                                    +৮৮<span id="mobile">{{ $topbar->mobile }}</span>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-6 py-sm-0 py-1 d-block-sm d-flex justify-content-center">
                                <div class="text-light fs-6 fw-normal d-flex">
                                    <i class="bi bi-envelope me-1"></i>
                                    {{ $topbar->email }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 text-md-end text-center">
                        <span class="text-light fs-6 fw-normal">
                            <i class="bi bi-clock me-1"></i>
                            {{ $topbar->start_day }}-{{ $topbar->end_day }} {{ $topbar->startTime }} থেকে
                            {{ $topbar->endTime }}
                        </span>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</nav>
