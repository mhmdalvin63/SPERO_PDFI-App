@extends('admin.template')
@section('title', 'Jurnal')
@section('layout')
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Jurnal</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{ url('admin/jurnal') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Title<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{ old('judul_jurnal') }}" id="exampleInputUsername1" placeholder="Input Title..." name="judul_jurnal">
                        @error('judul_jurnal')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Link Jurnal</label>
                        <input type="url" class="form-control" value="{{ old('link_jurnal') }}" id="exampleInputUsername1" placeholder="Input Title..." name="link_jurnal">
                        @error('link_jurnal')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Image Jurnal</label>
                        <input type="file" class="form-control" id="exampleInputUsername1" placeholder="Input Image..." name="foto">
                        @error('foto')
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
    <h3>Table Journals</h3>
</div>
<div class="col-lg-12 grid-margin stretch-card">
        <div class="card-body">
          
            <div class="card-title d-flex justify-content-end mb-5">
                <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary btn-lg btn-icon-text">
                    <i class="mdi mdi-upload btn-icon-prepend"></i>
                    +
                </a>
            </div>
            @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
            <div class="table-responsive">
                <table class="table table-hover table-striped" id="table1">
                    <thead>
                        <tr class="text-center">
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Action</th>
                            <th style="text-align: center;">Title</th>
                            <th style="text-align: center;">Link</th>
                            <th style="text-align: center;">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($jurnal as $item)
                    <tr class="fw-bold">
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td >
                            <div class="d-flex justify-content-center gap-1">
                                <a data-bs-toggle="modal" data-bs-target="#Edit{{$item->id}}" class="btn btn-warning btn-sm-lg text-white"><i class="bi bi-vector-pen"></i></a>
                                <div class="modal fade" id="Edit{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="EditLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="EditLabel">Edit Tag</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ url('admin/jurnal', $item->id) }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="exampleInputUsername1" class="fw-bold">Title Journal<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{$item->judul_jurnal}}" id="exampleInputUsername1" placeholder="Input Title Journal..." name="judul_jurnal">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1" class="fw-bold">Link Journal</label>
                                            <input type="url" value="{{$item->link_jurnal}}" class="form-control" id="exampleInputUsername1" placeholder="Input Title..." name="link_jurnal">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1" class="fw-bold">Link Journal</label>
                                            <input type="file" value="{{$item->foto}}" class="form-control" id="exampleInputUsername1" placeholder="Input Title..." name="foto">
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

                                <form action="{{ url('admin/jurnal', $item->id) }}" method="POST">
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
                                            <div class="col-4">Title: </div>
                                            <div class="col-8 text-start">{{$item->judul_jurnal}}</div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-4">Link: </div>
                                            <div class="col-8 text-start">{{$item->link_jurnal}}</div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-4">Image: </div>
                                            <img src="{{asset('img/'.$item->foto)}}" class="ms-2"  height="150" alt="">
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>

                            </div>
                        </td>
                        <td class="text-center">{{ $item->judul_jurnal}}</td>
                        <td class="text-center">{{ Str::limit($item->link_jurnal, 25)}}</td>
                        <td> <img src="{{asset('img/'.$item->foto)}}" class="ms-2"  height="150" alt=""></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection