<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form id="reset-form" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">সদস্য এ্যাড</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="name">নাম</label>
                <input type="text" id="name" class="mb-2 form-control">
                <label for="position">পদ</label>
                <input type="text" id="position" class="mb-2 form-control">
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
        let resetForm = document.getElementById('reset-form'),
            hideModal = document.querySelector('.hideModal'),
            name = document.getElementById('name').value,
            position = document.getElementById('position').value;
        if (name.length === 0) {
            errorToast("নাম বাসান!");
        } else if (position.length === 0) {
            errorToast("পদ বাসান!");
        } else {
            resetForm.reset();
            showLoader();
            const response = await axios.post('/admin/managing-committee-store', {
                name: name,
                position: position
            });
            hideLoader();
            if (response.status === 200 && response.data.status === "success") {
                successToast(response.data.message);
                hideModal.click();
                await getlist();
            }
        }
    }
</script>
