<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="reset-edit-form" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">অফিস কর্মচারির তথ্য আপডেট করুন</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id">
                <label for="title">টাইটেল</label>
                <input type="text" id="titleEdit" class="mb-2 form-control">
                <label for="content">কন্টেন্ট</label>
                <div id="contentShow">

                </div>
                <img src="{{ url('assets/backend/images/demo.jpg') }}" id="showImageEdit" class="w-100 mt-3" style="height: 45vh;"
                    alt="">
                <label for="img" class="h5">নোটিশ ছবি</label>
                <input type="file" id="imgEdit" onchange="ImgChange(event, 'showImageEdit')"
                    class="img form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="hideEditModal btn btn-secondary" data-bs-dismiss="modal">বাতিল
                    করুন</button>
                <button type="button" onclick="updateForm()" class="btn btn-dark">আপডেট</button>
            </div>
        </form>
    </div>
</div>

<script>
    function getDataForUpdate(title, content, img) {
        document.getElementById('titleEdit').value = title;
        let contentShow = document.getElementById('contentShow');
        contentShow.innerHTML = `<textarea id="contentEdit" rows="4" class="mb-2 form-control">${content}</textarea>`;
        let showImageEdit = document.getElementById('showImageEdit');
        showImageEdit.src = `{{ url('upload/images/notice/${img}') }}`;
        
        $('#contentEdit').summernote({
            height: 150
        });
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
            title = document.getElementById('titleEdit').value,
            content = document.getElementById('contentEdit').value,
            img = document.getElementById('imgEdit').files[0];

        if (id.length === 0) {
            errorToast("দয়া করে আবার আপডেট করুন!");
        } else if (title.length === 0) {
            errorToast("টাইটেল বাসান!");
        } else if (content.length === 0) {
            errorToast("কন্টেন্ট বাসান!");
        } else {
            let formData = new FormData();
            formData.append('title', title);
            formData.append('content', content);
            formData.append('img', img);
            showLoader();
            const response = await axios.post("/admin/notice-update/" + id, formData);
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
