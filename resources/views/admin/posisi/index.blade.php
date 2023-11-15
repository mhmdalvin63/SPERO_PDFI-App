@extends('admin.template')
@section('title', 'Jabatan')
@section('layout')
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Jabatan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{ url('admin/posisi') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Jabatan<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{ old('posisi') }}" id="exampleInputUsername1" placeholder="Input Posisi Name..." name="posisi">
                        @error('posisi')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Tingkatan<span class="text-danger">*</span></label>
                        <select name="tingkatan" class="form-control" id="">
                            <option selected disabled>Pilih Tingkatan</option>
                            <option value="1">1: Ketua/Wakil</option>
                            <option value="2">2: Bendahara/Sekretaris/dll</option>
                            <option value="3">3: Seksi Pengurus</option>
                            <option value="4">4: Ketua Bidang/Koordinator/Dewan</option>
                            <option value="5">5: Wakil Ketua Bidang/Koordinator/Dewan</option>
                            <option value="6">6: Sekretaris Bidang/Koordinator/Dewan</option>
                            <option value="7">7: Anggota/Anggota Dewan</option>
                        </select>
                        @error('tingkatan')
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
    <h3>Table Posisi</h3>
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
                <table class="table table-hover table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Action</th>
                            <th>Jabatan</th>
                            <th>Tingkatan</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($posisi as $item)
                    <tr class="fw-bold">
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td >
                            <div class="d-flex justify-content-center gap-1">
                                <a data-bs-toggle="modal" data-bs-target="#Edit{{$item->id}}" class="btn btn-warning btn-sm-lg text-white"><i class="bi bi-vector-pen"></i></a>
                                <div class="modal fade" id="Edit{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="EditLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="EditLabel">Edit Jabatan</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ url('admin/posisi', $item->id) }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="exampleInputUsername1" class="fw-bold">Jabatan<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{$item->posisi}}" id="exampleInputUsername1" placeholder="Input Posisi..." name="posisi">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1" class="fw-bold">Tingkatan<span class="text-danger">*</span></label>
                                            <select name="tingkatan" class="form-control" id="">
                                                <option disabled>Pilih Tingkatan</option>
                                                <option value="1" @if($item->tingkatan == 1)@selected(true)@endif>1: Ketua/Wakil</option>
                                                <option value="2" @if($item->tingkatan == 2)@selected(true)@endif>2: Bendahara/Sekretaris/dll</option>
                                                <option value="3" @if($item->tingkatan == 3)@selected(true)@endif>3: Seksi Pengurus</option>
                                                <option value="4" @if($item->tingkatan == 4)@selected(true)@endif>4: Ketua Bidang/Koordinator/Dewan</option>
                                                <option value="5" @if($item->tingkatan == 5)@selected(true)@endif>5: Wakil Ketua Bidang/Koordinator/Dewan</option>
                                                <option value="6" @if($item->tingkatan == 6)@selected(true)@endif>6: Sekretaris Bidang/Koordinator/Dewan</option>
                                                <option value="7" @if($item->tingkatan == 7)@selected(true)@endif>7: Anggota/Anggota Dewan</option>
                                            </select>
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

                                <form action="{{ url('admin/posisi', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-icon btn-danger delete" data-id="{{ $item->id }}"><i class="bi bi-trash-fill"></i></button>    
                                </form>

                                <a data-bs-toggle="modal" data-bs-target="#Detail{{$item->id}}" class="btn btn-success btn-sm-lg text-white"><i class="bi bi-eye-fill"></i></i></a>
                                <div class="modal fade" id="Detail{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="DetailLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="DetailLabel">Detail Posisi</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-4">Jabatan: </div>
                                            <div class="col-8 text-start">{{$item->posisi}}</div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>

                            </div>
                        </td>
                        <td class="text-center">{{ $item->posisi}}</td>
                        <td class="text-center">{{ $item->tingkatan}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection