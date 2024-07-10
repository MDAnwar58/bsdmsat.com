<!-- Modal -->
<div class="modal fade" id="editImageGallery" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form id="reset-gallery-image-edit-form" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">গ্যালারি ছবি আপডেট করুন</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="galleryImageId">
                <label for="category">ক্যাটাগরি</label>
                <select id="gallery_category_id_edit" class=" form-control">
                    <option value="">(সিলেক্ট ক্যাটাগরি)</option>
                </select>
                <label for="category">ছবি</label>
                <img src="{{ url('assets/backend/images/demo.jpg') }}" id="showGalleryImageEdit" class="w-100" height="150px"
                    alt="">
                <input type="file" id="imgEdit" onchange="ImgChangeEdit(event, 'showGalleryImageEdit')"
                    class=" form-control">
            </div>
            <div class="modal-footer">
                <button type="button" onclick="reset()" class="hideGalleryImageEditModal btn btn-secondary"
                    data-bs-dismiss="modal">বাতিল করুন</button>
                <button type="button" onclick="updateGalleryImageForm()" class="btn btn-dark">আপডেট</button>
            </div>
        </form>
    </div>
</div>

<script>
    async function getGalleryImageForUpdate(galleryCategoryId, img) {
        document.getElementById('showGalleryImageEdit').src = `{{ url('upload/images/gallery/${img}') }}`;
        let galleryCategoryIdEdit = $('#gallery_category_id_edit');
        galleryCategoryIdEdit.empty();
        const response = await axios.get('/admin/gallery-category-get');
        if (response.data.length > 0) {
            response.data.forEach((CategoryOption, index) => {
                let row =
                    `<option ${galleryCategoryId === CategoryOption.id ? 'selected' : ''} value="${CategoryOption.id}">${CategoryOption.name}</option>`;
                galleryCategoryIdEdit.append(row);
            });
        } else {
            let row = `<option value="">(Category not available)</option>`;
            galleryCategoryIdEdit.append(row);
        }
    }

    function ImgChangeEdit(event, showGalleryImageEdit) {
        const imageElement = document.getElementById(showGalleryImageEdit);

        const selectedFile = event.target.files[0];
        const imageURL = URL.createObjectURL(selectedFile);
        if (selectedFile) {
            imageElement.src = imageURL;
        }
    }

    async function updateGalleryImageForm() {
        let id = document.getElementById('galleryImageId').value,
            gallery_category_id = document.getElementById('gallery_category_id_edit').value,
            img = document.getElementById('imgEdit').files[0],
            hideGalleryEditModal = document.querySelector('.hideGalleryImageEditModal'),
            resetForm = document.getElementById('reset-gallery-image-edit-form');

        if (gallery_category_id.length === 0) {
            errorToast("ক্যাটাগরি বাসান!");
        } else {
            resetForm.reset();
            let formData = new FormData();
            formData.append('gallery_category_id', gallery_category_id);
            formData.append('img', img);
            showLoader();
            const response = await axios.post("/admin/gallery-image-update/" + id, formData);
            hideLoader();
            if (response.status === 200 && response.data.status === "success") {
                successToast(response.data.message);
                hideGalleryEditModal.click();
                await getGalleryImage();
            }
        }
    }

    function reset()
    {
        let resetForm = document.getElementById('reset-gallery-image-edit-form');
        resetForm.reset();
    }
</script>
