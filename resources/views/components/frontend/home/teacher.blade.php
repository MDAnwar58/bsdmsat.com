<section class="our-teacher-bg pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center py-4">
                <h2 class="text-uppercase fs-3 fw-bold">আমাদের শিক্ষক</h2>
            </div>
            <div class="col-md-12">
                <div class="teacher-carousel">
                    @if ($teachers->count() > 0)
                        @foreach ($teachers as $teacher)
                            <div class="item px-1">
                                <div class="card">
                                    <img src="{{ url('upload/images/teachers', $teacher->img) }}" style="height: 40vh;" class="card-img-top" alt="teacher">
                                    <div class="card-body">
                                        <span class="h5">{{ $teacher->name }}</span><br>
                                        <span class="card-text text-capitalize">{{ $teacher->position }}</span><br>
                                        <div class="pt-2">
                                            <a href="{{ route('teacher.show', $teacher->id) }}" class="btn btn-outline-dark btn-sm">বিস্তারিত</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
