@extends('admin.template')
@section('title', 'Pendaftar')
@section('layout')

<div id="result"></div>
<div class="page-heading">
    <h3>Table Pendaftar {{$agenda->judul_agenda}}</h3>
</div>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
  
        <div class="card-body">
            @if(Auth::user()->level == 'cabang')
        <form action="{{ route('search') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$agenda->id}}">
            <div class="row">
                <div class="col-4">
            <div id="reader" width="600px"></div>
        </div>
                <div class="col-8">
            <input placeholder="Search..." id="result" class="form-control result" name="token" type="text">
        
            <button type="submit" id="dis" class="btn btn-primary">
            <i class="bi bi-search"></i>
            </button>
        </div>
            </div>
        </form>
        @elseif(Auth::user()->level == 'admin')
        <form action="{{ route('adminsearch') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$agenda->id}}">
            <div class="row">
                <div class="col-4">
            <div id="reader" width="600px"></div>
        </div>
                <div class="col-8">
            <input placeholder="Search..." id="result" class="form-control result" name="token" type="text">
        
            <button type="submit" id="dis" class="btn btn-primary">
            <i class="bi bi-search"></i>
            </button>
        </div>
            </div>
        </form>
        @endif
  <div id="result"></div>
            
            
            <div class="table-responsive text-center">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Action</th>
                            <th>Name</th>
                            <th>No. Telepon</th>
                            <th>Bukti Transfer</th>
                            <th>Bukti Keanggotaan</th>
                            <th>Join Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($pendaftar as $item)
                    <tr class="fw-bold">
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                @if(Auth::user()->level == 'admin')
                                <form action="{{ url('admin/agenda/pendaftar', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-icon btn-danger delete" data-id="{{ $item->id }}"><i class="bi bi-trash-fill"></i></button>   
                                </form>
                                @elseif(Auth::user()->level == 'cabang')
                                <form action="{{ url('cabang/agenda/pendaftar', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-icon btn-danger delete" data-id="{{ $item->id }}"><i class="bi bi-trash-fill"></i></button>   
                                </form>
                                @endif
                                @if($item->status == 'Unproved')
                                    @if(Auth::user()->level == 'cabang')
                                    <form action="{{  url('cabang/agenda/pendaftar/approve/'.$item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-info btn-sm-lg text-white"><i class="bi bi-check"></i></button>
                                    </form>
                                    @elseif(Auth::user()->level == 'admin')
                                    <form action="{{  url('admin/agenda/pendaftar/approve/'.$item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-info btn-sm-lg text-white"><i class="bi bi-check"></i></button>
                                    </form>
                                    @endif
                                @else
                                    <button disabled class="btn btn-info btn-sm-lg text-white"><i class="bi bi-check-all"></i></button>
                                @endif
                            </div>
                        </td>
                        <td class="text-center">{{$item->name}}</td>
                        <td class="text-center">{{$item->no_telp}}</td>
                        <td class="text-center"><img src="{{asset('img/'.$item->bukti_transfer)}}"  height="100" alt=""></td>  
                        <td class="text-center"><img src="{{asset('img/'.$item->bukti_keanggotaan)}}"  height="100" alt=""></td>                        
                        <td class="text-center">{{date('d F Y', strtotime($item->created_at))}}</td>
                        <td class="text-center">
                            @if($item->status == 'Unproved')
                            <button class="btn btn-warning">Unproved</button>
                            @else
                            <button class="btn btn-primary">Approved</button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {
  // handle the scanned code as you like, for example:
//   console.log(`Code matched = ${decodedText}`, decodedResult);
    $(".result").val(decodedText);
    let token = decodedText;

    document.getElementById('dis').click();
}

function onScanFailure(error) {
  // handle scan failure, usually better to ignore and keep scanning.
  // for example:
  console.warn(`Code scan error = ${error}`);
}

let html5QrcodeScanner = new Html5QrcodeScanner(
  "reader",
  { fps: 10, qrbox: {width: 250, height: 250} },
  /* verbose= */ false);
html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
@endsection