<section class="commitee-page-bg py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 pb-3">
                <h2 class="text-uppercase text-center">ম্যানেজিং কমিটি/গভর্ণিং বডি</h2>
            </div>
            <div class="col-md-12 d-flex justify-content-between py-2">
                <h6 class=" fw-semibold fs-6">মনজুরি স্বারক নং-</h6>
                <p class="">নং বামাসিব / প্রশা / ২২৪২২১১৮৯৬৪১ / ৬১৭৫৯ / নোথি নং ১৭২ / তাং:- <b>১৯-০৫-২০২২ খ্রি:</b></p>
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-secondary table-hover table-striped">
                        <thead>
                            <tr>
                                <th>নাম</th>
                                <th>পদ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($managingCommittees->count() > 0)
                                @foreach ($managingCommittees as $managingCommittee)
                                <tr>
                                    <td>{{ $managingCommittee->name }}</td>
                                    <td>{{ $managingCommittee->position }}</td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="11" class="text-center">ম্যানেজিং কমিটির তথ্য নেই</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12 text-end">
                <p class="pt-2">কমিটির মেয়াদ <b>১৫-০৬-২০২৪</b> পর্যন্ত।</p>
            </div>
        </div>
    </div>
</section>
