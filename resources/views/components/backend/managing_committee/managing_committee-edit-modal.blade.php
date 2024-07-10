<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form id="reset-edit-form" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">সদস্য আপডেট করুন</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id">
                <label for="name">নাম</label>
                <input type="text" id="name_edit" class="mb-2 form-control">
                <label for="position">পদ</label>
                <input type="text" id="position_edit" class="mb-2 form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="hideEditModal btn btn-secondary" data-bs-dismiss="modal">বাতিল করুন</button>
                <button type="button" onclick="updateForm()" class="btn btn-dark">আপডেট</button>
            </div>
        </form>
    </div>
</div>

<script>
    function getDataForUpdate(name, position) {
        let name_edit = document.getElementById('name_edit').value = name;
        let position_edit = document.getElementById('position_edit').value = position;
    }

    async function updateForm() {
        let id = document.getElementById('id').value,
            name = document.getElementById('name_edit').value,
            position = document.getElementById('position_edit').value,
            hideModal = document.querySelector('.hideEditModal'),
            resetForm = document.getElementById('reset-edit-form');

        if (name.length === 0) {
            errorToast("নাম বাসান!");
        } else if (position.length === 0) {
            errorToast("পদ বাসান!");
        } else {
            showLoader();
            const response = await axios.post("/admin/managing-committee-update/" + id, {
                name: name,
                position: position
            });
            hideLoader();
            if (response.status === 200 && response.data.status === "success") {
                successToast(response.data.message);
                hideModal.click();
                resetForm.reset();
                await getlist();
            }
        }
    }
</script>
