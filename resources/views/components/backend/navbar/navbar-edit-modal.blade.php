<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form id="reset-edit-form" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ফুটার ইউজফুল লিংক আপডেট</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id">
                <label for="name">মেনু</label>
                <input type="text" id="name_edit" class=" form-control">
                <label for="link">লিংক </label>
                <input type="text" id="linkEdit" class=" form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="hideEditModal btn btn-secondary" data-bs-dismiss="modal">বাতিল করুন</button>
                <button type="button" onclick="updateForm()" class="btn btn-dark">আপডেট</button>
            </div>
        </form>
    </div>
</div>

<script>
    async function getForUpdate(name, link) {
        document.getElementById('name_edit').value = name;
        document.getElementById('linkEdit').value = link;
    }
    async function updateForm() {
        let id = document.getElementById('id').value,
            name = document.getElementById('name_edit').value,
            link = document.getElementById('linkEdit').value,
            hideModal = document.querySelector('.hideEditModal'),
            resetForm = document.getElementById('reset-edit-form');

        if (id.length === 0) {
            errorToast("দয়া করে আবার আপডেট করুন!")
        } else if (name.length === 0) {
            errorToast("মেনু বাসান!");
        } else if (link.length === 0) {
            errorToast("লিংক বাসান!");
        } else {
            showLoader();
            const response = await axios.post("/admin/navbar-update/" + id, {
                name: name,
                link: link
            });
            hideLoader();
            resetForm.reset();
            if (response.status === 200 && response.data.status === "success") {
                successToast(response.data.message);
                hideModal.click();
                await getNavbar();
            }
        }
    }
</script>
