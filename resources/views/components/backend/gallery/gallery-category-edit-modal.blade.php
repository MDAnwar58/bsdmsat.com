<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form id="reset-edit-form" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">গ্যালারি ক্যাটাগরি আপডেট করুন</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id">
                <label for="category">ক্যাটাগরি</label>
                <input type="text" id="nameEdit" class=" form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="hideEditModal btn btn-secondary" data-bs-dismiss="modal">বাতিল করুন</button>
                <button type="button" onclick="updateGalleryCategoryForm()" class="btn btn-dark">আপডেট করুন</button>
            </div>
        </form>
    </div>
</div>

<script>
    function getGalleryCategoryForUpdate(name) {
        document.getElementById('nameEdit').value = name;
    }
    async function updateGalleryCategoryForm() {
        let id = document.getElementById('id').value,
        name = document.getElementById('nameEdit').value,
        hideModal = document.querySelector('.hideEditModal'),
        resetForm = document.getElementById('reset-edit-form');

        if (name.length === 0) {
            errorToast("ক্যাটাগরি বাসান!");
        } else {
            showLoader();
            const response = await axios.post("/admin/gallery-category-update/" + id, {name:name});
            hideLoader();
            resetForm.reset();
            if (response.status === 200 && response.data.status === "success") {
                successToast(response.data.message);
                hideModal.click();
                await getGalleryCategoryList();
                await getGalleryImage();
            }
        }
    }
</script>
