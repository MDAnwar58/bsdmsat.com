<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="reset-form" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">অফিস কর্মচারির তথ্য এ্যাড</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-6 pe-2">
                        <label for="name">নাম</label>
                        <input type="text" id="name" class="mb-2 form-control">
                        <label for="position">পদ</label>
                        <input type="text" id="position" class="mb-2 form-control">
                        <label for="indexNo">ইনডেক্স নং</label>
                        <input type="text" id="indexNo" class="mb-2 form-control">
                    </div>
                    <div class="col-md-6 ps-2">
                        <label for="dateOfBirth">জন্ম তাং</label>
                        <input type="text" id="dateOfBirth" class="mb-2 form-control">
                        <label for="joiningDate">যোগদানের তাং</label>
                        <input type="text" id="joiningDate" class="mb-2 form-control">
                        <label for="educationalQualification">শিক্ষাগত যোগ্যতা</label>
                        <input type="text" id="educationalQualification" class="mb-2 form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="address">স্থায়ী ঠিকানা</label>
                        <input type="text" id="address" class="mb-2 form-control">
                    </div>
                    <div class="col-md-7 p-3">
                        <img src="{{ url('assets/backend/images/demo.jpg') }}" id="showImage" class="w-100"
                            style="height: 35vh;" alt="">
                    </div>
                    <div class="col-md-7 p-3">
                        <label for="img" class="h5">ছবি</label>
                        <input type="file" id="img" onchange="ImgChange(event, 'showImage')"
                            class="img form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="hideModal btn btn-secondary" data-bs-dismiss="modal">বাতিল করুন</button>
                <button type="button" onclick="addForm()" class="btn btn-dark">এ্যাড করুন</button>
            </div>
        </form>
    </div>
</div>

<script>
    function ImgChange(event, imgShow) {
        const imageElement = document.getElementById(imgShow);

        const selectedFile = event.target.files[0];
        const imageURL = URL.createObjectURL(selectedFile);
        if (selectedFile) {
            imageElement.src = imageURL;
        }
    }

    const addForm = async () => {
        let resetForm = document.getElementById('reset-form'),
            showImage = document.getElementById('showImage'),
            hideModal = document.querySelector('.hideModal'),
            name = document.getElementById('name').value,
            position = document.getElementById('position').value,
            indexNo = document.getElementById('indexNo').value,
            dateOfBirth = document.getElementById('dateOfBirth').value,
            joiningDate = document.getElementById('joiningDate').value,
            educationalQualification = document.getElementById('educationalQualification').value,
            address = document.getElementById('address').value,
            img = document.getElementById('img').files[0];
            
        if (name.length === 0) {
            errorToast("নাম বাসান!");
        } else if (position.length === 0) {
            errorToast("পদ বাসান!");
        } else if (indexNo.length === 0) {
            errorToast("ইনডেক্স নং বাসান!");
        } else if (dateOfBirth.length === 0) {
            errorToast("জন্ম তাং বাসান!");
        } else if (joiningDate.length === 0) {
            errorToast("যোগদানের তাং বাসান!");
        } else if (educationalQualification.length === 0) {
            errorToast("শিক্ষাগত যোগ্যতা বাসান!");
        } else if (address.length === 0) {
            errorToast("স্থায়ী ঠিকানা বাসান!");
        } else if (!img) {
            errorToast("ছবি বাসান!");
        } else {
            resetForm.reset();
            showImage.src = "{{ url('assets/backend/images/demo.jpg') }}";
            let formData = new FormData();
            formData.append('name', name);
            formData.append('position', position);
            formData.append('indexNo', indexNo);
            formData.append('dateOfBirth', dateOfBirth);
            formData.append('joiningDate', joiningDate);
            formData.append('educationalQualification', educationalQualification);
            formData.append('address', address);
            formData.append('img', img);

            showLoader();
            const response = await axios.post('/admin/office_worker-store', formData);
            hideLoader();
            if (response.status === 200 && response.data.status === "success") {
                successToast(response.data.message);
                hideModal.click();
                await getlist();
            }
        }
    }
</script>
