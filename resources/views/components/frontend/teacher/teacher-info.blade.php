<!--======================= teachers show start =======================-->
<section class="teachers-show-page-bg py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 pb-3">
                <h2 class="text-uppercase text-center fs-3 fw-bold">শিক্ষকের তথ্য</h2>
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-sm-4 pb-sm-0 pb-3">
                        <div class="card">
                            <img src="{{ url('upload/images/teachers', $teacher->img) }}" style="height: 45vh;" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4>{{ $teacher->name }}</h4>
                                <p class="card-text text-secondary">{{ $teacher->position }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="card">
                            <div class="card-body">
                                <p class="fs-5 text-secondary fw-normal">নাম: {{ $teacher->name }}</p>
                                <hr>
                                <p class="fs-5 text-secondary fw-normal">পদ: {{ $teacher->position }}</p>
                                <hr>
                                <p class="fs-5 text-secondary fw-normal">ইনডেক্স নং: {{ $teacher->indexNo }}</p>
                                <hr>
                                <p class="fs-5 text-secondary fw-normal">জন্ম তাং: {{ $teacher->dateOfBirth }}</p>
                                <hr>
                                <p class="fs-5 text-secondary fw-normal">যোগদানের তাং: {{ $teacher->joiningDate }}</p>
                                <hr>
                                <p class="fs-5 text-secondary fw-normal">শিক্ষাগত যোগ্যতা: {{ $teacher->educationalQualification }}</p>
                                <hr>
                                <p class="fs-5 text-secondary fw-normal">স্থায়ী ঠিকানা: {{ $teacher->address }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--======================= teachers show end =======================-->
