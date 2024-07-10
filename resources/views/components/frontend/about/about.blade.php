@section('css')
    <style>
        .about-page-bg img {
        	width: 70%;
        }
        
        @media only screen and (max-width: 768px) {
        	.about-page-bg img {
        		width: 80%;
        	}
        }
        @media only screen and (max-width: 575px) {
        	.about-page-bg img {
        		width: 90%;
        	}
        }
        @media only screen and (max-width: 375px) {
        	.about-page-bg img {
        		width: 95%;
        	}
        }
    </style>
@endsection
<section class="about-page-bg py-5">
    <div class="container">
        <div class="row justify-content-center">
            @if ($abouts->count() > 0)
                @foreach ($abouts as $about)
                    <div class="col-md-12 pb-3">
                        <h2 class="text-uppercase text-center">{{ $about->name }}</h2>
                    </div>
                    <div class="col-md-12 d-flex justify-content-between pt-2">
                        <h6 class=" fw-semibold fs-6">মনজুরি স্বারক</h6>
                        <p>নং রিক / নবায়ন / ২২৫২৩১১৮৯৬৪১ / নথি নং ১২৪৯১ তাং:- <b>১০-০৪-২০২৩</b></p>
                    </div>
                    <div class="col-md-12">
                        <p>{!! $about->des !!}</p>
                        <div class="text-center py-3">
                            <img src="{{ url('upload/images/about', $about->img) }}" 
                                alt="{{ $about->name }}">
                        </div>
                        <p>{!! $about->extraDes !!}</p>
                    </div>
                @endforeach
            @endif
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead style="height: 60px;">
                            <tr>
                                <th style="background-color:rgb(54, 140, 210);"></th>
                                <th style="background-color:rgb(54, 140, 210);"></th>
                                <th style="background-color:rgb(54, 140, 210);"></th>
                                <th style="background-color:rgb(54, 140, 210);"></th>
                                <th style="background-color:rgb(54, 140, 210);"></th>
                                <th style="background-color:rgb(54, 140, 210);"></th>
                                <th style="background-color:rgb(54, 140, 210);"></th>
                                <th style="background-color:rgb(54, 140, 210);"></th>
                                <th style="background-color:rgb(54, 140, 210);"></th>
                            </tr>
                        </thead>
                        <tbody style="height: 55px;" class=" table-primary">
                            <tr>
                                @if ($lands->count() > 0)
                                    @foreach ($lands as $land)
                                        <td>{{ $land->number }}</td>
                                    @endforeach
                                @endif
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12 text-end">
                <p class="pt-2">মেয়াদ:- <b>৩১-১২-২০২৭</b> পর্যন্ত।</p>
            </div>
        </div>
    </div>
</section>
