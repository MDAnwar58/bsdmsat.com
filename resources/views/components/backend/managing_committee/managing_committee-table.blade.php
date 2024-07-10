<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <h4 class="card-header d-flex justify-content-between">
                    <span>ম্যানেজিং কমিটি/গভর্ণিং বডি</span>
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
        const getlist = async () => {
            let dataTable = $('#dataTable');
            let dataList = $('#dataList');

            dataTable.DataTable().destroy();
            dataList.empty();

            showLoader();
            const response = await axios.get('/admin/managing-committee-get');
            hideLoader();
            response.data.forEach(function(member, index) {
                let row = `<tr>
                                <td>${index + 1}</td>
                                <td>
                                    ${member.name}
                                </td>
                                <td>
                                    ${member.position}
                                </td>
                                <td>
                                    <button type="button" onclick="Edit(${member.id})" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#edit">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </button>    
                                    <button type="button" onclick="openDeleteModal(${member.id})" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete">
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
                searching: false
            });
        }
        getlist();

        async function Edit(id) {
            const response = await axios.get('/admin/managing-committee-edit/' + id);
            $("#id").val(response.data.id)
            getDataForUpdate(response.data.name, response.data.position)
        }

        function openDeleteModal(id) {
            $("#deleteId").val(id);
        }
    </script>
@endsection
