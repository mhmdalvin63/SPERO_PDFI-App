@extends('admin.template')
@section('title', ' Insert Update')
@section('layout')
<div class="page-heading">
    <h3>Insert Data Update</h3>
</div>

<div class="row d-flex" style="justify-content: center;">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body p-5">
            @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{ session('error') }}
        <button type="button" class="btn-close btn-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
                <form action="{{ url('admin/update') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Title Update<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{ old('judul_update') }}" id="exampleInputUsername1" placeholder="Input Title Update..." name="judul_update">
                        @error('judul_update')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Topic Update<span class="text-danger">*</span></label>
                        <textarea class="ckeditor" value="{{ old('isi_berita') }}" style="height: 200px" placeholder="Input Topic Update..." id="floatingTextarea" name="isi_berita"></textarea>
                        @error('isi_berita')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Tags Update<span class="text-danger">*</span></label>
                        <select multiple="multiple" class="choices form-control multiple-remove" name="id_tag[]" id="selectType">
                            @foreach ($tag as $item)
                            <option value="{{ $item->id }}">{{ $item->tag_name }}</option>
                            @endforeach
                        </select>
                        @error('id_tag')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Update Type<span class="text-danger">*</span></label>
                        <select class="form-control" name="jenis_berita">
                           <option selected disabled>Select Update Types</option>
                           <option value="umum">Public</option>
                           <option value="private">Private</option>
                        </select>
                        @error('jenis_berita')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="formFile" class="form-label">Insert Image Topic</label><br>
                        <label for="formFile"><span class="text-sm mt-0">Rekomendasi Ukuran: 1:1 atau 4:3<span class="text-danger">*max 2mb</span></span></label>
                        <div class="foto"></div>
                        <div class="result text-danger fw-bold"></div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Image Source<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{ old('sumber_foto') }}" id="exampleInputUsername1" placeholder="Input Image Source..." name="sumber_foto">
                        @error('sumber_foto')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="modal-footer gap-1 mt-5">
                        <a href="/admin/update" class="btn btn-outline-warning btn-icon-text">
                            Cancel
                        </a>
                        <button type="submit" id="dis" class="btn btn-outline-primary btn-icon-text">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
    const fotoDiv = document.querySelector(".foto");
    const submitBtn = document.getElementById("dis");

    submitBtn.addEventListener("click", function(event) {
        // Check if the "foto" div contains any uploaded images
        const uploadedImages = fotoDiv.querySelectorAll("img");
        
        if (uploadedImages.length === 0) {
            // No images are uploaded, prevent form submission and show an error message
            event.preventDefault();
            document.querySelector(".result").innerHTML = "Upload Image";
        }
    });
});
</script>
@push('scripts')
<script>
    $('.foto').imageUploader({
        imagesInputName: 'foto',
        maxSize: 2 * 1024 * 1024,
        maxFiles: 3
    });
</script>
@endpush