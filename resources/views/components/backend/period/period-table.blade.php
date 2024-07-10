<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <h4 class="card-header d-flex justify-content-between">
                    <span>পিরিয়ড লিস্ট</span>
                    <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#add">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                </h4>
                <div class="card-body px-0 pt-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    {{-- <th>S.No</th> --}}
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
            const response = await axios.get('/admin/period-get');
            hideLoader();
            response.data.forEach(function(period, index) {
                let row = `<tr>
                                <td>${period.No}</td>
                                <td>${period.position}</td>
                                <td>${period.firstPeriod}</td>
                                <td>${period.secondPeriod}</td>
                                <td>${period.thirdPeriod}</td>
                                <td>${period.fourthPeriod}</td>
                                <td>${period.fifthPeriod}</td>
                                <td>${period.sixthPeriod}</td>
                                <td>${period.seventhPeriod}</td>
                                <td>${period.eighthPeriod}</td>
                                <td>${period.comment}</td>
                                <td>
                                    <button type="button" onclick="Edit(${period.id})" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#edit">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </button>    
                                    <button type="button" onclick="openDeleteModal(${period.id})" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete">
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
            const response = await axios.get('/admin/period-edit/' + id);
            $("#id").val(response.data.id)
            getDataForUpdate(response.data.No, response.data.position, response.data.firstPeriod, response.data.secondPeriod, response.data.thirdPeriod, response.data.fourthPeriod, response.data.fifthPeriod, response.data.sixthPeriod, response.data.seventhPeriod, response.data.eighthPeriod, response.data.comment)
        }

        function openDeleteModal(id) {
            $("#deleteId").val(id);
        }
    </script>
@endsection
