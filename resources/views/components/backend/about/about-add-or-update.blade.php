<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12" id="aboutColumn" style="overflow-x: scroll;"></div>
        <div class="col-lg-5 col-md-8 py-5">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title">জমির লিস্ট</h5>
                    <button type="button" class=" btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#add">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>জমির পরিমান</th>
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
        const getList = async () => {
            let aboutColumn = $('#aboutColumn');

            aboutColumn.empty();

            showLoader();
            const response = await axios.get('/admin/about-get');
            hideLoader();
            if (response.data.length > 0) {
                response.data.forEach(function(About, index) {
                    let row = `
        <div class="card">
            <h4 class="card-header text-center">মাদ্রাসা সম্পর্কিত তথ্য আপডেট</h4>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 pe-2">
                        <input type="hidden" id="id" value="${About.id}">
                        <label for="title">টাইটেল</label>
                        <input type="text" id="title" class="mb-2 form-control" value="${About.title}">
                        <label for="name">মাদ্রাসার নাম</label>
                        <input type="text" id="name" class="mb-2 form-control" value="${About.name}">
                        <label for="short_des">সট ডিসকৃপসান</label>
                        <textarea id="short_des" class="mb-2 form-control" rows="5">${About.short_des}</textarea>
                    </div>
                    <div class="col-md-6 ps-2">
                        <img src="{{ url('upload/images/about/${About.img}') }}" id="imgShow" class="w-100" height="200px" alt="">
                        <label for="img">ছবি</label>
                        <input type="file" id="img" onchange="ImgChange(event, 'imgShow')" class="mb-2 form-control">
                    </div>

                    <label for="des">ডিসকৃপসান</label>
                    <textarea id="des" class="des form-control">${About.des}</textarea>
                    <label for="des" class="mt-2">এক্সট্রা ডিসকৃপসান</label>
                    <textarea id="extraDes" class="extraDes form-control">${About.extraDes}</textarea>
                    <button type="button" onclick="update()" class="mt-2 btn btn-sm btn-dark">আপডেট</button>
                </div>
            </div>
        </div>`;
                    aboutColumn.append(row);
                });
            } else {
                let row = `
        <div class="card">
            <h4 class="card-header text-center">মাদ্রাসা সম্পর্কিত তথ্য এ্যাড</h4>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 pe-2">
                        <label for="title">টাইটেল</label>
                        <input type="text" id="title" class="mb-2 form-control">
                        <label for="name">মাদ্রাসার নাম</label>
                        <input type="text" id="name" class="mb-2 form-control">
                        <label for="short_des">সট ডিসকৃপসান</label>
                        <textarea id="short_des" class="mb-2 form-control" rows="5"></textarea>
                    </div>
                    <div class="col-md-6 ps-2">
                        <img src="{{ url('assets/backend/images/demo.jpg') }}" id="imgShow" class="w-100" height="200px" alt="">
                        <label for="img">ছবি</label>
                        <input type="file" id="img" onchange="ImgChange(event, 'imgShow')" class="mb-2 form-control">
                    </div>

                    <label for="des">ডিসকৃপসান</label>
                    <textarea id="des" class="des form-control"></textarea>
                    <label for="des" class="mt-2">এক্সট্রা ডিসকৃপসান</label>
                    <textarea id="extraDes" class="extraDes form-control"></textarea>
                    <button type="button" onclick="add()" class="mt-2 btn btn-sm btn-dark">এ্যাড করুন</button>
                </div>
            </div>
        </div>`;
                aboutColumn.append(row);
            }
            $('.des').summernote({
                placeholder: 'Write your blog here.............',
                height: 150
            });
            $('.extraDes').summernote({
                placeholder: 'Write your blog here.............',
                height: 150
            });
        }
        getList();

        function ImgChange(event, imgShow) {
            const imageElement = document.getElementById(imgShow);

            const selectedFile = event.target.files[0];
            const imageURL = URL.createObjectURL(selectedFile);
            if (selectedFile) {
                imageElement.src = imageURL;
            }
        }
        async function add() {
            let title = document.getElementById('title').value,
                name = document.getElementById('name').value,
                short_des = document.getElementById('short_des').value,
                img = document.getElementById('img').files[0],
                content = $('#des').summernote('code'),
                extraContent = $('#extraDes').summernote('code');

            des = content.replace(/<p><br><\/p>/g, '');
            extraDes = extraContent.replace(/<p><br><\/p>/g, '');


            if (title.length === 0) {
                errorToast("টাইটেল বাসান!");
            } else if (name.length === 0) {
                errorToast("মাদ্রাসার নাম বাসান!");
            } else if (short_des.length === 0) {
                errorToast("সট ডিসকৃপসান বাসান!");
            } else if (!img) {
                errorToast("ছবি বাসান!");
            } else if (des === '') {
                errorToast("ডিসকৃপসান বাসান!");
            } else {
                let formData = new FormData();
                formData.append('title', title);
                formData.append('name', name);
                formData.append('short_des', short_des);
                formData.append('img', img);
                formData.append('des', des);
                formData.append('extraDes', extraDes);
                showLoader()
                const response = await axios.post('/admin/about-store-or-update', formData);
                hideLoader();
                if (response.status === 200 && response.data.status === 'success') {
                    successToast(response.data.message);
                    await getList();
                }
            }


        }

        async function update() {
            let id = document.getElementById('id').value,
                title = document.getElementById('title').value,
                name = document.getElementById('name').value,
                short_des = document.getElementById('short_des').value,
                img = document.getElementById('img').files[0],
                content = $('#des').summernote('code'),
                extraContent = $('#extraDes').summernote('code');

            des = content.replace(/<p><br><\/p>/g, '');
            extraDes = extraContent.replace(/<p><br><\/p>/g, '');


            if (id.length === 0) {
                errorToast("Please Try Again!");
            } else if (title.length === 0) {
                errorToast("টাইটেল বাসান!");
            } else if (name.length === 0) {
                errorToast("মাদ্রাসার নাম বাসান!");
            } else if (short_des.length === 0) {
                errorToast("সট ডিসকৃপসান বাসান!");
            } else if (des === '') {
                errorToast("ডিসকৃপসান বাসান!");
            } else {
                let formData = new FormData();
                formData.append('id', id);
                formData.append('title', title);
                formData.append('name', name);
                formData.append('short_des', short_des);
                formData.append('img', img);
                formData.append('des', des);
                formData.append('extraDes', extraDes);
                showLoader()
                const response = await axios.post('/admin/about-store-or-update', formData);
                hideLoader();
                if (response.status === 200 && response.data.status === 'success') {
                    successToast(response.data.message);
                    await getList();
                }
            }
        }

        async function getLandList() {
            let dataTable = $("#dataTable");
            let dataList = $("#dataList");

            dataTable.DataTable().destroy();
            dataList.empty();

            showLoader();
            const response = await axios.get('/admin/land-get');
            hideLoader();
            response.data.forEach(function(land, index) {
                let row = `<tr>
                                    <td>${index + 1}</td>
                                    <td>${land.number}</td>
                                    <td>
                                        <button type="button" onclick="Edit(${land.id})" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#edit">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </button>    
                                        <button type="button" onclick="openDeleteModal(${land.id})" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete">
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
                pageLength: 5,
                lengthChange: false,
                // lengthMenu: [3, 5, 10, 15, 20],
                info: false,
                responsive: true,
                searching: false
            });
        }
        getLandList();

        async function Edit(id) {
            const response = await axios.get('/admin/land-edit/' + id);
            $("#idEdit").val(response.data.id)
            getLandForUpdate(response.data.number)
        }

        function openDeleteModal(id) {
            $("#deleteId").val(id);
        }
    </script>
@endsection
