<section class="period-page-bg py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 pb-3">
                <h2 class="text-uppercase text-center">পিরিয়ড</h2>
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-secondary table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ক্র:নং</th>
                                <th>নাম/পদবী</th>
                                <th>১ম পিরিয়ড</th>
                                <th>২য় পিরিয়ড</th>
                                <th>৩য় পিরিয়ড</th>
                                <th>৪র্থ পিরিয়ড</th>
                                <th>৫ম পিরিয়ড</th>
                                <th>৬ষ্ঠ পিরিয়ড</th>
                                <th>৭ম পিরিয়ড</th>
                                <th>৮ম পিরিয়ড</th>
                                <th>মন্তব্য</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($periods->count() > 0)
                                @foreach ($periods as $period)
                                    <tr>
                                        <td>{{ $period->No }}</td>
                                        <td>{{ $period->position }}</td>
                                        <td>{{ $period->firstPeriod }}</td>
                                        <td>{{ $period->secondPeriod }}</td>
                                        <td>{{ $period->thirdPeriod }}</td>
                                        <td>{{ $period->fourthPeriod }}</td>
                                        <td>{{ $period->fifthPeriod }}</td>
                                        <td>{{ $period->sixthPeriod }}</td>
                                        <td>{{ $period->seventhPeriod }}</td>
                                        <td>{{ $period->eighthPeriod }}</td>
                                        <td>{{ $period->comment }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="11" class="text-center">পিরিয়ডের তথ্য নেই</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
