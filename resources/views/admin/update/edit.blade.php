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
                        <label for="exampleInputUsername1" class="fw-bold">Tags Update<span class="text-danger">*</span></label>
                        <select multiple="multiple" class="choices form-control multiple-remove" name="id_tag[]" id="selectType">
                            @foreach ($tag as $item)
                            <option value="{{ $item->id }}" @foreach($updateEdit->tag as $tag2)
                            @if($tag2->id == $item->id)@selected(true)@endif
                            @endforeach>{{ $item->tag_name }}</option>
                            @endforeach
                        </select>
                        @error('id_tag')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="formFile" class="form-label">Update Image Topic</label><br>
                        <label for="formFile"><span class="text-sm mt-0">Rekomendasi Ukuran: 1:1 atau 4:3<span class="text-danger">*max 2mb</span></span></label>
                        <div class="foto"></div>
                        <div class="image-uploader">
                            <div class="uploaded">
                                @foreach($updateEdit->foto as $image)
                                    <div class="uploaded-image">
                                        <img id="image_{{$image->id}}" src="{{asset('img/'.$image->foto)}}" alt="">
                                        <a href="javascript:void(0)"  id="btn-delete-post" data-id="{{ $image->id }}" class="delete-image" ><i class="iui-close text-white"></i></a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function () {
    $(".delete-image").click(function () {
        var button = $(this);
        var resourceId = button.data('id');
        var hilang = button.closest('.uploaded-image')
        $.ajax({
            type: 'DELETE',
            url: '/update/image/' + resourceId,
            data: {
                "_token": "{{ csrf_token() }}"
            },
            success: function (data) {
                // Check for a successful response
                    console.log(data)
                    hilang.remove();
            },
            error: function (data) {
                // Handle error response
                console.log(data);
            }
        });
    });
});
</script>
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