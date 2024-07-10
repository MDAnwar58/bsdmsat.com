<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <h4 class="card-header d-flex justify-content-between">
                    <span>শিক্ষক লিস্ট</span>
                    <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#add">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                </h4>
                <div class="card-body px-0 pt-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>নাম</th>
                                    <th>পদ</th>
                                    <th>ইনডেক্স নং</th>
                                    <th>জন্ম তাং</th>
                                    <th>যোগদানের তাং</th>
                                    <th>শিক্ষাগত যোগ্যতা</th>
                                    <th>স্থায়ী ঠিকানা</th>
                                    <th>ছবি</th>
                                    <th>একসান বাটোন</th>
                                </tr>
                            </thead>
                            <tbody id="dataList"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script>
        //     document.addEventListener("DOMContentLoaded", function() {
        //     var dateInput = document.getElementById("licence_date");

        //     dateInput.addEventListener("input", function() {
        //         var selectedDate = new Date(dateInput.value);
        //         var formattedDate = selectedDate.toLocaleDateString(
        //         "bn-BD"); // "bn-BD" represents Bengali (Bangladesh)
        //         dateInput.value = formattedDate;
        //     });
        // });
        // $('#img').dropify({});

        const getlist = async () => {
            let dataTable = $('#dataTable');
            let dataList = $('#dataList');

            dataTable.DataTable().destroy();
            dataList.empty();

            showLoader();
            const response = await axios.get('/admin/teacher-get');
            hideLoader();
            response.data.forEach(function(Teacher, index) {
                let row = `<tr>
                                <td>${index + 1}</td>
                                <td>${Teacher.name}</td>
                                <td>${Teacher.position}</td>
                                <td>${Teacher.indexNo}</td>
                                <td>${Teacher.dateOfBirth}</td>
                                <td>${Teacher.joiningDate}</td>
                                <td>${Teacher.educationalQualification}</td>
                                <td>${Teacher.address}</td>
                                <td>
                                    <img src="{{ url('upload/images/teachers/${Teacher.img}') }}" style="width: 100px;" alt="">    
                                </td>
                                <td>
                                    <button type="button" onclick="Edit(${Teacher.id})" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#edit">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </button>    
                                    <button type="button" onclick="openDeleteModal(${Teacher.id})" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>    
                                </td>
                            </tr>`;
                dataList.append(row);
            });

            dataTable.DataTable({
                order: [
                    [0, 'desc']
                ],
                // paging: true,
                // pageLength: 10,
                // lengthChange: false,
                lengthMenu: [3, 5, 10, 15, 20],
                info: true,
                responsive: true,
                searching: true
            });
        }
        getlist();

        async function Edit(id) {
            const response = await axios.get('/admin/teacher-edit/' + id);
            $("#id").val(response.data.id)
            getDataForUpdate(response.data.name, response.data.position, response.data.indexNo, response.data.dateOfBirth, response.data.joiningDate, response.data.educationalQualification, response.data.address, response.data.img)
        }

        function openDeleteModal(id) {
            $("#deleteId").val(id);
        }
    </script>
@endsection
