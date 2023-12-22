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
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Email<span class="text-danger">*</span></label>
                        <input type="Email" value="{{$userEdit->email}}" class="form-control" id="exampleInputUsername1" placeholder="Input Email User..." name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Gender<span class="text-danger">*</span></label>
                        <select class="form-control" name="jenis_kelamin">
                           <option selected disabled>Select Genders</option>
                           <option value="L" @if($userEdit->jenis_kelamin == 'L')@selected(true)@endif>Male</option>
                           <option value="P" @if($userEdit->jenis_kelamin == 'P')@selected(true)@endif>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Birth Of Date<span class="text-danger">*</span></label>
                        <input type="date" value="{{ $userEdit->tanggal_lahir }}" class="form-control" id="exampleInputUsername1" placeholder="Input Start Date Event..." name="tanggal_lahir">
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">No. Telepon<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" value="{{ $userEdit->no_telp }}" id="exampleInputUsername1" placeholder="Input Number IDI Organization..." name="no_telp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Alamat<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{$userEdit->alamat}}" id="exampleInputUsername1" placeholder="Input Address..." name="alamat">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputUsername1" class="fw-bold">Asal Cabang<span class="text-danger">*</span></label>
                        <select name="asal_cabang" class="form-control" placeholder="Asal Cabang" id="kota">
                            <option value="">Asal Cabang</option>
                            @foreach($kota as $item)
                            <option value="{{$item->id}}"@if($userEdit->asal_cabang == $item->id)@selected(true)@endif>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">No. Anggota IDI<span class="text-danger">*</span></label>
                        <input type="number" value="{{$userEdit->no_anggota_idi}}" class="form-control" id="exampleInputUsername1" placeholder="Input Number IDI Organization..." name="no_anggota_idi">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">No. Anggota PDFI<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" value="{{$userEdit->no_anggota_pdfi}}" id="exampleInputUsername1" placeholder="Input Number PDFI Organization..." name="no_anggota_pdfi">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Tahun Tamat Sp.MF<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" value="{{ $userEdit->tahun_tamat }}" id="exampleInputUsername1" placeholder="Input Graduation Year..." name="tahun_tamat">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Tempat Praktek<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{$userEdit->tempat_praktek}}" id="exampleInputUsername1" placeholder="Input CLinic Origin..." name="tempat_praktek">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Tempat Praktek 2(opsional)</label>
                        <input type="text" class="form-control" value="{{ $userEdit->lokasi_praktek_1 }}" id="exampleInputUsername1" placeholder="Input CLinic Origin..." name="lokasi_praktek_1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Tempat Praktek 3(opsional)</label>
                        <input type="text" class="form-control" value="{{ $userEdit->lokasi_praktek_2 }}" id="exampleInputUsername1" placeholder="Input CLinic Origin..." name="lokasi_praktek_2">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Bukti Keanggotaan<span class="text-danger">*</span></label>
                        <input type="file" class="form-control"  id="exampleInputUsername1" placeholder="Input Number PDFI Organization..." name="bukti_keanggotaan">
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
@endsection