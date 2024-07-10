<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form id="reset-form" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">পিরিয়ড এ্যাড</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="No">ক্র:নং</label>
                <input type="text" id="No" class="mb-2 form-control">
                <label for="position">নাম/পদবী</label>
                <input type="text" id="position" class="mb-2 form-control">
                <label for="firstPeriod">১ম পিরিয়ড</label>
                <input type="text" id="firstPeriod" class="mb-2 form-control">
                <label for="secondPeriod">২য় পিরিয়ড</label>
                <input type="text" id="secondPeriod" class="mb-2 form-control">
                <label for="thirdPeriod">৩য় পিরিয়ড</label>
                <input type="text" id="thirdPeriod" class="mb-2 form-control">
                <label for="fourthPeriod">৪র্থ পিরিয়ড</label>
                <input type="text" id="fourthPeriod" class="mb-2 form-control">
                <label for="fifthPeriod">৫ম পিরিয়ড</label>
                <input type="text" id="fifthPeriod" class="mb-2 form-control">
                <label for="sixthPeriod">৬ষ্ঠ পিরিয়ড</label>
                <input type="text" id="sixthPeriod" class="mb-2 form-control">
                <label for="seventhPeriod">৭ম পিরিয়ড</label>
                <input type="text" id="seventhPeriod" class="mb-2 form-control">
                <label for="eighthPeriod">৮ম পিরিয়ড</label>
                <input type="text" id="eighthPeriod" class="mb-2 form-control">
                <label for="comment">মন্তব্য</label>
                <input type="text" id="comment" class="mb-2 form-control">
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
            No = document.getElementById('No').value,
            position = document.getElementById('position').value,
            firstPeriod = document.getElementById('firstPeriod').value,
            secondPeriod = document.getElementById('secondPeriod').value,
            thirdPeriod = document.getElementById('thirdPeriod').value,
            fourthPeriod = document.getElementById('fourthPeriod').value,
            fifthPeriod = document.getElementById('fifthPeriod').value,
            sixthPeriod = document.getElementById('sixthPeriod').value,
            seventhPeriod = document.getElementById('seventhPeriod').value,
            eighthPeriod = document.getElementById('eighthPeriod').value,
            comment = document.getElementById('comment').value;

        if (No.length === 0) {
            errorToast("ক্র:নং বাসান!");
        } else if (position.length === 0) {
            errorToast("নাম/পদবী বাসান!");
        } else if (firstPeriod.length === 0) {
            errorToast("১ম পিরিয়ড বাসান!");
        } else if (secondPeriod.length === 0) {
            errorToast("২য় পিরিয়ড বাসান!");
        } else if (thirdPeriod.length === 0) {
            errorToast("৩য় পিরিয়ড বাসান!");
        } else if (fourthPeriod.length === 0) {
            errorToast("৪র্থ পিরিয়ড বাসান!");
        } else if (fifthPeriod.length === 0) {
            errorToast("৫ম পিরিয়ড বাসান!");
        } else if (sixthPeriod.length === 0) {
            errorToast("৬ষ্ঠ পিরিয়ড বাসান!");
        } else if (seventhPeriod.length === 0) {
            errorToast("৭ম পিরিয়ড বাসান!");
        } else if (eighthPeriod.length === 0) {
            errorToast("৮ম পিরিয়ড বাসান!");
        } else if (comment.length === 0) {
            errorToast("মন্তব্য বাসান!");
        } else {
            resetForm.reset();
            showLoader();
            const response = await axios.post('/admin/period-store', {
                No: No,
                position: position,
                firstPeriod: firstPeriod,
                secondPeriod: secondPeriod,
                thirdPeriod: thirdPeriod,
                fourthPeriod: fourthPeriod,
                fifthPeriod: fifthPeriod,
                sixthPeriod: sixthPeriod,
                seventhPeriod: seventhPeriod,
                eighthPeriod: eighthPeriod,
                comment: comment
            });
            hideLoader();
            // console.log(response.response.data.errors.No);
            if (response.status === 200 && response.data.status === "success") {
                successToast(response.data.message);
                hideModal.click();
                await getlist();
            }else if (response.status === 200 && response.data.status === "fail") {
                errorToast(response.data.message);
            }
        }
    }
</script>
