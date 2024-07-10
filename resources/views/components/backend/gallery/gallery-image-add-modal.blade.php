<!-- Modal -->
<div class="modal fade" id="addImage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form id="reset-image-form" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">এ্যাডেড গ্যালারি ছবি</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="category">ক্যাটাগরি</label>
                <select id="gallery_category_id" class=" form-control">
                    <option value="">(সিলেক্ট ক্যাটাগরি)</option>
                </select>
                <label for="category">ছবি</label>
                <img src="{{ url('assets/backend/images/demo.jpg') }}" id="showGalleryImage" class="w-100" height="150px"
                    alt="">
                <input type="file" id="img" onchange="ImgChange(event, 'showGalleryImage')" class=" form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="hideGalleryImageModal btn btn-secondary" data-bs-dismiss="modal">বাতিল করুন</button>
                <button type="button" onclick="addGalleryImageForm()" class="btn btn-dark">এ্যাড করুন</button>
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
    const addGalleryImageForm = async () => {
        let resetForm = document.getElementById('reset-image-form');
        let showGalleryImage = document.getElementById('showGalleryImage');
        let gallery_category_id = document.getElementById('gallery_category_id').value;
        let img = document.getElementById('img').files[0];
        let hideModal = document.querySelector('.hideGalleryImageModal');
        if (gallery_category_id.length === 0) {
            errorToast("ক্যাটাগরি বাসান!");
        }else if (!img) {
            errorToast("গ্যালারি ছবি বাসান!");
        }else{
            resetForm.reset();
            let formData = new FormData();
            formData.append('gallery_category_id', gallery_category_id);
            formData.append('img', img);
            showLoader();
            const response = await axios.post('/admin/gallery-image-store', formData);
            hideLoader();
            if (response.status === 200 && response.data.status === "success") {
                showGalleryImage.src = "{{ url('assets/backend/images/demo.jpg') }}";
                successToast(response.data.message);
                hideModal.click();
                await getGalleryImage();
            }
        }
    }
</script>
