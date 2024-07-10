<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <h4 class="card-header d-flex justify-content-between">
                    <span>নোটিশ লিষ্ট</span>
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
                                    <th>টাইটেল</th>
                                    <th>কন্টেন্ট</th>
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

{{-- <td>${Notice.content.substr(0,10)+ "..."}</td> --}}

{{-- placeholder: 'Write your blog here.............', --}}
@section('script')
    <script>
        $('#content').summernote({
            height: 150
        });

        const getlist = async () => {
            let dataTable = $('#dataTable');
            let dataList = $('#dataList');

            dataTable.DataTable().destroy();
            dataList.empty();

            showLoader();
            const response = await axios.get('/admin/notice-get');
            hideLoader();
            response.data.forEach(function(Notice, index) {
                let row = `<tr>
                                <td>${index + 1}</td>
                                <td>${Notice.title}</td>
                                <td>${Notice.content.slice(0, 30) + (Notice.content.length > 10 ? "..." : "")}</td>
                                <td>
                                    ${Notice.img !== null ? `<img src="{{ url('upload/images/notice/${Notice.img}') }}" style="width: 100px;" alt="">` : ''}
                                </td>
                                <td>
                                    <button type="button" onclick="Edit(${Notice.id})" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#edit">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </button>    
                                    <button type="button" onclick="openDeleteModal(${Notice.id})" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete">
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
                lengthMenu: [3, 5, 10, 15, 20],
                info: true,
                responsive: true,
                searching: true
            });
        }
        getlist();

        async function Edit(id) {
            const response = await axios.get('/admin/notice-edit/' + id);
            $("#id").val(response.data.id);
            getDataForUpdate(response.data.title, response.data.content, response.data.img);
        }

        function openDeleteModal(id) {
            $("#deleteId").val(id);
        }
    </script>
@endsection
