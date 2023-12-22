@extends('admin.template')
@section('title', 'Input User')
@section('layout')
<div class="page-heading">
    <h3>Insert Data User</h3>
</div>
<style>
    .selectize-input input{
        width: 100%!important;
        border: none;
    }
    .selectize-input input:focus{
        outline: none;
    }
</style>
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
                        <label for="exampleInputUsername1" class="fw-bold">Gender<span class="text-danger">*</span></label>
                        <select class="form-control" name="jenis_kelamin">
                           <option selected disabled>Select Genders</option>
                           <option value="L">Male</option>
                           <option value="P">Female</option>
                        </select>
                        @error('jenis_kelamin')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Birth Of Date<span class="text-danger">*</span></label>
                        <input type="date" value="{{ old('tanggal_lahir') }}" class="form-control" id="exampleInputUsername1" placeholder="Input Start Date Event..." name="tanggal_lahir">
                        @error('tanggal_lahir')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">No. Telepon<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" value="{{ old('no_telp') }}" id="exampleInputUsername1" placeholder="Input Number IDI Organization..." name="no_telp">
                        @error('no_telp')
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
                    <label for="exampleInputUsername1" class="fw-bold">Asal Cabang<span class="text-danger">*</span></label>
                        <select name="asal_cabang" class="form-control" placeholder="Asal Cabang" id="kota">
                            <option value="">Asal Cabang</option>
                            @foreach($kota as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        @error('asal_cabang')
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
                        <label for="exampleInputUsername1" class="fw-bold">Tahun Tamat Sp.MF<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" value="{{ old('tahun_tamat') }}" id="exampleInputUsername1" placeholder="Input Graduation Year..." name="tahun_tamat">
                        @error('tahun_tamat')
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
                        <label for="exampleInputUsername1" class="fw-bold">Tempat Praktek 2(opsional)</label>
                        <input type="text" class="form-control" value="{{ old('lokasi_praktek_1') }}" id="exampleInputUsername1" placeholder="Input CLinic Origin..." name="lokasi_praktek_1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Tempat Praktek 3(opsional)</label>
                        <input type="text" class="form-control" value="{{ old('lokasi_praktek_2') }}" id="exampleInputUsername1" placeholder="Input CLinic Origin..." name="lokasi_praktek_2">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<script>
$('#kota').selectize({
    sortField: 'text',
});
</script>
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