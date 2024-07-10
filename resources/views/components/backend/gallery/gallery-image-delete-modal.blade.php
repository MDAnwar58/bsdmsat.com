<div class="modal" tabindex="-1" id="deleteImageGallery">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class="mt-3 text-warning">ডিলিট !</h3>
                <p class="md-3">এই ডাটাটি ডিলিট করুন</p>
                <input type="hidden" id="deleteGalleryImageId">
            </div>
            <div class="modal-footer">
                <button type="button" id="delete-gallery-image-modal-close" class="btn bg-secondary text-light"
                    data-bs-dismiss="modal">না</button>
                <button type="button" onclick="dataGalleryImageDelete()" class="btn bg-danger text-light">হ্যা</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function dataGalleryImageDelete() {
        let id = document.getElementById("deleteGalleryImageId").value;
        let closeDeleteModal = document.getElementById("delete-gallery-image-modal-close");
        showLoader();
        let response = await axios.get('/admin/gallery-image-destroy/' + id);
        hideLoader();
        if (response.status === 200 && response.data.status === "success") {
            closeDeleteModal.click();
            successToast(response.data.message);
            await getGalleryImage();
        } else {
            errorToast("Request failed!");
        }
    }
</script>
