<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form id="reset-form" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">এ্যাডেড ন্যাভবার মেনু</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="name">মেনু</label>
                <input type="text" id="name" class="mb-2 form-control">
                <label for="category">লিংক</label>
                <input type="text" id="link" class="mb-2 form-control">
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
        // alert("Sdf")
        let resetForm = document.getElementById('reset-form'),
            name = document.getElementById('name').value,
            link = document.getElementById('link').value;
        let hideModal = document.querySelector('.hideModal');
        if (name.length === 0) {
            errorToast("মেনু বাসান!");
        } else if (link.length === 0) {
            errorToast("লিংক বাসান!");
        } else {
            resetForm.reset();
            showLoader();
            const response = await axios.post('/admin/navbar-store', {
                name: name,
                link: link
            });
            hideLoader();
            if (response.status === 200 && response.data.status === "success") {
                successToast(response.data.message);
                hideModal.click();
                await getNavbar();
            }
        }
    }
</script>
