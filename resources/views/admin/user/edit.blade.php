@extends('admin.template')
@section('title', 'Input User')
@section('layout')
<div class="page-heading">
    <h3>Insert Data User</h3>
</div>

<div class="row d-flex" style="justify-content: center;">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body p-5">
                <form action="{{ url('admin/user-management', $userEdit->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Name<span class="text-danger">*</span></label>
                        <input type="text" value="{{$userEdit->name}}" class="form-control" id="exampleInputUsername1" placeholder="Input Name User..." name="name">
                        @error('name')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Email<span class="text-danger">*</span></label>
                        <input type="Email" value="{{$userEdit->email}}" class="form-control" id="exampleInputUsername1" placeholder="Input Email User..." name="email">
                        @error('email')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Asal Cabang<span class="text-danger">*</span></label>
                        <input type="text" value="{{$userEdit->asal_cabang}}" class="form-control" id="exampleInputUsername1" placeholder="Input Branch CLinic Origin..." name="asal_cabang">
                        @error('asal_cabang')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Tempat Praktek<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{$userEdit->tempat_praktek}}" id="exampleInputUsername1" placeholder="Input CLinic Origin..." name="tempat_praktek">
                        @error('tempat_praktek')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Alamat<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{$userEdit->alamat}}" id="exampleInputUsername1" placeholder="Input Address..." name="alamat">
                        @error('alamat')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">No. Anggota IDI<span class="text-danger">*</span></label>
                        <input type="number" value="{{$userEdit->no_anggota_idi}}" class="form-control" id="exampleInputUsername1" placeholder="Input Number IDI Organization..." name="no_anggota_idi">
                        @error('no_anggota_idi')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">No. Anggota PDFI<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" value="{{$userEdit->no_anggota_pdfi}}" id="exampleInputUsername1" placeholder="Input Number PDFI Organization..." name="no_anggota_pdfi">
                        @error('no_anggota_pdfi')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="modal-footer gap-1 mt-5">
                        <a href="/admin/user-management" class="btn btn-outline-warning btn-icon-text">
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