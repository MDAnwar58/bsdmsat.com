<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-8" id="topbarColumn"></div>
    </div>
</div>

@section('script')
    <script>
        // $('#img').dropify({});

        const getList = async () => {
            let topbarColumn = $('#topbarColumn');

            topbarColumn.empty();

            showLoader();
            const response = await axios.get('/admin/get-topbar');
            hideLoader();
            if (response.data.length > 0) {
                response.data.forEach(function(topbar, index) {
                    let row = `<div class="card">
                <h4 class="card-header text-center">
                    <span>টপবার আপডেট করুন</span>
                </h4>
                <div class="card-body text-muted">
                    <input type="hidden" id="id" value="${topbar.id}">
                    <label for="email">ইমেইল</label>
                    <input type="email" id="email" class="mb-2 form-control" value="${topbar.email}">
                    <label for="mobile">ফোন নাম্বার</label>
                    <input type="text" id="mobile" class="mb-2 form-control" value="${topbar.mobile}">
                    <div class="row">
                        <div class="col-md-6 pe-1">
                            <label for="start_day">শুরুর দিন</label>
                            <input type="text" id="start_day" class="mb-2 form-control" value="${topbar.start_day}">
                        </div>
                        <div class="col-md-6 ps-1">
                            <label for="end_day">শেষর দিন</label>
                            <input type="text" id="end_day" class="mb-2 form-control" value="${topbar.end_day}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pe-1">
                            <label for="start_day">শুরুর সময়</label>
                            <input type="text" id="startTime" class="mb-2 form-control" value="${topbar.startTime}">
                        </div>
                        <div class="col-md-6 ps-1">
                            <label for="end_day">শেষ সময়</label>
                            <input type="text" id="endTime" class="mb-2 form-control" value="${topbar.endTime}">
                        </div>
                    </div>
                    <button type="button" onclick="topbarUpdate()" class="btn btn-sm btn-dark w-100">আপডেট করুন</button>
                </div>
            </div>`;
                    topbarColumn.append(row);
                });
            } else {
                let row = `<div class="card">
                <h4 class="card-header text-center">
                    <span>টপবার এ্যাড করুন</span>
                </h4>
                <div class="card-body">
                    <label for="email">ইমেইল</label>
                    <input type="email" id="email" class="mb-2 form-control">
                    <label for="mobile">ফোন নাম্বার</label>
                    <input type="text" id="mobile" class="mb-2 form-control">
                    <div class="row">
                        <div class="col-md-6 pe-1">
                            <label for="start_day">শুরুর দিন</label>
                            <input type="text" id="start_day" class="mb-2 form-control">
                        </div>
                        <div class="col-md-6 ps-1">
                            <label for="end_day">শেষর দিন</label>
                            <input type="text" id="end_day" class="mb-2 form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pe-1">
                            <label for="start_day">শুরুর সময়</label>
                            <input type="text" id="startTime" class="mb-2 form-control">
                        </div>
                        <div class="col-md-6 ps-1">
                            <label for="end_day">শেষ সময়</label>
                            <input type="text" id="endTime" class="mb-2 form-control">
                        </div>
                    </div>
                    <button type="button" onclick="topbarAdd()" class="btn btn-sm btn-dark w-100">এ্যাড করুন</button>
                </div>
            </div>`;
                topbarColumn.append(row);
            }
        }
        getList();

        async function topbarAdd() {
            let email = document.getElementById('email').value,
                mobile = document.getElementById('mobile').value,
                start_day = document.getElementById('start_day').value,
                end_day = document.getElementById('end_day').value,
                startTime = document.getElementById('startTime').value,
                endTime = document.getElementById('endTime').value;

            if (email.length === 0) {
                errorToast("ইমেইল বসান!");
            } else if (mobile.length === 0) {
                errorToast("ফোন নাম্বার বসান!");
            } else if (mobile.length < 11) {
                errorToast("ফোন নাম্বার ১১ টার বেশি হতে হবে!");
            } else if (mobile.length > 11) {
                errorToast("ফোন নাম্বার অবশ্যই ১১ টা হতে হবে!");
            } else if (start_day.length === 0) {
                errorToast("শুরুর দিন বসান!");
            } else if (end_day.length === 0) {
                errorToast("শেষর দিন বসান!");
            } else if (startTime.length === 0) {
                errorToast("ক্লাসের শুরুর সময় বসান!");
            } else if (endTime.length === 0) {
                errorToast("ক্লাসের শেষ সময় বসান!");
            } else {
                showLoader()
                const response = await axios.post('/admin/topbar-store-or-update', {
                    email: email,
                    mobile: mobile,
                    start_day: start_day,
                    end_day: end_day,
                    startTime: startTime,
                    endTime: endTime
                });
                hideLoader();
                if (response.status === 200 && response.data.status === 'success') {
                    successToast(response.data.message);
                    await getList();
                }
            }


        }

        async function topbarUpdate() {
            let id = document.getElementById('id').value,
                email = document.getElementById('email').value,
                mobile = document.getElementById('mobile').value,
                start_day = document.getElementById('start_day').value,
                end_day = document.getElementById('end_day').value,
                startTime = document.getElementById('startTime').value,
                endTime = document.getElementById('endTime').value;

            if (id.length === 0) {
                errorToast("দয়া করে আবার আপডেট করুন!");
            } else if (email.length === 0) {
                errorToast("ইমেইল বসান!");
            } else if (mobile.length === 0) {
                errorToast("ফোন নাম্বার বসান!");
            } else if (mobile.length < 11) {
                errorToast("ফোন নাম্বার ১১ টার বেশি হতে হবে!");
            } else if (mobile.length > 11) {
                errorToast("ফোন নাম্বার অবশ্যই ১১ টা হতে হবে!");
            } else if (start_day.length === 0) {
                errorToast("শুরুর দিন বসান!");
            } else if (end_day.length === 0) {
                errorToast("শেষর দিন বসান!");
            } else if (startTime.length === 0) {
                errorToast("ক্লাসের শুরুর সময় বসান!");
            } else if (endTime.length === 0) {
                errorToast("ক্লাসের শেষ সময় বসান!");
            } else {
                showLoader()
                const response = await axios.post('/admin/topbar-store-or-update', {
                    id: id,
                    email: email,
                    mobile: mobile,
                    start_day: start_day,
                    end_day: end_day,
                    startTime: startTime,
                    endTime: endTime
                });
                hideLoader();
                if (response.status === 200 && response.data.status === 'success') {
                    successToast(response.data.message);
                    await getList();
                }
            }


        }
        // async function Edit(id)
        // {
        //     const response = await axios.get('/admin/slider-edit/'+id);
        //     $("#id").val(response.data.id)
        //     getDataForUpdate(response.data.img)
        // }

        // function openDeleteModal(id)
        // {
        //     $("#deleteId").val(id);
        // }
    </script>
@endsection
