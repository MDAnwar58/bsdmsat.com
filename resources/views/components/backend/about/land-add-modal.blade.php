<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form id="reset-form" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">এ্যাডেড জমির পরিমান</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="number">পরিমান</label>
                <input type="text" id="number" class=" form-control">
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
        let number = document.getElementById('number').value;
        let hideModal = document.querySelector('.hideModal');
        if(number.length === 0)
        {
            errorToast("জমির পরিমান বাসান!");
        }else
        {
            resetForm.reset();
            showLoader();
            const response = await axios.post('/admin/land-store', {
                number: number
            });
            hideLoader();
            if (response.status === 200 && response.data.status === "success") {
                successToast(response.data.message);
                hideModal.click();
                await getLandList();
            }
        }
    }
</script>
