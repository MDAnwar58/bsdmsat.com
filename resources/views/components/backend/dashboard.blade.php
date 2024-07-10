<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-sm-6 px-lg-2 px-4 pb-2 px-2">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-md-8 text-center">
                            <i class="fa fa-user fs-3" aria-hidden="true"></i>
                            <div class="fs-5 fw-bold text-secondary" id="students">Students</div>
                        </div>
                        <div class="col-md-4 d-flex align-items-center justify-content-center">
                            <span class="fs-2 fw-blod" id="students_count">00</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6 px-lg-2 px-4 pb-2 px-2">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-md-8 text-center">
                            <i class="fa fa-user-circle-o fs-3" aria-hidden="true"></i>
                            <div class="fs-5 fw-bold text-secondary" id="teachers">Teachers</div>
                        </div>
                        <div class="col-md-4 d-flex align-items-center justify-content-center">
                            <span class="fs-2 fw-blod" id="teachers_count">00</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6 px-lg-2 px-4 pb-2 px-2">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-md-8 text-center">
                            <i class="fa fa-user-secret fs-3" aria-hidden="true"></i>
                            <div class="fs-5 fw-bold text-secondary" id="authorities">Authorities</div>
                        </div>
                        <div class="col-md-4 d-flex align-items-center justify-content-center">
                            <span class="fs-2 fw-blod" id="authorities_count">00</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6 px-lg-2 px-4 pb-2 px-2">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <i class="fa fa-book fs-3" aria-hidden="true"></i>
                            <div class="fs-5 fw-bold text-secondary" id="books">Books</div>
                        </div>
                        <div class="col-md-6 d-flex align-items-center justify-content-center">
                            <span class="fs-2 fw-blod" id="books_count">00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script>
        async function functionName() {
            let students = document.getElementById("students"),
                students_count = document.getElementById("students_count"),
                teachers = document.getElementById("teachers"),
                teachers_count = document.getElementById("teachers_count"),
                authorities = document.getElementById("authorities"),
                authorities_count = document.getElementById("authorities_count"),
                books = document.getElementById("books"),
                books_count = document.getElementById("books_count");

            showLoader();
            const response = await axios.get("/admin/sector-get");
            hideLoader();
            response.data.forEach((sector, index) => {
                students.innerText = sector.sName;
                students_count.innerText = sector.student_count;
                teachers.innerText = sector.tName;
                teachers_count.innerText = sector.teacher_count;
                authorities.innerText = sector.aName;
                authorities_count.innerText = sector.authority_count;
                books.innerText = sector.bName;
                books_count.innerText = sector.book_count;
            });
        }
        functionName();
    </script>
@endsection
