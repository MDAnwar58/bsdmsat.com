<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="reset-edit-form" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">শিক্ষকের তথ্য আপডেট করুন</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id">
                <div class="row justify-content-center">
                    <div class="col-md-6 pe-2">
                        <label for="name">নাম</label>
                        <input type="text" id="nameEdit" class="mb-2 form-control">
                        <label for="position">পদ</label>
                        <input type="text" id="positionEdit" class="mb-2 form-control">
                        <label for="indexNo">ইনডেক্স নং</label>
                        <input type="text" id="indexNoEdit" class="mb-2 form-control">
                    </div>
                    <div class="col-md-6 ps-2">
                        <label for="dateOfBirth">জন্ম তাং</label>
                        <input type="text" id="dateOfBirthEdit" class="mb-2 form-control">
                        <label for="joiningDate">যোগদানের তাং</label>
                        <input type="text" id="joiningDateEdit" class="mb-2 form-control">
                        <label for="educationalQualification">শিক্ষাগত যোগ্যতা</label>
                        <input type="text" id="educationalQualificationEdit" class="mb-2 form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="address">স্থায়ী ঠিকানা</label>
                        <input type="text" id="addressEdit" class="mb-2 form-control">
                    </div>
                    <div class="col-md-7 p-3">
                        <img src="{{ url('assets/backend/images/demo.jpg') }}" id="showImageEdit" class="w-100"
                            style="height: 35vh;" alt="">
                    </div>
                    <div class="col-md-7 p-3">
                        <label for="img" class="h5">ছবি</label>
                        <input type="file" id="imgEdit" onchange="ImgChange(event, 'showImageEdit')"
                            class="img form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="hideEditModal btn btn-secondary" data-bs-dismiss="modal">বাতিল করুন</button>
                <button type="button" onclick="updateForm()" class="btn btn-dark">আপডেট</button>
            </div>
        </form>
    </div>
</div>

<script>
    function getDataForUpdate(name, position, indexNo, dateOfBirth, joiningDate, educationalQualification, address,
        img) {
        document.getElementById('nameEdit').value = name;
        document.getElementById('positionEdit').value = position;
        document.getElementById('indexNoEdit').value = indexNo;
        document.getElementById('dateOfBirthEdit').value = dateOfBirth;
        document.getElementById('joiningDateEdit').value = joiningDate;
        document.getElementById('educationalQualificationEdit').value = educationalQualification;
        document.getElementById('addressEdit').value = address;
        let showImageEdit = document.getElementById('showImageEdit');
        showImageEdit.src = `{{ url('upload/images/teachers/${img}') }}`;
    }

    function ImgChange(event, imgShow) {
        const imageElement = document.getElementById(imgShow);

        const selectedFile = event.target.files[0];
        const imageURL = URL.createObjectURL(selectedFile);
        if (selectedFile) {
            imageElement.src = imageURL;
        }
    }
    async function updateForm() {
        let hideModal = document.querySelector('.hideEditModal'),
            resetForm = document.getElementById('reset-edit-form'),
            id = document.getElementById('id').value,
            name = document.getElementById('nameEdit').value,
            position = document.getElementById('positionEdit').value,
            indexNo = document.getElementById('indexNoEdit').value,
            dateOfBirth = document.getElementById('dateOfBirthEdit').value,
            joiningDate = document.getElementById('joiningDateEdit').value,
            educationalQualification = document.getElementById('educationalQualificationEdit').value,
            address = document.getElementById('addressEdit').value,
            img = document.getElementById('imgEdit').files[0];

        if (id.length === 0) {
            errorToast("দয়া করে আবার আপডেট করুন!");
        } else if (name.length === 0) {
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
        } else {
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
            const response = await axios.post("/admin/teacher-update/" + id, formData);
            hideLoader();
            console.log(response);
            if (response.status === 200 && response.data.status === "success") {
                successToast(response.data.message);
                hideModal.click();
                resetForm.reset();
                await getlist();
            }
        }
    }
</script>
