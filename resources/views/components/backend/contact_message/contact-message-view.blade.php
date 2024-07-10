<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-header">
                    {{ $localUserContact->name }}
                </h3>
            </div>
            <div class="px-3 py-2 fs-5">
                <p>Phone Number: {{ $localUserContact->mobile }}</p>
                <p>Subject: <span class=" fw-bold">{{ $localUserContact->subject }}</span></p>
                <p>Message: <span id="msg">{{ $localUserContact->msg }}</span></p>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script>
        showLoader();
        setTimeout(() => {
            hideLoader();
        }, 1500);
    </script>
@endsection
