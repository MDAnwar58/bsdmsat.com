<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form id="reset-form" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">এ্যাডেড গ্যালারি ক্যাটাগরি</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="category">ক্যাটাগরি</label>
                <input type="text" id="name" class=" form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="hideModal btn btn-secondary" data-bs-dismiss="modal">বাতিল করুন</button>
                <button type="button" onclick="addForm()" class="btn btn-dark">এ্যাড করুন</button>
            </div>
        </form>
    </div>
</div>

<script>

    const addForm = async () => {
        let resetForm = document.getElementById('reset-form');
        let name = document.getElementById('name').value;
        let hideModal = document.querySelector('.hideModal');
        if(name.length === 0)
        {
            errorToast("ক্যাটাগরি বাসান!");
        }else
        {
            resetForm.reset();
            showLoader();
            const response = await axios.post('/admin/gallery-category-store', {
                name: name
            });
            hideLoader();
            if (response.status === 200 && response.data.status === "success") {
                successToast(response.data.message);
                hideModal.click();
                await getGalleryCategoryList();
                await getGalleryImage();
                await getGalleryCategoryForImageOption();
            }
        }
    }
</script>
