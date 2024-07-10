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
                <select id="manus_edit" class="showManuEdit form-control">
                    <option value="">(সিলেক্ট মেনু)</option>
                </select>
                <label for="link">লিংক </label>
                <input type="text" id="linkEdit" class=" form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="hideEditModal btn btn-secondary" data-bs-dismiss="modal">বাতিল করুন</button>
                <button type="button" onclick="updateFooterUsefulLinkForm()" class="btn btn-dark">আপডেট</button>
            </div>
        </form>
    </div>
</div>

<script>
    async function getFooterUsefulLinkForUpdate(manus, link) {
        document.getElementById('linkEdit').value = link;
        let showManu = $('.showManuEdit');
        showManu.empty();
        const response = await axios.get("/admin/navbar-get");
        response.data.forEach((manu, index) => {
            let row =
                `<option ${manus === manu.secondManus ? 'selected' : ''} value="${manu.secondManus}">${manu.secondManus}</option>
                <option ${manus === manu.thirdManus ? 'selected' : ''} value="${manu.thirdManus}">${manu.thirdManus}</option>
                <option ${manus === manu.fourthManus ? 'selected' : ''} value="${manu.fourthManus}">${manu.fourthManus}</option>
                <option ${manus === manu.fifthManus ? 'selected' : ''} value="${manu.fifthManus}">${manu.fifthManus}</option>
                <option ${manus === manu.sixthManus ? 'selected' : ''} value="${manu.sixthManus}">${manu.sixthManus}</option>
                <option ${manus === manu.seventhManus ? 'selected' : ''} value="${manu.seventhManus}">${manu.seventhManus}</option>`;
            showManu.append(row);
        });
    }
    async function updateFooterUsefulLinkForm() {
        let id = document.getElementById('id').value,
            manus = document.getElementById('manus_edit').value,
            link = document.getElementById('linkEdit').value,
            hideModal = document.querySelector('.hideEditModal'),
            resetForm = document.getElementById('reset-edit-form');

        if (id.length === 0) {
            errorToast("দয়া করে আবার আপডেট করুন!")
        } else if (manus.length === 0) {
            errorToast("মেনু বাসান!");
        } else if (link.length === 0) {
            errorToast("লিংক বাসান!");
        } else {
            showLoader();
            const response = await axios.post("/admin/footer-usefulLink-update/" + id, {
                manus: manus,
                link: link
            });
            hideLoader();
            resetForm.reset();
            if (response.status === 200 && response.data.status === "success") {
                successToast(response.data.message);
                hideModal.click();
                await getFooterUsefulLink();
            }
        }
    }
</script>
