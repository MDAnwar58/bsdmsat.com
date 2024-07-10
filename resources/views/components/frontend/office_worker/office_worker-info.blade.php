<!--======================= teachers show start =======================-->
<section class="office_worker-page-bg py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 pb-3">
                <h2 class="text-uppercase text-center fs-3 fw-bold">অফিস কর্মচারি তথ্য</h2>
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-sm-4 pb-sm-0 pb-3">
                        <div class="card">
                            <img src="{{ url('upload/images/office_worker', $officeWorker->img) }}" style="height: 45vh;" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4>{{ $officeWorker->name }}</h4>
                                <p class="card-text text-secondary">{{ $officeWorker->position }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="card">
                            <div class="card-body">
                                <p class="fs-5 text-secondary fw-normal">নাম: {{ $officeWorker->name }}</p>
                                <hr>
                                <p class="fs-5 text-secondary fw-normal">পদ: {{ $officeWorker->position }}</p>
                                <hr>
                                <p class="fs-5 text-secondary fw-normal">ইনডেক্স নং: {{ $officeWorker->indexNo }}</p>
                                <hr>
                                <p class="fs-5 text-secondary fw-normal">জন্ম তাং: {{ $officeWorker->dateOfBirth }}</p>
                                <hr>
                                <p class="fs-5 text-secondary fw-normal">যোগদানের তাং: {{ $officeWorker->joiningDate }}</p>
                                <hr>
                                <p class="fs-5 text-secondary fw-normal">শিক্ষাগত যোগ্যতা: {{ $officeWorker->educationalQualification }}</p>
                                <hr>
                                <p class="fs-5 text-secondary fw-normal">স্থায়ী ঠিকানা: {{ $officeWorker->address }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--======================= teachers show end =======================-->
