@extends('admin.template')
@section('title', 'Edit Update')
@section('layout')
<div class="page-heading">
    <h3>Edit Data Update</h3>
</div>

<div class="row d-flex" style="justify-content: center;">
    <div class="col-md-12 grid-margin stretch-card">
        
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{ session('error') }}
        <button type="button" class="btn-close btn-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
        <div class="card">
            <div class="card-body p-5">
                <form action="{{ url('admin/update', $updateEdit->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Title Update<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{ $updateEdit->judul_update}}" id="exampleInputUsername1" placeholder="Input Title Update..." name="judul_update">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Topic Update<span class="text-danger">*</span></label>
                        <textarea class="ckeditor" value="{{ $updateEdit->isi_berita}}" style="height: 200px" placeholder="Input Topic Update..." id="floatingTextarea" name="isi_berita">{{ $updateEdit->isi_berita}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Update Type<span class="text-danger">*</span></label>
                        <select name="jenis_berita" class="form-control">
                            <option value="umum" @if($updateEdit->jenis_berita == 'umum')@selected(true)@endif>Public</option>
                            <option value="private" @if($updateEdit->jenis_berita == 'private')@selected(true)@endif>Private</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="formFile" class="form-label">Update Image Topic</label><br>
                        <label for="formFile"><span class="text-sm mt-0">Rekomendasi Ukuran: 1:1 atau 4:3<span class="text-danger">*max 2mb</span></span></label>
                        <div class="foto"></div>
                        <div class="result text-danger fw-bold"></div>
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
@push('scripts')
<script>
    $('.foto').imageUploader({
        imagesInputName: 'foto',
        maxSize: 2 * 1024 * 1024,
        maxFiles: 3
    });
</script>
@endpush