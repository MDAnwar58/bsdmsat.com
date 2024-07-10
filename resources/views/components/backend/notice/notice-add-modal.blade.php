<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="reset-form" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Notice</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="title">টাইটেল</label>
                <input type="text" id="title" class="mb-2 form-control">
                <label for="content">কন্টেন্ট</label>
                <textarea id="content" rows="4" class="mb-2 form-control"></textarea>
                <img src="{{ url('assets/backend/images/demo.jpg') }}" id="showImage" class="w-100 mt-3"
                    style="height: 45vh;" alt="">
                <label for="img" class="h5">নোটিশ ছবি</label>
                <input type="file" id="img" onchange="ImgChange(event, 'showImage')" class="img form-control">
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
            title = document.getElementById('title').value,
            content = document.getElementById('content').value,
            img = document.getElementById('img').files[0];

        if (title.length === 0) {
            errorToast("টাইটেল বাসান!");
        } else if (content.length === 0) {
            errorToast("কন্টেন্ট বাসান!");
        } else {
            resetForm.reset();
            showImage.src = "http://localhost:8000/assets/images/demo.jpg";
            let formData = new FormData();
            formData.append('title', title);
            formData.append('content', content);
            formData.append('img', img);

            showLoader();
            const response = await axios.post('/admin/notice-store', formData);
            hideLoader();
            if (response.status === 200 && response.data.status === "success") {
                successToast(response.data.message);
                hideModal.click();
                await getlist();
            }
        }
    }
</script>
