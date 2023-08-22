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
                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Input Title Update..." name="judul_update">
                        @error('judul_update')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Topic Update<span class="text-danger">*</span></label>
                        <textarea class="form-control" style="height: 200px" placeholder="Input Topic Update..." id="floatingTextarea" name="isi_berita"></textarea>
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
                        <label for="formFile" class="form-label">Insert Image Topic<span class="text-danger">*</span></label><br>
                        <label for="formFile"><span class="text-sm mt-0">Rekomendasi Ukuran: 1440px x 506px</span></label>
                        <input class="form-control file fw-bold" type="file" id="formFile" name="foto">
                        <div class="result text-danger fw-bold"></div>
                        @error('foto')
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