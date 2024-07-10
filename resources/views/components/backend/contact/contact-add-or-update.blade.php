<div class="container">
    <div class="row justify-content-md-start justify-content-center pb-md-0 pb-5">
        <div class="col-md-6 pe-md-2 pb-md-0 pb-3" id="contactColumn"></div>
        <div class="col-md-6 ps-md-2" id="contactPlaceholderColumn"></div>
    </div>
</div>


@section('script')
    <script>
        // start
        const getList = async () => {
            let contactColumn = $('#contactColumn');

            contactColumn.empty();

            showLoader();
            const response = await axios.get('/admin/contact-get');
            hideLoader();
            if (response.data.length > 0) {
                response.data.forEach(function(Contact, index) {
                    let row = `<div class="card">
                    <h4 class="card-header text-center">কনট্যাক্ট কন্টেন্ট আপডেট</h4>
                    <div class="card-body">
                            <input type="hidden" id="id" value="${Contact.id}">
                            <label for="title">টাইটেল</label>
                            <input type="text" id="title" class="mb-2 form-control" value="${Contact.title}">
                            <label for="des">ডিচকৃপশান</label>
                            <textarea id="des" class="mb-2 form-control" rows="5">${Contact.des}</textarea>
                            <div class="text-end">
                                <button type="button" onclick="update()" class="mt-2 btn btn-sm btn-dark">আপডেট করুন</button>
                            </div>
                    </div>
                </div>`;
                    contactColumn.append(row);
                });
            } else {
                let row = `
                <div class="card">
                    <h4 class="card-header text-center">কনট্যাক্ট কন্টেন্ট এ্যাড</h4>
                    <div class="card-body">
                            <label for="title">টাইটেল</label>
                            <input type="text" id="title" class="mb-2 form-control">
                            <label for="des">ডিচকৃপশান</label>
                            <textarea id="des" class="mb-2 form-control" rows="5"></textarea>
                    
                            <div class="text-end">
                                <button type="button" onclick="add()" class="mt-2 btn btn-sm btn-dark">এ্যাড করুন</button>    
                            </div>
                    </div>
                </div>`;
                contactColumn.append(row);
            }
        }
        getList();

        async function add() {
            let title = document.getElementById('title').value,
                des = document.getElementById('des').value;

            // des = content.replace(/<p><br><\/p>/g, '');
            if (title.length === 0) {
                errorToast("কনট্যাক্ট টাইটেল বাসান!");
            } else if (des.length === 0) {
                errorToast("ডিচকৃপশান বাসান!");
            } else {
                showLoader()
                const response = await axios.post('/admin/contact-store-or-update', {
                    title: title,
                    des: des
                });
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
                des = document.getElementById('des').value;

            // des = content.replace(/<p><br><\/p>/g, '');
            if (id.length === 0) {
                errorToast("দয়া করে আবার আপডেট করুন!");
            } else if (title.length === 0) {
                errorToast("কনট্যাক্ট টাইটেল বাসান!");
            } else if (des.length === 0) {
                errorToast("ডিচকৃপশান বাসান!");
            } else {
                showLoader()
                const response = await axios.post('/admin/contact-store-or-update', {
                    id: id,
                    title: title,
                    des: des
                });
                hideLoader();
                if (response.status === 200 && response.data.status === 'success') {
                    successToast(response.data.message);
                    await getList();
                }
            }
        }
        // completed
        const getPlaceholderList = async () => {
            let contactPlaceholderColumn = $('#contactPlaceholderColumn');

            contactPlaceholderColumn.empty();

            showLoader();
            const response = await axios.get('/admin/contact-placeholder-get');
            hideLoader();
            if (response.data.length > 0) {
                response.data.forEach(function(ContactPlaceHolder, index) {
                    let row = `<div class="card">
                    <h4 class="card-header text-center">কনট্যাক্ট প্যালেহোলডার আপডেট</h4>
                    <div class="card-body">
                        <input type="hidden" id="id" value="${ContactPlaceHolder.id}">
                        <label for="name">প্যালেহোলডার নাম</label>
                            <input type="text" id="name" class="mb-2 form-control" value="${ContactPlaceHolder.name}">
                            <label for="email">প্যালেহোলডার ইমেইল</label>
                            <input type="text" id="email" class="mb-2 form-control" value="${ContactPlaceHolder.email}">
                            <label for="mobile">প্যালেহোলডার ফোন</label>
                            <input type="text" id="mobile" class="mb-2 form-control" value="${ContactPlaceHolder.mobile}">
                            <label for="subject">প্যালেহোলডার বিষয়</label>
                            <input type="text" id="subject" class="mb-2 form-control" value="${ContactPlaceHolder.subject}">
                            <label for="details">প্যালেহোলডার বিস্তারিত</label>
                            <input type="text" id="details" class="mb-2 form-control" value="${ContactPlaceHolder.details}">
                            <button type="button" onclick="updatePlaceholder()" class="w-100 mt-2 btn btn-sm btn-dark">আপডেট করুন</button>
                    </div>
                </div>`;
                    contactPlaceholderColumn.append(row);
                });
            } else {
                let row = `<div class="card">
                    <h4 class="card-header text-center">কনট্যাক্ট প্যালেহোলডার এ্যাড</h4>
                    <div class="card-body">
                            <label for="name">প্যালেহোলডার নাম</label>
                            <input type="text" id="name" class="mb-2 form-control">
                            <label for="email">প্যালেহোলডার ইমেইল</label>
                            <input type="text" id="email" class="mb-2 form-control">
                            <label for="mobile">প্যালেহোলডার ফোন</label>
                            <input type="text" id="mobile" class="mb-2 form-control">
                            <label for="subject">প্যালেহোলডার বিষয়</label>
                            <input type="text" id="subject" class="mb-2 form-control">
                            <label for="details">প্যালেহোলডার বিস্তারিত</label>
                            <input type="text" id="details" class="mb-2 form-control">
                            <button type="button" onclick="addPlaceholder()" class="w-100 mt-2 btn btn-sm btn-dark">এ্যাড করুন</button>
                    </div>
                </div>`;
                contactPlaceholderColumn.append(row);
            }
        }
        getPlaceholderList();


        async function addPlaceholder() {
            let name = document.getElementById('name').value,
                email = document.getElementById('email').value,
                mobile = document.getElementById('mobile').value,
                subject = document.getElementById('subject').value,
                details = document.getElementById('details').value;

            if (name.length === 0) {
                errorToast("প্যালেহোলডার নাম বাসান!");
            } else if (email.length === 0) {
                errorToast("প্যালেহোলডার ইমেইল বাসান!");
            } else if (mobile.length === 0) {
                errorToast("প্যালেহোলডার ফোন বাসান!");
            } else if (subject.length === 0) {
                errorToast("প্যালেহোলডার বিষয় বাসান!");
            } else if (details.length === 0) {
                errorToast("প্যালেহোলডার বিস্তারিত বাসান!");
            } else {
                showLoader()
                const response = await axios.post('/admin/contact-placeholder-store-or-update', {
                    name: name,
                    email: email,
                    mobile: mobile,
                    subject: subject,
                    details: details
                });
                hideLoader();
                if (response.status === 200 && response.data.status === 'success') {
                    successToast(response.data.message);
                    await getPlaceholderList();
                }
            }
        }
        async function updatePlaceholder() {
            let id = document.getElementById('id').value,
                name = document.getElementById('name').value,
                email = document.getElementById('email').value,
                mobile = document.getElementById('mobile').value,
                subject = document.getElementById('subject').value,
                details = document.getElementById('details').value;

            if (id.length === 0) {
                errorToast("দয়া করে আবার আপডেট করুন!");
            } else if (name.length === 0) {
                errorToast("প্যালেহোলডার নাম বাসান!");
            } else if (email.length === 0) {
                errorToast("প্যালেহোলডার ইমেইল বাসান!");
            } else if (mobile.length === 0) {
                errorToast("প্যালেহোলডার ফোন বাসান!");
            } else if (subject.length === 0) {
                errorToast("প্যালেহোলডার বিষয় বাসান!");
            } else if (details.length === 0) {
                errorToast("প্যালেহোলডার বিস্তারিত বাসান!");
            } else {
                showLoader()
                const response = await axios.post('/admin/contact-placeholder-store-or-update', {
                    id: id,
                    name: name,
                    email: email,
                    mobile: mobile,
                    subject: subject,
                    details: details
                });
                hideLoader();
                if (response.status === 200 && response.data.status === 'success') {
                    successToast(response.data.message);
                    await getPlaceholderList();
                }
            }
        }
    </script>
@endsection
