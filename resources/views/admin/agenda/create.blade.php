@extends('admin.template')
@section('title', ' Insert Agenda')
@section('layout')
<div class="page-heading">
    <h3>Insert Data Event</h3>
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
                <form action="{{ url('admin/agenda') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Title Event<span class="text-danger">*</span></label>
                        <input type="text" value="{{ old('judul_agenda') }}" class="form-control" id="exampleInputUsername1" placeholder="Input Title Event..." name="judul_agenda">
                        @error('judul_agenda')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Topic Event<span class="text-danger">*</span></label>
                        <textarea class="ckeditor" name="deskripsi">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="exampleInputUsername1" class="fw-bold">Start Event<span class="text-danger">*</span></label>
                            <input type="date" value="{{ old('start_date') }}" class="form-control" id="exampleInputUsername1" placeholder="Input Start Date Event..." name="start_date">
                            @error('start_date')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleInputUsername1" class="fw-bold">End Event<span class="text-danger">*</span></label>
                            <input type="date" value="{{ old('end_date') }}" class="form-control" id="exampleInputUsername1" placeholder="Input End Date Event..." name="end_date">
                            @error('end_date')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Location Event<span class="text-danger">*</span></label>
                        <input type="text" value="{{ old('location') }}" class="form-control" id="exampleInputUsername1" placeholder="Input Location Event..." name="location">
                        @error('location')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Organizer Event<span class="text-danger">*</span></label>
                        <select class="form-control" name="id_anggota">
                            <option selected disabled>Select Oragnizer Name</option>
                            @foreach ($anggota as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_anggota }}</option>
                            @endforeach
                        </select>
                        @error('id_anggota')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Type Event<span class="text-danger">*</span></label>
                        <select multiple="multiple" class="choices form-control multiple-remove" name="tipe_id[]" id="selectType">
                            @foreach ($tipe as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_tipe }}</option>
                            @endforeach
                        </select>
                        @error('tipe_id')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group" id="">
                    <label for="exampleInputUsername1" class="fw-bold">Free or Buy<span class="text-danger">*</span></label>
                    <select name="status_event" class="form-control" id="select">
                        <option value="Free">Free</option>
                        <option value="Buy">Buy</option>
                    </select>
                    @error('status_event')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mt-3" id="tiket">
                        <label for="" class="fw-bold">Event Tickets</label>
                        <div class="row">
                        <div class="col"><label for="exampleInputUsername1" class="fw-bold">Ticket Name<span class="text-danger">*</span></label><input type="text" class="form-control" name="nama_tiket[]" placeholder="Input Name Ticket..."></div>
                        <div class="col"><label for="exampleInputUsername1" class="fw-bold">Price Ticket<span class="text-danger">*</span></label><input type="number" class="form-control" name="harga_tiket[]" placeholder="Input Price Ticket..."></div><div class="col-auto"><br>
                        <button type="button" class="d-block mb-2 btn btn-icon btn-primary add"><i class="bi bi-plus"></i></button></div>
                        </div>
                        <div class="jenis_tiket"></div>
                    </div>
                    <div class="form-group">
                        <label for="formFile" class="form-label">Insert Image Topic</label><br>
                        <label for="formFile"><span class="text-sm mt-0">Rekomendasi Ukuran: 1:1 atau 4:3<span class="text-danger">*max 2mb</span></span></label>
                        <div class="foto"></div>
                        @error('foto')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="result text-danger fw-bold"></div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Link GForm<span class="text-danger">*</span></label>
                        <input type="url" value="{{ old('link_gform') }}" class="form-control" id="exampleInputUsername1" placeholder="Input Link GForm..." name="link_gform">
                        @error('link_gform')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">File Panduan<span class="text-danger">*</span></label>
                        <input type="file" value="{{ old('panduan') }}" class="form-control" id="exampleInputUsername1" placeholder="Input Panduan..." name="panduan">
                        @error('panduan')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Upload Qris<span class="text-danger">*</span></label>
                        <input type="file" value="{{ old('qris') }}" class="form-control" id="exampleInputUsername1" name="qris">
                        @error('qris')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="d-flex">
                            <input type="checkbox" id="checkrek" class="form-check" id="exampleInputUsername1">
                            <label class="fw-bold">Anda Ingin Input No. Rekening?</label>
                        </div>  
                    </div>
                      <div style="display: none;" id="norek" class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Input No. Rekening</label>
                        <input type="number" value="{{ old('no_rek') }}" class="form-control" id="exampleInputUsername1" placeholder="Input No. Rekening..." name="no_rek">
                    </div>
                    <div  class="modal-footer gap-1 mt-5">
                        <a href="/admin/agenda" class="btn btn-outline-warning btn-icon-text">
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
    document.addEventListener("DOMContentLoaded", function() {
    const fotoDiv = document.querySelector(".foto");
    const submitBtn = document.getElementById("dis");

    submitBtn.addEventListener("click", function(event) {
        // Check if the "foto" div contains any uploaded images
        const uploadedImages = fotoDiv.querySelectorAll("img");
        
        if (uploadedImages.length === 0) {
            // No images are uploaded, prevent form submission and show an error message
            event.preventDefault();
            document.querySelector(".result").innerHTML = "Upload Image";
        }
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
var checkrek = document.getElementById('checkrek');
var norek = document.getElementById('norek');

// Add an event listener to the checkbox to toggle the content visibility

checkrek.addEventListener('change', function() {
  if (checkrek.checked) {
    norek.style.display = 'block'; // Show the content when the checkbox is checked
  } else {
    norek.style.display = 'none'; 
  }
});
});
</script>

<script type="text/javascript">
    $('.add').on('click', function(){
        add();
    });

    function add(){
      var jenis_tiket =
        '<div><div class="form-row row mb-2"><div class="col"><input required type="text" class="form-control" name="nama_tiket[]" placeholder="Input Name Ticket..." required></div><div class="col"><input required type="number" class="form-control" name="harga_tiket[]" placeholder="Input Price Ticket..." required onkeyup="formatNumber(this)"></div><div class="col-auto my-auto"><a href="javascript:void(0)" class="delete2 btn btn-danger" style="text-decoration: none;"><i class="bi bi-trash-fill"></i></a></div></div></div>';
      $('.jenis_tiket').append(jenis_tiket);
    };

    $("body").on("click",".delete2",function(){ 
        $(this).parents(".form-row").remove();
    });

    $("#tiket").hide();
 
 $("#select").on("change", function(){  
   if ($(this).val()=="Buy")
     $("#tiket").show();
   else
     $("#tiket").hide();
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