<div class="container">
    <div class="row justify-content-sm-start justify-content-center">
        <div class="col-md-6 pe-sm-1 pe-0 pb-md-0 pb-2" id="FooterLogoPartColumn"></div>
        <div class="col-md-6 mb-3">
            <div class="card">
                <h4 class="card-header d-flex justify-content-between">
                    <span>ফুটার ইউজফুল লিংক লিস্ট</span>
                    <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#add">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                </h4>
                <div class="card-body px-0 pt-0">
                    <div class="row justify-content-center py-2">
                        <div class="col-xl-6 col-md-8 col-sm-5 col-8" id="footerUsefulLinkTitle"></div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="dataFooterUsefulLinkTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>মেনু</th>
                                    <th>লিংক</th>
                                    <th>একসান বাটোন</th>
                                </tr>
                            </thead>
                            <tbody id="dataFooterUsefulLinkList"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-md-3 mt-0">
            <div class="col-lg-6 col-md-7" id="footerQuickContact">

            </div>
        </div>
    </div>
</div>
@section('script')
    <script>
        // start
        async function getFooterLogoPart() {
            let FooterLogoPartColumn = $("#FooterLogoPartColumn");

            FooterLogoPartColumn.empty();

            const response = await axios.get("/admin/footer-logo-part-get");
            if (response.data.length > 0) {
                response.data.forEach((Footer, index) => {
                    let row = `<div class="card">
                <h4 class="card-header text-center">ফুটার লোগো পার্ট আপডেট করুন</h4>
                <div class="card-body">
                    <div class="col-12">
                        <img src="{{ url('upload/images/footer_logo/${Footer.logo}') }}" id="imgShow" width="100px" height="40px" alt="">
                    </div>
                    <label for="logo">লোগো</label>
                    <input type="hidden" id="footerLogoPartId" value="${Footer.id}">
                    <input type="file" id="logo" onchange="ImgChange(event, 'imgShow')" class="mb-2 form-control">
                    <label for="short_des">ডিচকৃপশান</label>
                    <textarea id="short_des" rows="4" class="mb-2 form-control">${Footer.short_des}</textarea>
                    <button type="button" onclick="updateFooterLogoPart()" class=" btn btn-sm btn-dark w-100">আপডেট করুন</button>
                </div>
            </div>`;

                    FooterLogoPartColumn.append(row);
                });
            } else {
                let row = `<div class="card">
                <h4 class="card-header text-center">ফুটার লোগো পার্ট এ্যাড করুন</h4>
                <div class="card-body">
                    <div class="col-12">
                        <img src="{{ url('assets/backend/images/demo.jpg') }}" id="imgShow" width="100px" height="40px" alt="">
                    </div>
                    <label for="logo">লোগো</label>
                    <input type="file" id="logo" onchange="ImgChange(event, 'imgShow')" class=" mb-2 form-control">
                    <label for="short_des">ডিচকৃপশান</label>
                    <textarea id="short_des" rows="4" class=" form-control mb-2"></textarea>
                    <button type="button" onclick="FooterLogoPartAdd()" class="w-100 btn btn-sm btn-dark">এ্যাড করুন</button>
                </div>
            </div>`;

                FooterLogoPartColumn.append(row);
            }
        }
        getFooterLogoPart();

        function ImgChange(event, imgShow) {
            const imageElement = document.getElementById(imgShow);

            const selectedFile = event.target.files[0];
            const imageURL = URL.createObjectURL(selectedFile);
            if (selectedFile) {
                imageElement.src = imageURL;
            }
        }

        async function FooterLogoPartAdd() {
            let logo = document.getElementById("logo").files[0],
                short_des = document.getElementById("short_des").value;
            if (!logo) {
                errorToast("ফুটার লোগো বাসান!");
            } else if (short_des.length === 0) {
                errorToast("ফুটার ডিচকৃপশান বাসান!");
            } else {
                let formData = new FormData();
                formData.append("logo", logo);
                formData.append("short_des", short_des);
                showLoader();
                const response = await axios.post('/admin/footer-logo-part-store-or-update', formData);
                hideLoader();
                if (response.status === 200 && response.data.status === "success") {
                    console.log(response);
                    successToast(response.data.message);
                    await getFooterLogoPart();
                }
            }
        }

        async function updateFooterLogoPart() {
            let id = document.getElementById("footerLogoPartId").value,
                logo = document.getElementById("logo").files[0],
                short_des = document.getElementById("short_des").value;
            if (id.length === 0) {
                errorToast("দয়া করে আবার আপডেট করুন!");
            } else if (short_des.length === 0) {
                errorToast("ফুটার ডিচকৃপশান বাসান!");
            } else {
                let formData = new FormData();
                formData.append("id", id);
                formData.append("logo", logo);
                formData.append("short_des", short_des);
                showLoader();
                const response = await axios.post('/admin/footer-logo-part-store-or-update', formData);
                hideLoader();
                if (response.status === 200 && response.data.status === "success") {
                    console.log(response);
                    successToast(response.data.message);
                    await getFooterLogoPart();
                }
            }
        }


        const footerUsefulLinkTitle = async () => {
            let footerUsefulLinkTitle = $("#footerUsefulLinkTitle");
            footerUsefulLinkTitle.empty();
            showLoader();
            const response = await axios.get("/admin/footer-usefulLink-title-part-get");
            hideLoader();
            if (response.data.length > 0) {
                response.data.forEach((FooterUsefulLinkTitle, index) => {
                    let row = `<div class="input-group">
                    <input type="hidden" id="idTitle" value="${FooterUsefulLinkTitle.id}">
                    <input type="text" id="name" class="form-control" value="${FooterUsefulLinkTitle.name}">
                    <button type="button" onclick="updateFooterUsefulLinkTitle()" class=" btn btn-sm btn-dark">আপডেট</button>
                    </div>`;
                    footerUsefulLinkTitle.append(row);
                });
            } else {
                let row = `<div class="input-group">
                    <input type="text" id="name" class="form-control" value="">
                    <button type="button" onclick="addFooterUsefulLinkTitle()" class=" btn btn-sm btn-dark">এ্যাড</button>
                    </div>`;
                footerUsefulLinkTitle.append(row);
            }
        }
        footerUsefulLinkTitle();

        async function addFooterUsefulLinkTitle() {
            let name = document.getElementById("name").value;
            if (name.length === 0) {
                errorToast("ফুটার ইউজফুল লিংক টাইটেল বাসান!")
            } else {
                showLoader();
                const response = await axios.post("/admin/footer-usefulLink-title-part-store-or-update", {
                    name:name
                });
                hideLoader();
                if (response.status === 200 && response.data.status === "success") {
                    successToast(response.data.message);
                    await footerUsefulLinkTitle();
                }
            }
        }
        async function updateFooterUsefulLinkTitle() {
            let id = document.getElementById("idTitle").value;
            let name = document.getElementById("name").value;
            if (id.length === 0) {
                errorToast("দয়া করে আবার আপডেট করুন!")
            } else if (name.length === 0) {
                errorToast("ফুটার ইউজফুল লিংক টাইটেল বাসান!")
            } else {
                showLoader();
                const response = await axios.post("/admin/footer-usefulLink-title-part-store-or-update", {
                    id:id,
                    name:name
                });
                hideLoader();
                if (response.status === 200 && response.data.status === "success") {
                    successToast(response.data.message);
                    await footerUsefulLinkTitle();
                }
            }
        }


        const getForAddedManus = async () => {
            let showManu = $('.showManu');
            showLoader();
            const response = await axios.get("/admin/navbar-get");
            hideLoader();
            response.data.forEach((manu, index) => {
                let row = `<option value="${manu.secondManus}">${manu.secondManus}</option>
                <option value="${manu.thirdManus}">${manu.thirdManus}</option>
                <option value="${manu.fourthManus}">${manu.fourthManus}</option>
                <option value="${manu.fifthManus}">${manu.fifthManus}</option>
                <option value="${manu.sixthManus}">${manu.sixthManus}</option>
                <option value="${manu.seventhManus}">${manu.seventhManus}</option>`;
                showManu.append(row);
            });
        }
        getForAddedManus();

        const getFooterUsefulLink = async () => {
            let dataFooterUsefulLinkTable = $('#dataFooterUsefulLinkTable');
            let dataFooterUsefulLinkList = $('#dataFooterUsefulLinkList');

            dataFooterUsefulLinkTable.DataTable().destroy();
            dataFooterUsefulLinkList.empty();

            showLoader();
            const response = await axios.get('/admin/footer-usefulLink-get');
            hideLoader();
            response.data.forEach(function(FooterUsefulLink, index) {
                let row = `<tr>
                            <td>
                                ${index + 1}
                            </td>
                            <td>
                                ${FooterUsefulLink.manus}
                            </td>
                            <td>
                                <b>${FooterUsefulLink.link}</b>
                            </td>
                            <td>
                                <button type="button" onclick="EditFooterUsefulLInk(${FooterUsefulLink.id})" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#edit">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </button>    
                                <button type="button" onclick="openFooterUsefulLInkDeleteModal(${FooterUsefulLink.id})" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>    
                            </td>
                        </tr>`;
                dataFooterUsefulLinkList.append(row);
            });

            dataFooterUsefulLinkTable.DataTable({
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
        getFooterUsefulLink();

        async function EditFooterUsefulLInk(id) {
            const response = await axios.get('/admin/footer-usefulLink-edit/' + id);
            $("#id").val(response.data.id)
            getFooterUsefulLinkForUpdate(response.data.manus, response.data.link)
        }

        function openFooterUsefulLInkDeleteModal(id) {
            $("#deleteId").val(id);
        }

        const getFooterQuickContact = async () => {
            let footerQuickContact = $('#footerQuickContact');

            footerQuickContact.empty();

            showLoader();
            const response = await axios.get('/admin/footer-quick-contact-part-get');
            hideLoader();
            if (response.data.length > 0) {
                response.data.forEach(function(FooterQuickContact, index) {
                    let row = `<div class="card">
                    <h4 class="card-header text-center">
                        <span>ফুটার কুইক কনট্যাক্ট আপডেট</span>
                    </h4>
                    <form id="add-quick-contact-form" class="card-body">
                        <input type="hidden" id="idEdit" value="${FooterQuickContact.id}">
                        <label for="title">টাইটেল</label>
                        <input type="text" id="title" class="form-control mb-2" value="${FooterQuickContact.title}">
                        <label for="mobile">ফোন</label>
                        <input type="text" id="mobile" class="form-control mb-2" value="${FooterQuickContact.mobile}">
                        <label for="email">ইমেইল</label>
                        <input type="text" id="email" class="form-control mb-2" value="${FooterQuickContact.email}">
                        <label for="address">এ্যাড্রেস</label>
                        <input type="text" id="address" class="form-control mb-2" value="${FooterQuickContact.address}">
                        <button type="button" onclick="updateFooterQuickContactForm()" class=" form-control btn btn-sm btn-dark">আপডেট করুন</button>
                    </form>
                </div>`;
                    footerQuickContact.append(row);
                });
            } else {
                let row = `<div class="card">
                    <h4 class="card-header text-center">
                        <span>ফুটার কুইক কনট্যাক্ট এ্যাড</span>
                    </h4>
                    <form id="add-quick-contact-form" class="card-body">
                        <label for="title">টাইটেল</label>
                        <input type="text" id="title" class="form-control mb-2">
                        <label for="mobile">ফোন</label>
                        <input type="text" id="mobile" class="form-control mb-2">
                        <label for="email">ইমেইল</label>
                        <input type="email" id="email" class="form-control mb-2">
                        <label for="address">এ্যাড্রেস</label>
                        <input type="text" id="address" class="form-control mb-2">
                        <button type="button" onclick="addFooterQuickContactForm()" class=" form-control btn btn-sm btn-dark">এ্যাড করুন</button>
                    </form>
                </div>`;
                footerQuickContact.append(row);
            }
        }
        getFooterQuickContact();

        async function addFooterQuickContactForm() {
            let addQuickContactForm = document.getElementById('add-quick-contact-form'),
                title = document.getElementById("title").value,
                mobile = document.getElementById("mobile").value,
                email = document.getElementById("email").value,
                address = document.getElementById("address").value;

            if (title.length === 0) {
                errorToast("টাইটেল বাসান!");
            } else if (mobile.length === 0) {
                errorToast("ফোন নাম্বার বাসান!");
            } else if (mobile.length < 11) {
                errorToast("আপনার মোবাইল নাম্বারটি অবশ্যই ১১ টা হতে হবে!");
            } else if (mobile.length > 11) {
                errorToast("আপনার মোবাইল নাম্বারটি ১১ টার বেশি হতে হবে!");
            } else if (email.length === 0) {
                errorToast("ইমেইল বাসান!");
            } else if (address.length === 0) {
                errorToast("এ্যাড্রেস বাসান!");
            } else {
                showLoader();
                const response = await axios.post("/admin/footer-quick-contact-part-store-or-update", {
                    title: title,
                    mobile: mobile,
                    email: email,
                    address: address
                });
                hideLoader();
                if (response.status === 200 && response.data.status === 'success') {
                    successToast(response.data.message);
                    addQuickContactForm.reset();
                    await getFooterQuickContact();
                }
            }
        }

        async function updateFooterQuickContactForm() {
            let addQuickContactForm = document.getElementById('add-quick-contact-form'),
                id = document.getElementById("idEdit").value,
                title = document.getElementById("title").value,
                mobile = document.getElementById("mobile").value,
                email = document.getElementById("email").value,
                address = document.getElementById("address").value;

            if (id.length === 0) {
                errorToast("Please Try Again!");
            } else if (title.length === 0) {
                errorToast("টাইটেল বাসান!");
            } else if (mobile.length === 0) {
                errorToast("ফোন নাম্বার বাসান!");
            } else if (mobile.length < 11) {
                errorToast("আপনার মোবাইল নাম্বারটি অবশ্যই ১১ টা হতে হবে!");
            } else if (mobile.length > 11) {
                errorToast("আপনার মোবাইল নাম্বারটি ১১ টার বেশি হতে হবে!");
            } else if (email.length === 0) {
                errorToast("ইমেইল বাসান!");
            } else if (address.length === 0) {
                errorToast("এ্যাড্রেস বাসান!");
            } else {
                showLoader();
                const response = await axios.post("/admin/footer-quick-contact-part-store-or-update", {
                    id: id,
                    title: title,
                    mobile: mobile,
                    email: email,
                    address: address
                });
                hideLoader();
                if (response.status === 200 && response.data.status === 'success') {
                    successToast(response.data.message);
                    addQuickContactForm.reset();
                    await getFooterQuickContact();
                }
            }
        }
    </script>
@endsection
