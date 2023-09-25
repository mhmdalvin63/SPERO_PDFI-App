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
                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Input Title Event..." name="judul_agenda">
                        @error('judul_agenda')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Topic Event<span class="text-danger">*</span></label>
                        <textarea class="form-control" style="height: 200px" placeholder="Input Topic Event..." id="floatingTextarea" name="deskripsi"></textarea>
                        @error('deskripsi')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="exampleInputUsername1" class="fw-bold">Start Event<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="exampleInputUsername1" placeholder="Input Start Date Event..." name="start_date">
                            @error('start_date')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleInputUsername1" class="fw-bold">End Event<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="exampleInputUsername1" placeholder="Input End Date Event..." name="end_date">
                            @error('end_date')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Location Event<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Input Location Event..." name="location">
                        @error('location')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Organizer Event<span class="text-danger">*</span></label>
                        <select class="form-control" name="id_anggota">
                            <option>Select Oragnizer Name</option>
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
                        <div class="col"><label for="exampleInputUsername1" class="fw-bold">Price Ticket<span class="text-danger">*</span></label><input type="text" class="form-control" name="harga_tiket[]" placeholder="Input Price Ticket..."></div><div class="col-auto"><br>
                        <button type="button" class="d-block mb-2 btn btn-icon btn-primary add"><i class="bi bi-plus"></i></button></div>
                        </div>
                        <div class="jenis_tiket"></div>
                    </div>
                    <div class="form-group">
                        <label for="formFile" class="form-label">Insert Image Event<span class="text-danger">*</span></label><br>
                        <label for="formFile"><span class="text-sm mt-0">Rekomendasi Ukuran: 1440px x 506px</span></label>
                        <div class="foto"></div>
                        <div class="result text-danger fw-bold"></div>
                        
                      </div>
                    <div class="modal-footer gap-1 mt-5">
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

<script type="text/javascript">
    $('.add').on('click', function(){
        add();
    });

    function add(){
      var jenis_tiket =
        '<div><div class="form-row row mb-2"><div class="col"><input type="text" class="form-control" name="nama_tiket[]" placeholder="Input Name Ticket..." required></div><div class="col"><input type="text" class="form-control" name="harga_tiket[]" placeholder="Input Price Ticket..." required onkeyup="formatNumber(this)"></div><div class="col-auto my-auto"><a href="javascript:void(0)" class="delete2 btn btn-danger" style="text-decoration: none;"><i class="bi bi-trash-fill"></i></a></div></div></div>';
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