<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="reset-form" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">সেলাইডার এ্যাড করুন</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 pb-3">
                        <img src="{{ url('assets/backend/images/demo.jpg') }}" id="showImage" class="w-100"
                            style="height: 50vh;" alt="">
                    </div>
                    <div class="col-md-6">
                        <label for="img" class="h5">সেলাইডার</label>
                        <input type="file" id="img" onchange="ImgChange(event, 'showImage')" class="img form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="hideModal btn btn-secondary" data-bs-dismiss="modal">বাতিল করুন</button>
                <button type="button" onclick="addForm()" class="btn btn-dark">এ্যাড করুন</button>
            </div>
        </form>
    </div>
</div>

<script>
    function ImgChange(event, imgShow) {
        const imageElement = document.getElementById(imgShow);

        const selectedFile = event.target.files[0];
        const imageURL = URL.createObjectURL(selectedFile);
        if (selectedFile) {
            imageElement.src = imageURL;
        }
    }

    const addForm = async () => {
        let resetForm = document.getElementById('reset-form');
        let showImage = document.getElementById('showImage');
        let img = document.getElementById('img').files[0];
        let hideModal = document.querySelector('.hideModal');
        if(!img)
        {
            errorToast("সেলাইডার ছবি বাসান!");
        }else
        {
            resetForm.reset();
            showImage.src = "{{ url('assets/backend/images/demo.jpg') }}";
            let formData = new FormData();
            formData.append('img', img);
            const config = {
                  headers: {
                      'content-type': 'multipart/form-data'
                  }
              }
            showLoader();
            const response = await axios.post('/admin/store', formData, config);
            hideLoader();
            if (response.status === 200 && response.data.status === "success") {
                successToast(response.data.message);
                hideModal.click();
                await getlist();
            }
        }
    }
</script>
