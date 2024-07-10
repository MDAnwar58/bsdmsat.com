<section class="why-choose-us mt-5">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-8 col-md-10 why-choose-us-column py-5">
                @if ($sectors->count() > 0)
                    @foreach ($sectors as $sector)
                        <div class="row py-5">
                            <div class="col-xl-3 col-lg-4 col-sm-6 d-flex justify-content-center mb-md-3 mb-sm-3 mb-4">
                                <div class="pt-1">
                                    <div class="text-center pb-2">
                                        <i class="bi bi-people-fill fs-1"></i>
                                    </div>
                                    <h3>
                                        <a href="#our-department-bg" class="text-decoration-none text-muted">{{ $sector->sName }}</a>
                                    </h3>
                                    <div class="text-center">
                                        <span class="fs-3 text-secondary">{{ $sector->student_count }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 d-flex justify-content-center mb-md-3 mb-sm-3 mb-4">
                                <div class="pt-1">
                                    <div class="text-center pb-2">
                                        <i class="bi bi-person-video3 fs-1"></i>
                                    </div>
                                    <h3>
                                        <a href="#our-department-bg"
                                            class="text-decoration-none text-muted">{{ $sector->tName }}</a>
                                    </h3>
                                    <div class="text-center">
                                        <span class="fs-3 text-secondary">{{ $sector->teacher_count }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 d-flex justify-content-center mb-md-3 mb-sm-3 mb-4">
                                <div class="pt-1">
                                    <div class="text-center pb-2">
                                        <i class="bi bi-person-fill-gear fs-1"></i>
                                    </div>
                                    <h3>
                                        <a href="#our-department-bg"
                                            class="text-decoration-none text-muted">{{ $sector->aName }}</a>
                                    </h3>
                                    <div class="text-center">
                                        <span class="fs-3 text-secondary">{{ $sector->authority_count }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6 d-flex justify-content-center mb-md-3 mb-sm-3 mb-4">
                                <div class="pt-1">
                                    <div class="text-center pb-2">
                                        <i class="bi bi-book-half fs-1"></i>
                                    </div>
                                    <h3 class="text-center">
                                        <a href="#our-department-bg"
                                            class="text-decoration-none text-muted">{{ $sector->bName }}</a>
                                    </h3>
                                    <div class="text-center">
                                        <span class="fs-3 text-secondary">{{ $sector->book_count }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
