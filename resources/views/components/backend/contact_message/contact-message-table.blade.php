<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <h4 class="card-header d-flex justify-content-between">
                    <span>কনট্যাক্ট মেসেজ লিস্ট</span>
                </h4>
                <div class="card-body px-0 pt-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>নাম</th>
                                    <th>মোবাইল নাম্বার</th>
                                    <th>বিষয়</th>
                                    <th>রিড/আনরিড</th>
                                    <th>একসান বাটোন</th>
                                </tr>
                            </thead>
                            <tbody id="dataList">
                                @foreach ($contactMessages as $contactMessage)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                            {{ $contactMessage->name }}
                                        </td>
                                        <td>{{ $contactMessage->mobile }}</td>
                                        <td>{{ $contactMessage->subject }}</td>
                                        <td>
                                            @if ($contactMessage->is_read == 0)
                                                <span class="badge bg-warning">আনরিড</span>
                                            @else
                                                <span class="badge bg-success">রিড</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.contact.message.view', $contactMessage->id) }}"
                                                class="btn btn-sm btn-outline-secondary">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@section('script')
    <script>
        // const getlist = async () => {
        //     let dataTable = $('#dataTable');
        //     let dataList = $('#dataList');

        //     dataTable.DataTable().destroy();
        //     dataList.empty();

        //     showLoader();
        //     const response = await axios.get('/admin/contact-message-get');
        //     hideLoader();
        //     response.data.forEach(function(contactMessage, index) {
        //         let row = `<tr>
    //                         <td>${index + 1}</td>
    //                         <td>
    //                             ${contactMessage.name}
    //                         </td>
    //                         <td>${contactMessage.mobile}</td>
    //                         <td>${contactMessage.subject}</td>
    //                         <td>${contactMessage.is_read === 0 ? `<span class="badge bg-warning">আনরিড</span>` : `<span class="badge bg-success">রিড</span>`}</td>
    //                         <td>
    //                             <button type="button" onclick="view(${contactMessage.id})" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#view">
    //                                 <i class="fa fa-eye" aria-hidden="true"></i>
    //                             </button>    
    //                         </td>
    //                     </tr>`;
        //         dataList.append(row);
        //     });

        //     dataTable.DataTable({
        //         order: [
        //             [0, 'desc']
        //         ],
        //         // paging: true,
        //         // pageLength: 10,
        //         // lengthChange: false,
        //         lengthMenu: [3, 5, 10, 15, 20],
        //         info: true,
        //         responsive: true,
        //         searching: false
        //     });
        // }
        // getlist();
        showLoader();
        setTimeout(() => {
            hideLoader();
        }, 1500);

        let dataTable = $('#dataTable');
        dataTable.DataTable({
            order: [
                [0, 'desc']
            ],
            lengthMenu: [3, 5, 10, 15, 20],
            info: true,
            responsive: true,
            searching: true
        });


        // async function view(id) {
        //     const response = await axios.get('/admin/contact-message-view/' + id);
        //     await getMsgCount();
        //     // await getlist();
        //     // await getMsgCountForNav();
        //     viewUserData(response.data.name, response.data.mobile, response.data.subject, response.data.msg)
        // }
    </script>
@endsection
