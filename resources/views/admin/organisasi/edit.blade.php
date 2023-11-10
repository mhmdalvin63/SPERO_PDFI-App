@extends('admin.template')
@section('title', ' Edit Kepengurusan')
@section('layout')
<div class="page-heading">
    <h3>Edit Data Kepengurusan</h3>
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
                <form action="{{ url('admin/kepengurusan', $organisasi->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Posisi<span class="text-danger">*</span></label>
                        <select class="form-control" name="id_posisi" id="posisi">
                        <option disabled>Pilih Posisi</option>
                           @foreach($posisi as $item)
                           <option value="{{$item->id}}" data-tingkatan="{{$item->tingkatan}}" @if($item->id == $organisasi->id_posisi)@selected(true)@endif>{{$item->posisi}}</option>
                           @endforeach
                        </select>
                    </div>
                    <input type="hidden" id="select-tingkatan" name="tingkatan">
                    <div class="form-group" id="nama">
                        <label for="exampleInputUsername1" class="fw-bold">Nama & Gelar<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Input Title Update..." value="{{$organisasi->nama}}" name="nama">
                    </div>
                    @if($organisasi->foto != NULL)
                    <div class="form-group" id="foto">
                        <label for="formFile" class="form-label">Input Foto</label><br>
                        <label for="formFile"><span class="text-sm mt-0">Rekomendasi Ukuran: 4:3<span class="text-danger">*max 2mb</span></span></label>
                        <input type="file" name="foto" id="selectImage" class="form-control">
                        <img id="preview" src="#" alt="your image" width="50%" class="mt-3" style="display:none;"/>
                        <img id="value" src="{{asset('img/'.$organisasi->foto)}}" alt="your image" width="50%" class="mt-3"/>
                    </div>
                    @else
                    <div class="form-group" style="display: none;" id="foto">
                        <label for="formFile" class="form-label">Input Foto</label><br>
                        <label for="formFile"><span class="text-sm mt-0">Rekomendasi Ukuran: 4:3<span class="text-danger">*max 2mb</span></span></label>
                        <input type="file" name="foto" id="selectImage" class="form-control">
                        <img id="preview" src="#" alt="your image" width="50%" class="mt-3" style="display:none;"/>
                        <img id="value" style="display: none;" src="{{asset('img/'.$organisasi->foto)}}" alt="your image" width="50%" class="mt-3"/>
                    </div>
                    @endif
                    @if($organisasi->id_bidang == NULL)
                    <div class="form-group" style="display: none;" id="bidang">
                        <label for="exampleInputUsername1" class="fw-bold">Bidang<span class="text-danger">*</span></label>
                        <select name="id_bidang" class="form-control" id="bidang">
                            <option selected disabled>Select Bidang</option>
                            @foreach($bidang as $item)
                            <option value="{{$item->id}}" @if($item->id == $organisasi->id_bidang)@selected(true)@endif>{{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    @else
                    <div class="form-group" id="bidang">
                        <label for="exampleInputUsername1" class="fw-bold">Bidang<span class="text-danger">*</span></label>
                        <select name="id_bidang" class="form-control" id="bidang">
                            <option disabled>Select Bidang</option>
                            @foreach($bidang as $item)
                            <option value="{{$item->id}}" @if($item->id == $organisasi->id_bidang)@selected(true)@endif>{{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    {{-- <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Domisili<span class="text-danger">*</span></label>
                        <select name="domisili" placeholder="Cari Nama Kota..." id="kota">
                        <option value="">Cari Nama Kota...</option>
                           @foreach($kota as $item)
                            <option value="{{$item->name}}" @if($organisasi->domisili == $item->name)@selected(true)@endif>{{$item->name}}</option>
                           @endforeach
                        </select>
                    </div> --}}
                    <div class="modal-footer gap-1 mt-5">
                        <a href="/admin/kepengurusan" class="btn btn-outline-warning btn-icon-text">
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
    $(document).ready(function () {
        $('#posisi').change(function () {
            var selectedTingkatan = $('option:selected', this).data('tingkatan');
            
            if (selectedTingkatan === 4) {
                $('#foto').hide();
                $('#bidang').show();
            } else {
                $('#foto').show();
                $('#bidang').hide();
            }

            $('#select-tingkatan').val(selectedTingkatan);
        });
    });
</script>

<script>
$('#kota').selectize({
    sortField: 'text',
});
</script>



<script>
    function toggleInput() {
        const cekElement = document.getElementById('foto');
        const selectElement = document.getElementById("posisi");
        const bidangElement = document.getElementById("bidang");

        if (selectElement.value === "Anggota") {
            cekElement.style.display = "none";
            bidangElement.style.display = "block";
        } else {
            cekElement.style.display = "block";
            bidangElement.style.display = "none";
        }
    }
</script>

<script>
const foto = document.getElementById('selectImage');
const img = document.getElementById('value');
foto.onchange = evt => {
    preview = document.getElementById('preview');
    preview.style.display = 'block';
    img.style.display = 'none';
    const [file] = foto.files
    if (file) {
        preview.src = URL.createObjectURL(file)
    }
}
</script>
@endsection