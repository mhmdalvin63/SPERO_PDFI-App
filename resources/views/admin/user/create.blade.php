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
                <form action="{{ url('admin/user-management') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{ old('name') }}" id="exampleInputUsername1" placeholder="Input Name User..." name="name">
                        @error('name')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Email<span class="text-danger">*</span></label>
                        <input type="Email" class="form-control" value="{{ old('email') }}" id="exampleInputUsername1" placeholder="Input Email User..." name="email">
                        @error('email')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Asal Cabang<span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  value="{{ old('asal_cabang') }}" id="exampleInputUsername1" placeholder="Input Branch CLinic Origin..." name="asal_cabang">
                        @error('asal_cabang')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Tempat Praktek<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{ old('tempat_praktek') }}" id="exampleInputUsername1" placeholder="Input CLinic Origin..." name="tempat_praktek">
                        @error('tempat_praktek')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Alamat<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{ old('alamat') }}" id="exampleInputUsername1" placeholder="Input Address..." name="alamat">
                        @error('alamat')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">No. Anggota IDI<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" value="{{ old('no_anggota_idi') }}" id="exampleInputUsername1" placeholder="Input Number IDI Organization..." name="no_anggota_idi">
                        @error('no_anggota_idi')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">No. Anggota PDFI<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" value="{{ old('no_anggota_pdfi') }}" id="exampleInputUsername1" placeholder="Input Number PDFI Organization..." name="no_anggota_pdfi">
                        @error('no_anggota_pdfi')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Bukti Keanggotaan<span class="text-danger">*</span></label>
                        <input type="file" class="form-control"  id="exampleInputUsername1" placeholder="Input Number PDFI Organization..." name="bukti_keanggotaan">
                        @error('bukti_keanggotaan')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Password<span class="text-danger">*</span></label>
                        <input id="password" type="password" value="{{ old('password') }}" class="form-control" placeholder="Password">
                        @error('password')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Confirm Password<span class="text-danger">*</span></label>
                        <input id="password2" onchange="check()" value="{{ old('password') }}" type="password" name="password" class="form-control" placeholder="Confirm Password">
                        <div id="result" class="result text-danger"></div>
                        @error('password')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                    <input onclick="myFunction()" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label text-gray-600" for="flexCheckDefault">
                        Show Password
                    </label>
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

<script>
function check() {
var x = document.getElementById("password");
var y = document.getElementById("password2");
var w = document.getElementById("result");
if (x.value === y.value) {
  w.innerHTML = "";
  document.getElementById("dis").disabled = false;
} else {
    w.innerHTML = "Not Match";
    document.getElementById("dis").disabled = true;
}
}
</script>

<script type="text/javascript">
function myFunction() {
var x = document.getElementById("password");
var y = document.getElementById("password2");
if (x.type === "password" && y.type === "password") {
  x.type = "text";
  y.type = "text";
} else {
  x.type = "password";
  y.type = "password";
}
}
</script>
@endsection