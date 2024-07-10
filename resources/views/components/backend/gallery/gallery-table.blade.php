<div class="container">
    <div class="row justify-content-sm-start justify-content-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-6 pe-sm-1 pe-0 pb-sm-0 pb-2" id="GalleryColumn">

        </div>
        <div class="col-lg-9 col-md-8 col-sm-8 col-12 mb-3">
            <div class="card">
                <h4 class="card-header d-flex justify-content-between">
                    <span>গ্যালারি ক্যাটাগরি লিস্ট</span>
                    <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#add">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                </h4>
                <div class="card-body px-0 pt-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="dataCategoryTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ক্যাটাগরি</th>
                                    <th>একসান বাটোন</th>
                                </tr>
                            </thead>
                            <tbody id="dataCategoryList"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <h4 class="card-header d-flex justify-content-between">
                    <span>গ্যালারি ছবি লিস্ট</span>
                    <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal"
                        data-bs-target="#addImage">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                </h4>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="dataGalleryImageTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ক্যাটাগরি</th>
                                    <th>গ্যালারি ছবি</th>
                                    <th>একসান বাটোন</th>
                                </tr>
                            </thead>
                            <tbody id="dataGalleryImageList"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
    <script>
        const getGalleryCategoryList = async () => {
            let dataCategoryTable = $('#dataCategoryTable');
            let dataCategoryList = $('#dataCategoryList');

            dataCategoryTable.DataTable().destroy();
            dataCategoryList.empty();

            showLoader();
            const response = await axios.get('/admin/gallery-category-get');
            hideLoader();
            response.data.forEach(function(galleryCategory, index) {
                let row = `<tr>
                            <td>${index + 1}</td>
                            <td>
                                ${galleryCategory.name}
                            </td>
                            <td>
                                <button type="button" onclick="EditGalleryCategory(${galleryCategory.id})" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#edit">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </button>    
                                <button type="button" onclick="openGalleryCategoryDeleteModal(${galleryCategory.id})" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>    
                            </td>
                        </tr>`;
                dataCategoryList.append(row);
            });

            dataCategoryTable.DataTable({
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
        getGalleryCategoryList();

        async function EditGalleryCategory(id) {
            const response = await axios.get('/admin/gallery-category-edit/' + id);
            $("#id").val(response.data.id)
            getGalleryCategoryForUpdate(response.data.name)
        }

        function openGalleryCategoryDeleteModal(id) {
            $("#deleteId").val(id);
        }



        async function getGallery() {
            let GalleryColumn = $("#GalleryColumn");

            GalleryColumn.empty();

            const response = await axios.get("/admin/gallery-get");
            if (response.data.length > 0) {
                response.data.forEach((gallery, index) => {
                    let row = `<div class="card">
                <div class="card-body">
                    <input type="hidden" id="galleryId" value="${gallery.id}">
                    <input type="text" id="galleryNameEdit" class=" form-control" value="${gallery.name}" placeholder="gallery title">
                    <div class="text-center">
                        <button type="button" onclick="updateGallery()" class="btn btn-outline-dark btn-sm mt-2">আপডেট</button>
                    </div>
                </div>
            </div>`;

                    GalleryColumn.append(row);
                });
            } else {
                let row = `<div class="card">
                <div class="card-body">
                    <input type="text" id="galleryName" class=" form-control" placeholder="gallery title">
                    <div class="text-center">
                        <button type="button" onclick="galleryAdd()" class="btn btn-outline-dark btn-sm mt-2">এ্যাড করুন</button>
                    </div>
                </div>
            </div>`;

                GalleryColumn.append(row);
            }
        }
        getGallery();

        async function galleryAdd() {
            const name = document.getElementById("galleryName").value;
            if (name.length === 0) {
                errorToast("গ্যালারি নাম বাসান");
            } else {
                showLoader();
                const response = await axios.post('/admin/gallery-store-or-update', {
                    name: name
                });
                hideLoader();
                if (response.status === 200 && response.data.status === "success") {
                    console.log(response);
                    successToast(response.data.message);
                    await getGallery();
                }
            }
        }

        async function updateGallery() {
            let id = document.getElementById("galleryId").value;
            let name = document.getElementById("galleryNameEdit").value;
            if (id.length === 0) {
                errorToast("দয়া করে আবার আপডেট করুন!");
            } else if (name.length === 0) {
                errorToast("গ্যালারি নাম বাসান");
            } else {
                showLoader();
                const response = await axios.post('/admin/gallery-store-or-update', {
                    id: id,
                    name: name
                });
                hideLoader();
                if (response.status === 200 && response.data.status === "success") {
                    console.log(response);
                    successToast(response.data.message);
                    await getGallery();
                }
            }
        }


        const getGalleryCategoryForImageOption = async () => {
            let galleryCategoryId = $('#gallery_category_id');
            galleryCategoryId.empty();
            showLoader()
            const response = await axios.get('/admin/gallery-category-get');
            hideLoader();
            if (response.data.length > 0) {
                response.data.forEach((CategoryOption, index) => {
                    let row = `<option value="${CategoryOption.id}">${CategoryOption.name}</option>`;
                    galleryCategoryId.append(row);
                });
            } else {
                let row = `<option value="">(Category not available)</option>`;
                galleryCategoryId.append(row);
            }
        }
        getGalleryCategoryForImageOption();

        const getGalleryImage = async () => {
            let dataGalleryImageTable = $('#dataGalleryImageTable');
            let dataGalleryImageList = $('#dataGalleryImageList');

            dataGalleryImageTable.DataTable().destroy();
            dataGalleryImageList.empty();

            showLoader();
            const response = await axios.get('/admin/gallery-image-get');
            hideLoader();
            response.data.forEach(function(galleryImage, index) {
                let row = `<tr>
                            <td>${index + 1}</td>
                            <td>
                                ${galleryImage.category.name}
                            </td>
                            <td>
                                <img src="http://localhost:8000/upload/images/gallery/${galleryImage.img}" style="width: 150px;" alt="" />
                            </td>
                            <td>
                                <button type="button" onclick="EditGalleryImage(${galleryImage.id})" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editImageGallery">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </button>    
                                <button type="button" onclick="openGalleryImageDeleteModal(${galleryImage.id})" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteImageGallery">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>    
                            </td>
                        </tr>`;
                dataGalleryImageList.append(row);
            });

            dataGalleryImageTable.DataTable({
                order: [
                    [0, 'desc']
                ],
                lengthChange: true,
                lengthMenu: [3, 5, 10, 15, 20],
                info: true,
                responsive: true,
                searching: true
            });
        }
        getGalleryImage();

        async function EditGalleryImage(id) {
            const response = await axios.get('/admin/gallery-image-edit/' + id);
            $("#galleryImageId").val(response.data.id)
            getGalleryImageForUpdate(response.data.gallery_category_id, response.data.img)
        }

        function openGalleryImageDeleteModal(id) {
            $("#deleteGalleryImageId").val(id);
        }
    </script>
@endsection
