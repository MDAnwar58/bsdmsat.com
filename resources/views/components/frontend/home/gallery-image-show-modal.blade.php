@section('css')
    <style>
        .gallery-show img {
            width: 100%;
            height: 90vh;
        }

        @media only screen and (max-width: 992px) {
            .gallery-show img {
                height: 85vh;
            }
        }

        @media only screen and (max-width: 575px) {
            .gallery-show img {
                height: 70vh;
            }
        }
    </style>
@endsection
<div class="modal fade gallery-show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body position-relative p-2">
                <button type="button"
                    class="btn btn-outline-light btn-sm fw-3 position-absolute z-10  top-0 end-0 mt-3 me-3"
                    data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </button>
                <img src="{{ url('assets/frontend/images/gallery.jpg') }}" id="showGalleryImage" class="z-0 rounded-3"
                    alt="">
            </div>
        </div>
    </div>
</div>
