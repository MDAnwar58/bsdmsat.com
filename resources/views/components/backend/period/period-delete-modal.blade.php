<div class="modal" tabindex="-1" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class="mt-3 text-warning">ডিলিট !</h3>
                <p class="md-3">এই ডাটাটি ডিলিট করুন</p>
                <input type="hidden" id="deleteId">
            </div>
            <div class="modal-footer">
                <button type="button" id="delete-modal-close" class="btn bg-secondary text-light"
                    data-bs-dismiss="modal">না</button>
                <button type="button" onclick="dataDelete()" class="btn bg-danger text-light">হ্যা</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function dataDelete() {
        let id = document.getElementById("deleteId").value;
        let closeDeleteModal = document.getElementById("delete-modal-close");
        if (id.length === 0) {
            errorToast("Please Again Try!");
        } else {
            showLoader();
            let response = await axios.get('/admin/period-destroy/' + id);
            hideLoader();
            if (response.status === 200 && response.data.status === "success") {
                closeDeleteModal.click();
                successToast(response.data.message);
                await getlist();
            } else {
                errorToast("Request failed!");
            }
        }
    }
</script>
