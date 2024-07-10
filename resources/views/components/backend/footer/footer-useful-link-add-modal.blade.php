<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form id="reset-form" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">এ্যাডেড ফুটার ইউজফুল লিংক</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="category">মেনু</label>
                <select id="manus" class="mb-2 form-control showManu">
                    <option value="">(সিলেক্ট মেনু)</option>
                </select>
                <label for="category">লিংক</label>
                <input type="text" id="link" class="mb-2 form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="hideModal btn btn-secondary" data-bs-dismiss="modal">বাতিল করুন</button>
                <button type="button" onclick="addFooterUsefulForm()" class="btn btn-dark">এ্যাড করুন</button>
            </div>
        </form>
    </div>
</div>

<script>
    const addFooterUsefulForm = async () => {
        // alert("Sdf")
        let resetForm = document.getElementById('reset-form'),
        manus = document.getElementById('manus').value,
            link = document.getElementById('link').value;
        let hideModal = document.querySelector('.hideModal');
        if (manus.length === 0) {
            errorToast("মেনু বাসান!");
        } else if (link.length === 0) {
            errorToast("লিংক বাসান!");
        } else {
            resetForm.reset();
            showLoader();
            const response = await axios.post('/admin/footer-usefulLink-store', {
                manus: manus,
                link: link
            });
            hideLoader();
            if (response.status === 200 && response.data.status === "success") {
                successToast(response.data.message);
                hideModal.click();
                await getFooterUsefulLink();
            }
        }
    }
</script>
