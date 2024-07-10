<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="reset-edit-form" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">সেলাইডার আপডেট করুন</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{ url('assets/backend/images/demo.jpg') }}" id="showImageEdit" class="w-100"
                            style="height: 50vh;" alt="">
                    </div>
                    <input type="hidden" id="id">
                    <div class="col-md-6">
                        <label for="img" class="h5">সেলাইডার</label>
                        <input type="file" id="imgEdit" onchange="ImgChange(event, 'showImageEdit')"
                            class="imgEdit form-control">
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
    function getDataForUpdate(img) {
        let showImageEdit = document.getElementById('showImageEdit');
        showImageEdit.src = `{{ url('upload/images/sliders/${img}') }}`;
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
        let id = document.getElementById('id').value,
        imgEdit = document.getElementById('imgEdit').files[0],
        hideModal = document.querySelector('.hideEditModal'),
        resetForm = document.getElementById('reset-edit-form');

        if (!imgEdit) {
            errorToast("সেলাইডার ছবি বাসান!");
        } else {
            let formData = new FormData();
            formData.append('img', imgEdit);
            showLoader();
            const response = await axios.post("/admin/slider-update/" + id, formData);
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
