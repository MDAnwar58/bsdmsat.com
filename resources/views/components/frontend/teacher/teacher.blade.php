@section('css')
    <style>
        .teachers-info img {
        	height: 38vh;
        	width: 100%;
        }
        
        @media only screen and (max-width: 575px) {
        	.teachers-info .teachers-info-column {
        		padding: 0 5rem;
        	}
        
        	.teachers-info img {
        		height: 33vh;
        	}
        }
        
        @media only screen and (max-width: 575px) {
        	.teachers-info .teachers-info-column {
        		padding: 0 3rem;
        	}
        }
        
        @media only screen and (max-width: 425px) {
        	.teachers-info .teachers-info-column {
        		padding: 0 1rem;
        	}
        }
        
        @media only screen and (max-width: 375px) {
        	.teachers-info .teachers-info-column {
        		padding: 0 0;
        	}
        }
    </style>
@endsection
<section class="teacher-page-bg py-5 teachers-info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 pb-3">
                <h2 class="text-uppercase text-center">শিক্ষক গন</h2>
            </div>
            <div class="col-md-12">
                <div class="row justify-content-sm-start justify-content-center">
                    @if ($teachers->count() > 0)
                        @foreach ($teachers as $teacher)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-10 mb-3 teachers-info-column">
                                <div class="card">
                                    <img src="{{ url('upload/images/teachers', $teacher->img) }}" style=""
                                        class="" style="width: 100%;" alt="{{ $teacher->name }}">
                                    <div class="card-body">
                                        <span class="h5">{{ $teacher->name }}</span><br>
                                        <span class="card-text text-capitalize">{{ $teacher->position }}</span><br>
                                        <div class="pt-2">
                                            <a href="{{ route('teacher.show', $teacher->id) }}"
                                                class="btn btn-outline-dark btn-sm">বিস্তারিত</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-12 teacherPagination mt-2">
                            {{ $teachers->links() }}
                        </div>
                    @else
                        @php
                            $checkTeachers = \App\Models\Teacher::count();
                        @endphp
                        @if ($checkTeachers > 0)
                            <div class="col-12">
                                <a href="{{ route('teacher') }}" class=" btn btn-sm btn-dark mb-2">
                                    <i class="bi bi-arrow-bar-left me-2"></i>ফিরে যান
                                </a>
                            </div>
                        @endif
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body text-center">
                                    <span class="h5">কোনো শিক্ষকের তথ্য নেই</span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    async function searchTeacher(event) {
        let searchTeacher = event.target.value;
        let searchNav = $("#searchNav");
        searchNav.empty();
        const response = await axios.post("/শিক্ষকের-তথ্য-খুঁজুন", {
            search: searchTeacher
        });

        console.log(response);
        if (response.data.status === "null") {
            // console.log(response.data.message);
            searchNav.addClass("d-none")
        } else {
            if (response.data.length > 0) {
                searchNav.empty();
                searchNav.removeClass("d-none");
                response.data.forEach((teacher, index) => {
                    let row = `<li class="nav-item">
                                    <a href="/শিক্ষকের-তথ্য/${teacher.id}"
                                        class="nav-link py-0 pb-1 pt-1 border border-top-0 border-start-0 border-end-0 d-flex">
                                        <img src="{{ url('upload/images/teachers/${teacher.img}') }}" style="width: 50px; height: 45px;" alt="">
                                        <div class="ms-1">
                                            <div class=" text-decoration-underline" style="font-size: .9em; font-weight: 600;">${teacher.name}</div>
                                            <div style="font-size: .8em;">${teacher.position}</div>
                                        </div>
                                    </a>
                                </li>`;
                    searchNav.append(row);
                });
            } else {
                searchNav.empty();
                searchNav.removeClass("d-none");
                let row = `<li class="nav-item text-center">
                    শিক্ষকের তথ্য নেই 
                                </li>`;
                searchNav.append(row);
            }
        }
    }

    // function searchCloseButton()
    // {
    //     alert()
    // }
</script>
