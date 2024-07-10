<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-2 col-md-3 col-sm-4 col-6 pe-sm-1 pe-0 pb-sm-0 pb-2" id="logoColumn"></div>
        <div class="col-lg-6 col-md-9 col-sm-8 col-12" id="navbarColumn">

        </div>
    </div>
</div>

@section('script')
    <script>
        const getNavbar = async () => {
            // let dataTable = $('#dataTable');
            let navbarColumn = $('#navbarColumn');

            // dataTable.DataTable().destroy();
            navbarColumn.empty();

            showLoader();
            const response = await axios.get('/admin/navbar-get');
            hideLoader();
            if (response.data.length > 0) {
                response.data.forEach(function(navbar, index) {
                    let row = `<div class="card">
                <h4 class="card-header text-center">
                    <span>ন্যাভবার আপডেট করুন</span>
                </h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 pe-2">
                            <input type="hidden" id="navbarId" value="${navbar.id}">
                            <label for="firstManus">১ম মেনু</label>
                            <input type="text" id="firstManus" class="mb-2 form-control" value="${navbar.firstManus}">
                            <label for="secondManus">২য় মেনু</label>
                            <input type="text" id="secondManus" class="mb-2 form-control" value="${navbar.secondManus}">
                            <label for="thirdManus">৩য় মেনু</label>
                            <input type="text" id="thirdManus" class="mb-2 form-control" value="${navbar.thirdManus}">
                            <label for="fourthManus">৪র্থ মেনু</label>
                            <input type="text" id="fourthManus" class="mb-2 form-control" value="${navbar.fourthManus}">
                        </div>
                        <div class="col-md-6 ps-2">
                            <label for="fifthManus">৫ম মেনু</label>
                            <input type="text" id="fifthManus" class="mb-2 form-control" value="${navbar.fifthManus}">
                            <label for="sixthManus">৬ষ্ঠ মেনু</label>
                            <input type="text" id="sixthManus" class="mb-2 form-control" value="${navbar.sixthManus}">
                            <label for="seventhManus">৭ম মেনু</label>
                            <input type="text" id="seventhManus" class="mb-2 form-control" value="${navbar.seventhManus}">
                            <label for="eighthManus">৮ম মেনু</label>
                            <input type="text" id="eighthManus" class="mb-2 form-control" value="${navbar.eighthManus}">
                        </div>
                    </div>

                    <button type="button" onclick="update()" class="btn btn-sm btn-dark w-100">আপডেট করুন</button>
                </div>
            </div>`;
                    navbarColumn.append(row);
                });
            } else {
                let row = `<div class="card">
                <h4 class="card-header text-center">
                    <span>ন্যাভবার এ্যাড করুন</span>
                </h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 pe-2">
                            <label for="firstManus">১ম মেনু</label>
                            <input type="text" id="firstManus" class="mb-2 form-control">
                            <label for="secondManus">২য় মেনু</label>
                            <input type="text" id="secondManus" class="mb-2 form-control">
                            <label for="thirdManus">৩য় মেনু</label>
                            <input type="text" id="thirdManus" class="mb-2 form-control">
                            <label for="fourthManus">৪র্থ মেনু</label>
                            <input type="text" id="fourthManus" class="mb-2 form-control">
                        </div>
                        <div class="col-md-6 ps-2">
                            <label for="fifthManus">৫ম মেনু</label>
                            <input type="text" id="fifthManus" class="mb-2 form-control">
                            <label for="sixthManus">৬ষ্ঠ মেনু</label>
                            <input type="text" id="sixthManus" class="mb-2 form-control">
                            <label for="seventhManus">৭ম মেনু</label>
                            <input type="text" id="seventhManus" class="mb-2 form-control">
                            <label for="eighthManus">৮ম মেনু</label>
                            <input type="text" id="eighthManus" class="mb-2 form-control">
                        </div>
                    </div>

                    <button type="button" onclick="add()" class="btn btn-sm btn-dark w-100">এ্যাড করুন</button>
                </div>
            </div>`;
                navbarColumn.append(row);
            }
        }
        getNavbar();

        async function add() {
            let firstManus = document.getElementById("firstManus").value,
                secondManus = document.getElementById("secondManus").value,
                thirdManus = document.getElementById("thirdManus").value,
                fourthManus = document.getElementById("fourthManus").value,
                fifthManus = document.getElementById("fifthManus").value,
                sixthManus = document.getElementById("sixthManus").value,
                seventhManus = document.getElementById("seventhManus").value,
                eighthManus = document.getElementById("eighthManus").value;

            if (firstManus.length === 0) {
                errorToast("১ম মেনু বসান!");
            } else if (secondManus.length === 0) {
                errorToast("২য় মেনু বসান!");
            } else if (thirdManus.length === 0) {
                errorToast("৩য় মেনু বসান!");
            } else if (fourthManus.length === 0) {
                errorToast("৪র্থ মেনু বসান!");
            } else if (fifthManus.length === 0) {
                errorToast("৫ম মেনু বসান!");
            } else {
                showLoader();
                const response = await axios.post("/admin/navbar-store-or-update", {
                    firstManus: firstManus,
                    secondManus: secondManus,
                    thirdManus: thirdManus,
                    fourthManus: fourthManus,
                    fifthManus: fifthManus,
                    sixthManus: sixthManus,
                    seventhManus: seventhManus,
                    eighthManus: eighthManus
                });
                hideLoader();
                if (response.status === 200 && response.data.status === 'success') {
                    successToast(response.data.message);
                    await getNavbar();
                }
            }
        }

        async function update() {
            let id = document.getElementById("navbarId").value,
                firstManus = document.getElementById("firstManus").value,
                secondManus = document.getElementById("secondManus").value,
                thirdManus = document.getElementById("thirdManus").value,
                fourthManus = document.getElementById("fourthManus").value,
                fifthManus = document.getElementById("fifthManus").value,
                sixthManus = document.getElementById("sixthManus").value,
                seventhManus = document.getElementById("seventhManus").value,
                eighthManus = document.getElementById("eighthManus").value;

            if (id.length === 0) {
                errorToast("Please Again Try!");
            } else if (firstManus.length === 0) {
                errorToast("First Manu Required!");
            } else if (secondManus.length === 0) {
                errorToast("Second Manu Required!");
            } else if (thirdManus.length === 0) {
                errorToast("Third Manu Required!");
            } else if (fourthManus.length === 0) {
                errorToast("Fourth Manu Required!");
            } else if (fifthManus.length === 0) {
                errorToast("Fifth Manu Required!");
            } else {
                showLoader();
                const response = await axios.post("/admin/navbar-store-or-update", {
                    id: id,
                    firstManus: firstManus,
                    secondManus: secondManus,
                    thirdManus: thirdManus,
                    fourthManus: fourthManus,
                    fifthManus: fifthManus,
                    sixthManus: sixthManus,
                    seventhManus: seventhManus,
                    eighthManus: eighthManus
                });
                hideLoader();
                if (response.status === 200 && response.data.status === 'success') {
                    successToast(response.data.message);
                    await getNavbar();
                }
            }
        }


        async function getLogo() {
            let logoColumn = $("#logoColumn");

            logoColumn.empty();

            const response = await axios.get("/admin/get-logo");
            if (response.data.length > 0) {
                response.data.forEach((logo, index) => {
                    let row = `<div class="card">
                <div class="card-body">
                    <img src="{{ url('upload/images/logo/${logo.img}') }}" id="showEditLogo" class="w-100" height="50px"
                        alt="">
                    <label for="logo">লোগ চেন্জ</label>
                    <input type="hidden" id="logoId" value="${logo.id}" />
                    <input type="file" id="logo" onchange="logoUpdate(event, 'showEditLogo')" class=" form-control">
                </div>
            </div>`;

                    logoColumn.append(row);
                });
            } else {
                let row = `<div class="card">
                <div class="card-body">
                    <img src="{{ url('assets/backend/images/demo.jpg') }}" id="showLogo" class="w-100" height="50px"
                        alt="">
                    <label for="logo">লোগ</label>
                    <input type="file" id="logo" onchange="logoStore(event, 'showLogo')" class=" form-control">
                </div>
            </div>`;

                logoColumn.append(row);
            }
        }
        getLogo();

        async function logoStore(event, showLogo) {
            const imageElement = document.getElementById(showLogo);

            const logo = event.target.files[0];
            const imageURL = URL.createObjectURL(logo);
            if (!logo) {
                errorToast("Logo Required!");
            } else {
                let formData = new FormData();
                formData.append('img', logo);
                showLoader();
                const response = await axios.post("/admin/logo-store-or-update", formData);
                hideLoader();
                if (response.status === 200 && response.data.status === 'success') {
                    successToast(response.data.message);
                    imageElement.src = imageURL;
                    await getLogo();
                }
            }
        }
        async function logoUpdate(event, showEditLogo) {
            const imageElement = document.getElementById(showEditLogo);
            const id = document.getElementById("logoId").value;
            const logo = event.target.files[0];
            const imageURL = URL.createObjectURL(logo);
            if (!logo) {
                errorToast("Logo Required!");
            } else {
                let formData = new FormData();
                formData.append('id', id);
                formData.append('img', logo);
                showLoader();
                const response = await axios.post("/admin/logo-store-or-update", formData);
                hideLoader();
                console.log(response);
                if (response.status === 200 && response.data.status === 'success') {
                    successToast(response.data.message);
                    imageElement.src = imageURL;
                    await getLogo();
                }
            }
        }
    </script>
@endsection
