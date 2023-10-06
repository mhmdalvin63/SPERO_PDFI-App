@extends('admin.template')
@section('title', ' Edit Agenda')
@section('layout')
<div class="page-heading">
    <h3>Edit Data Event</h3>
</div>

<div class="row d-flex" style="justify-content: center;">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body p-5">
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
                <form action="{{ url('cabang/agenda', $agenda->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Title Event<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{ $agenda->judul_agenda}}" id="exampleInputUsername1" placeholder="Input Title Event..." name="judul_agenda">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Topic Event<span class="text-danger">*</span></label>
                        <textarea class="form-control" style="height: 200px" placeholder="Input Topic Event..." id="floatingTextarea" name="deskripsi">{{ $agenda->deskripsi}}</textarea>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="exampleInputUsername1" class="fw-bold">Start Event<span class="text-danger">*</span></label>
                            <input type="date" value="{{ $agenda->start_date}}" class="form-control" id="exampleInputUsername1" placeholder="Input Start Date Event..." name="start_date">
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleInputUsername1" class="fw-bold">End Event<span class="text-danger">*</span></label>
                            <input type="date" value="{{ $agenda->end_date}}" class="form-control" id="exampleInputUsername1" placeholder="Input End Date Event..." name="end_date">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Location Event<span class="text-danger">*</span></label>
                        <input type="text" value="{{ $agenda->location}}" class="form-control" id="exampleInputUsername1" placeholder="Input Location Event..." name="location">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Organizer Event<span class="text-danger">*</span></label>
                        <select class="form-control" name="id_anggota">
                            @foreach ($anggota as $item)
                            <option value="{{ $item->id }}"
                            @if($agenda->id_anggota == $item->id)@selected(true) @endif
                            >{{ $item->nama_anggota }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Type Event<span class="text-danger">*</span></label>
                        <select multiple="multiple" class="choices form-control multiple-remove" name="tipe_id[]" id="selectType">
                        @foreach($tipe as $type)
                            <option value="{{ $type->id }}"
                            @foreach($agenda->type as $type2)
                            @if($type2->id == $type->id)@selected(true)@endif
                            @endforeach
                            >{{ $type->nama_tipe }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="">
                    <label for="exampleInputUsername1" class="fw-bold">Free or Buy<span class="text-danger">*</span></label>
                    <select name="status_event" class="form-control" id="select">
                        <option value="Free" @if($agenda->status_event == 'Free')@selected(true)@endif>Free</option>
                        <option value="Buy" @if($agenda->status_event == 'Buy')@selected(true)@endif>Buy</option>
                    </select>
                    </div>
                    <div class="form-group mt-3" id="tiket">
                        <label for="" class="fw-bold">Event Tickets</label>
                        <div class="row">
                            <div class="col mt-2">
                                <label for="exampleInputUsername1" class="fw-bold">Ticket Name<span class="text-danger">*</span></label>
                            </div>
                            <div class="col mt-2">
                                <label for="exampleInputUsername1" class="fw-bold">Price Ticket<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-auto">
                            <button type="button" class="d-block btn btn-icon btn-primary add"><i class="bi bi-plus"></i></button>
                            </div>
                        </div>
                        @if($agenda->status_event == 'Buy')
                        @foreach( $agenda->tiket as $item)
                        <div class="row form-row">
                            <div class="col">
                                <input type="text" value="{{$item->nama_tiket}}" class="form-control" name="nama_tiket[]" placeholder="Input Name Ticket...">
                            </div>
                            <div class="col">
                                <input type="number" value="{{$item->harga_tiket}}" class="form-control" name="harga_tiket[]" placeholder="Input Price Ticket...">
                            </div>
                            <div class="col-auto my-1">
                                <a href="javascript:void(0)" class="delete2 btn btn-danger" style="text-decoration: none;"><i class="bi bi-trash-fill"></i></a>
                            </div>
                        </div>
                            @endforeach
                        @endif
                        <div class="jenis_tiket"></div>
                    </div>
                    <div class="form-group">
                        <label for="formFile" class="form-label">Insert Image Event<span class="text-danger">*</span></label><br>
                        <div class="foto"></div>
                        <div class="result text-danger fw-bold"></div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Link GForm<span class="text-danger">*</span></label>
                        <input type="url" class="form-control" value="{{ $agenda->link_gform}}" id="exampleInputUsername1" placeholder="Input Link GForm..." name="link_gform">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">File Panduan<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" value="{{ $agenda->panduan}}" id="exampleInputUsername1" placeholder="Input Panduan..." name="panduan">
                    </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Upload Qris<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="exampleInputUsername1" name="qris">
                        @error('qris')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    @if($agenda->no_rek != NULL)
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Input No. Rekening</label>
                        <input type="number" class="form-control" value="{{ $agenda->no_rek}}" id="exampleInputUsername1" placeholder="Input No. Rekening..." name="no_rek">
                    </div>
                    @else
                    <div class="form-group">
                        <div class="d-flex">
                            <input type="checkbox" id="checkrek" class="form-check" id="exampleInputUsername1">
                            <label class="fw-bold">Anda Ingin Input No. Rekening?</label>
                        </div>  
                    </div>
                      <div style="display: none;" id="norek" class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Input No. Rekening</label>
                        <input type="number" class="form-control" id="exampleInputUsername1" placeholder="Input No. Rekening..." name="no_rek">
                    </div>
                    @endif
                    <div class="modal-footer gap-1 mt-5">
                        <a href="/cabang/agenda" class="btn btn-outline-warning btn-icon-text">
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
        '<div><div class="form-row row mb-2"><div class="col"><input type="text" class="form-control" name="nama_tiket[]" placeholder="Input Name Ticket..." required></div><div class="col"><input type="number" class="form-control" name="harga_tiket[]" placeholder="Input Price Ticket..." required onkeyup="formatNumber(this)"></div><div class="col-auto my-auto"><a href="javascript:void(0)" class="delete2 btn btn-danger" style="text-decoration: none;"><i class="bi bi-trash-fill"></i></a></div></div></div>';
      $('.jenis_tiket').append(jenis_tiket);
    };

    $("body").on("click",".delete2",function(){ 
        $(this).parents(".form-row").remove();
    });

    $(document).ready(function(){
     $("#select").on("change", function(){  
        if ($(this).val()=="Free")
      $("#tiket").hide();
        else
        $("#tiket").show();
    });
    $("#select").each(function(){  
        if ($(this).val()=="Free")
      $("#tiket").hide();
        else
        $("#tiket").show();
    });
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