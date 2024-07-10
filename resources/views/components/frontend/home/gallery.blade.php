<section class="our-gallery-bg py-5" id="our-department-bg">
    <div class="container">
        <div class="row pt-4">
            @if ($galleries->count() > 0)
                @foreach ($galleries as $gallery)
                    <div class="col-md-12 text-center pb-2">
                        <h2 class="text-uppercase fs-3 fw-bold">{{ $gallery->name }}</h2>
                    </div>
                @endforeach
            @endif
            <div class="col-md-12">
                <ul class="nav nav-tabs justify-content-center pb-3" id="myTab" role="tablist">
                    @if ($galleryCategories->count() > 0)
                        @foreach ($galleryCategories as $galleryCategory)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{ $loop->first ? 'active' : '' }} fs-6 fw-semisold"
                                    data-bs-toggle="tab" data-bs-target="#tab{{ $galleryCategory->id }}" type="button"
                                    role="tab">{{ $galleryCategory->name }}</button>
                            </li>
                        @endforeach
                    @endif
                </ul>
                <div class="tab-content mt-2" id="myTabContent">
                    @if ($galleryCategories->count() > 0)
                        @foreach ($galleryCategories as $galleryCategory)
                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                id="tab{{ $galleryCategory->id }}" role="tabpanel">
                                <div class="row">
                                    @php
                                        $galleryImages = \App\Models\GalleryImage::where('gallery_category_id', $galleryCategory->id)->get();
                                    @endphp
                                    @if ($galleryImages->count() > 0)
                                        @foreach ($galleryImages as $galleryImage)
                                            <div class="col-md-3 col-sm-4 col-6 mb-3">
                                                <img src="{{ url('upload/images/gallery', $galleryImage->img) }}" onclick="ImageShow({{ $galleryImage->id }})" data-bs-toggle="modal"
                                                 alt="{{ $galleryImage->category->name }}">
                                            </div>
                                            {{-- data-bs-target="#exampleModal" --}}
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    async function ImageShow(id)
    {
        let showGalleryImage = document.getElementById('showGalleryImage');
        const response = await axios.get("/slider-show/"+id);
        if (response.status) {
            showGalleryImage.src = `{{ url('upload/images/gallery/${response.data.img}') }}`;
            $("#exampleModal").modal("show");
        }
    }
</script>