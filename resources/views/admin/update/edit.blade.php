@extends('admin.template')
@section('title', 'Edit Update')
@section('layout')
<div class="page-heading">
    <h3>Edit Data Update</h3>
</div>

<div class="row d-flex" style="justify-content: center;">
    <div class="col-md-12 grid-margin stretch-card">
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
                        <textarea class="form-control" value="{{ $updateEdit->isi_berita}}" style="height: 200px" placeholder="Input Topic Update..." id="floatingTextarea" name="isi_berita">{{ $updateEdit->isi_berita}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="formFile" class="form-label">Insert Image Topic<span class="text-danger">*</span></label><br>
                        <label for="formFile"><span class="text-sm mt-0">Rekomendasi Ukuran: 1440px x 506px</span></label>
                        <input class="form-control file fw-bold" type="file" value="{{ $updateEdit->foto}} id="formFile" name="foto">
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