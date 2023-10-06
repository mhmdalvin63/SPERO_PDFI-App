@extends('admin.template')
@section('title', 'Banner')
@section('layout')
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Banner</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{ url('admin/banner') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                    <label for="exampleInputUsername1" class="fw-bold">Gamber Banner <span class="text-danger text-sm">*max 2mb </span></label>
                    <label for="formFile"><span class="text-sm mt-0">Rekomendasi Ukuran: 1440px x 506px</span></label>
                    <input type="file" class="form-control" name="foto">
                        @error('foto')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                    <label for="exampleInputUsername1" class="fw-bold">Deskripsi<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Input Deskripsi..." name="deskripsi">
                        @error('deskripsi')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="modal-footer gap-1">
                    <button type="button" class="btn btn-outline-warning btn-icon-text" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                        <button type="submit" id="dis" class="btn btn-outline-primary btn-icon-text">
                            Submit
                        </button>
                    </div>
                </form>
      </div>
    </div>
  </div>
</div>
<div class="page-heading">
    <h3>Table Banner</h3>
</div>
<div class="col-lg-12 grid-margin stretch-card">
        <div class="card-body">
          
            <div class="card-title d-flex justify-content-end mb-5">
                <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary btn-lg btn-icon-text">
                    <i class="mdi mdi-upload btn-icon-prepend"></i>
                    +
                </a>
            </div>
            @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
   
@endif
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Action</th>
                            <th>Banner <br><span class="text-sm">Max 2048kb</span></th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($banner as $item)
                    <tr class="fw-bold">
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td >
                            <div class="d-flex justify-content-center gap-1">
                                <a data-bs-toggle="modal" data-bs-target="#Edit{{$item->id}}" class="btn btn-warning btn-sm-lg text-white"><i class="bi bi-vector-pen"></i></a>
                                <div class="modal fade" id="Edit{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="EditLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="EditLabel">Edit Banner</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ url('admin/banner', $item->id) }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        @method('PUT')
                                        <div class="form-group">
                                        <label for="exampleInputUsername1" class="fw-bold">Gamber Banner <span class="text-danger text-sm">*max 2048kb</span></label>
                                        <label for="formFile"><span class="text-sm mt-0">Rekomendasi Ukuran: 1440px x 506px</span></label>
                                            <input type="file" class="form-control" name="foto">                       
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1" class="fw-bold">Deskripsi<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{$item->deskripsi}}" id="exampleInputUsername1" placeholder="Input Deskripsi..." name="deskripsi">                        
                                        </div>
                                        <div class="modal-footer gap-1">
                                        <button type="button" class="btn btn-outline-warning btn-icon-text" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                            <button type="submit" id="dis" class="btn btn-outline-primary btn-icon-text">
                                                Submit
                                            </button>
                                        </div>
                                    </form>
                                    </div>
                                    </div>
                                </div>
                                </div>

                                <form action="{{ url('admin/banner', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-icon btn-danger delete" data-id="{{ $item->id }}"><i class="bi bi-trash-fill"></i></button>    
                                </form>

                                <a data-bs-toggle="modal" data-bs-target="#Detail{{$item->id}}" class="btn btn-success btn-sm-lg text-white"><i class="bi bi-eye-fill"></i></i></a>
                                <div class="modal fade" id="Detail{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="DetailLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="DetailLabel">Detail Type</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-4">Banner </div>
                                            <div class="col-8 text-start"><img src="{{asset('img/'.$item->foto)}}"  height="100" alt=""></div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-4">Description Banner: </div>
                                            <div class="col-8 text-start">{{$item->deskripsi}}</div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>

                            </div>
                        </td>
                        <td class="text-center"><img src="{{asset('img/'.$item->foto)}}"  height="100" alt=""></td>
                        <td class="text-center">{{ Str::limit($item->deskripsi, 25)}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection