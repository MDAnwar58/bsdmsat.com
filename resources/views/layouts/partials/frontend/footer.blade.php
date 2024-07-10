<footer class="footer-bg py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 text-light text-sm-start text-center pb-sm-0 pb-4">
                @if ($footerLogoParts->count() > 0)
                    @foreach ($footerLogoParts as $footerLogoPart)
                        <img src="{{ url('upload/images/footer_logo', $footerLogoPart->logo) }}" alt="">
                        <div>
                            <p class="text-secondary mt-3">{{ $footerLogoPart->short_des }}</p>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="col-md-4 col-sm-6 text-light text-center pb-sm-0 pb-4">
                @if ($footerUsefulLinkTitles->count() > 0)
                    @foreach ($footerUsefulLinkTitles as $footerUsefulLinkTitle)
                        <h4 class="fs-5 fw-semibold">{{ $footerUsefulLinkTitle->name }}</h4>
                    @endforeach
                @endif
                <ul class="navbar-nav text-secondary">
                    @if ($footerUsefulLinks->count() > 0)
                        @foreach ($footerUsefulLinks as $footerUsefulLink)
                            <li class="nav-item">
                                <a href="{{ $footerUsefulLink->link }}" class="nav-link text-capitalize text-decoration-underline">{{ $footerUsefulLink->manus }}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <div class="col-sm-3 d-md-none d-sm-block d-none mt-md-0 mt-3"></div>
            <div class="col-md-4 col-sm-6 text-light mt-md-0 mt-3">
                @if ($footerQuickContacts->count() > 0)
                    @foreach ($footerQuickContacts as $footerQuickContact)
                        <h4 class="fs-5 fw-semibold text-capitalize text-md-start text-center">{{ $footerQuickContact->title }}</h4>
                        <div class="text-secondary mt-3 text-md-start text-center">
                            <p>+৮৮{{ $footerQuickContact->mobile }}</p>
                        </div>
                        <hr>
                        <div class="text-secondary text-md-start text-center">
                            <p>{{ $footerQuickContact->email }}</p>
                        </div>
                        <hr>
                        <div class="text-secondary text-md-start text-center">
                            <p>{{ $footerQuickContact->address }}</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</footer>
