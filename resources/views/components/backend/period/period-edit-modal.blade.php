<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form id="reset-edit-form" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">পিরিয়ড আপডেট</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id">
                <label for="No">ক্র:নং</label>
                <input type="text" id="NoEdit" class="mb-2 form-control">
                <label for="position">নাম/পদবী</label>
                <input type="text" id="positionEdit" class="mb-2 form-control">
                <label for="firstPeriod">১ম পিরিয়ড</label>
                <input type="text" id="firstPeriodEdit" class="mb-2 form-control">
                <label for="secondPeriod">২য় পিরিয়ড</label>
                <input type="text" id="secondPeriodEdit" class="mb-2 form-control">
                <label for="thirdPeriod">৩য় পিরিয়ড</label>
                <input type="text" id="thirdPeriodEdit" class="mb-2 form-control">
                <label for="fourthPeriod">৪র্থপিরিয়ড</label>
                <input type="text" id="fourthPeriodEdit" class="mb-2 form-control">
                <label for="fifthPeriod">৫ম পিরিয়ড</label>
                <input type="text" id="fifthPeriodEdit" class="mb-2 form-control">
                <label for="sixthPeriod">৬ষ্ঠ পিরিয়ড</label>
                <input type="text" id="sixthPeriodEdit" class="mb-2 form-control">
                <label for="seventhPeriod">৭ম পিরিয়ড</label>
                <input type="text" id="seventhPeriodEdit" class="mb-2 form-control">
                <label for="eighthPeriod">৮ম পিরিয়ড</label>
                <input type="text" id="eighthPeriodEdit" class="mb-2 form-control">
                <label for="comment">মন্তব্য</label>
                <input type="text" id="commentEdit" class="mb-2 form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="hideEditModal btn btn-secondary" data-bs-dismiss="modal">বাতিল করুন</button>
                <button type="button" onclick="updateForm()" class="btn btn-dark">আপডেট</button>
            </div>
        </form>
    </div>
</div>

<script>
    function getDataForUpdate(No, position, firstPeriod, secondPeriod, thirdPeriod, fourthPeriod, fifthPeriod, sixthPeriod, seventhPeriod, eighthPeriod, comment) {
        document.getElementById('NoEdit').value = No;
        document.getElementById('positionEdit').value = position;
        document.getElementById('firstPeriodEdit').value = firstPeriod;
        document.getElementById('secondPeriodEdit').value = secondPeriod;
        document.getElementById('thirdPeriodEdit').value = thirdPeriod;
        document.getElementById('fourthPeriodEdit').value = fourthPeriod;
        document.getElementById('fifthPeriodEdit').value = fifthPeriod;
        document.getElementById('sixthPeriodEdit').value = sixthPeriod;
        document.getElementById('seventhPeriodEdit').value = seventhPeriod;
        document.getElementById('eighthPeriodEdit').value = eighthPeriod;
        document.getElementById('commentEdit').value = comment;
    }

    async function updateForm() {
        let hideModal = document.querySelector('.hideEditModal'),
            resetForm = document.getElementById('reset-edit-form'),
            id = document.getElementById('id').value,
            No = document.getElementById('NoEdit').value,
            position = document.getElementById('positionEdit').value,
            firstPeriod = document.getElementById('firstPeriodEdit').value,
            secondPeriod = document.getElementById('secondPeriodEdit').value,
            thirdPeriod = document.getElementById('thirdPeriodEdit').value,
            fourthPeriod = document.getElementById('fourthPeriodEdit').value,
            fifthPeriod = document.getElementById('fifthPeriodEdit').value,
            sixthPeriod = document.getElementById('sixthPeriodEdit').value,
            seventhPeriod = document.getElementById('seventhPeriodEdit').value,
            eighthPeriod = document.getElementById('eighthPeriodEdit').value,
            comment = document.getElementById('commentEdit').value;

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
            const response = await axios.post('/admin/period-update/'+id, {
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
            
            if (response.status === 200 && response.data.status === "success") {
                successToast(response.data.message);
                hideModal.click();
                await getlist();
            } else if (response.status === 200 && response.data.status === "fail") {
                errorToast(response.data.message);
            }
        }
    }
</script>
