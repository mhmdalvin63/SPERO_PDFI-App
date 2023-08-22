@extends('mainFE')
@section('judul_tab','Detail Agenda PDFI')

@section('content')
<link rel="stylesheet" href=" {{ asset('../css/page/detailAgenda.css')}}">


<div class="berandaPage" style="transform: translateY(5.75rem)">
    <div class="header">
        <img class="headerImage" src="{{asset('img/'.$detailagenda->foto)}}" alt="">
    </div>

    <div class="container my-5">
        <div class="daTitle my-5">
            <h3 class="fw-bold">{{$detailagenda->judul_agenda}}</h3>
            <div class="penyelenggara d-flex gap-3 align-items-center mt-2">
                <i class="fa-regular fa-user"></i>
                <p class="fw-semibold">{{$detailagenda->anggota->nama_anggota}}</p>
            </div>
        </div>
        <div class="daDesc my-3">
            <p class="md fw-semibold">{{$detailagenda->deskripsi}}
            </p>
        </div>
        <div class="textFlex d-flex my-3">
            <p class="md fw-bold">Event Type</p>
            <p class="md fw-bold">:&emsp;@foreach($detailagenda->type as $item){{$item->nama_tipe}} @endforeach</p>
        </div>
        <div class="textFlex d-flex my-3">
            <p class="md fw-bold">Location</p>
            <p class="md fw-bold">:&emsp;{{$detailagenda->location}}</p>
        </div>
        <div class="textFlex d-flex my-3">
            <p class="md fw-bold">Start - End Date</p>
            <p class="md fw-bold">:&emsp;{{$detailagenda->start_date}} - {{$detailagenda->end_date}}</p>
        </div>
        <div class="textFlex d-flex my-3">
            <p class="md fw-bold">Tickets</p>
            <p class="md fw-bold">:&emsp;
                @if($detailagenda->status_event == 'Buy')
                @foreach($detailagenda->tiket as $item)
                {{$item->nama_tiket}} = Rp. {{number_format($item->harga_tiket)}}<br> &emsp;
                @endforeach
                @elseif($detailagenda->status_event == 'Free')
                Free
                @endif
            </p>
        </div>  
        
            @if($detailagenda->status_event == 'Free')
                <button type="button" class="btn btn-pesan px-5" data-bs-toggle="modal" data-bs-target="#exampleModaljoin">
                    Join
                </button>
            @elseif($detailagenda->status_event == 'Buy')
                <button type="button" class="btn btn-pesan px-5" data-bs-toggle="modal" data-bs-target="#exampleModalpesan">
                    Pesan
                </button>
            @endif
        <div class="listUpdate mt-5">
            <div class="container">
                <h3 class="text-gray fw-bolder mb-2">Kegiatan Lainnya</h3>
                <div class="row  justify-content-sm-start justify-content-center">
                    @foreach($allagenda as $item)
                        <div class="col-12 col-sm-6 col-md-4  my-3">
                            <a href="{{ url('/detailagenda', $item->id) }}" style="text-decoration: none; color: black;">
                                <div class="luContent">
                                    <div class="lcImage">
                                        <img src="{{asset('img/'.$item->foto)}}" alt="">
                                    </div>
                                    <div class="lcText p-3">
                                        <div class="ltHeader d-flex justify-content-between mb-2">
                                            <p class="lg fw-semibold">Webinar</p>
                                            <p class="lg fw-bold">{{$item->status_event}}</p>
                                        </div>
                                        <div class="ltTitle mb-2">
                                            <p class="xl fw-bold">{{$item->judul_agenda}}</p>
                                        </div>
                                            <p class="lg fw-semibold">{{date('F d, Y', strtotime($item->start_date))}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Pesan-->
<div class="modal fade" id="exampleModalpesan" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nobar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('daftaragenda', $detailagenda->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">Nama Panjang</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Your Name">
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" placeholder="Input Your Birthdate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Jenis Kelamin</label>
                        <select class="form-select" name="jenis_kelamin" aria-label="Default select example">
                            <option selected disabled>Pilih Jenis Kelamin</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">No Telepon</label>
                    <input type="number" name="no_telp" placeholder="Input Your Phone Number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">Email</label>
                    <input type="email" name="email" placeholder="Input Your Email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">Jenis Tiket</label>
                        <select name="id_tiket" class="form-select" aria-label="Default select example">
                            <option selected disabled>Pilih Jenis Tiket</option>
                           @foreach($detailagenda->tiket as $tiket)
                           <option value="{{$tiket->id}}">{{$tiket->nama_tiket}} - {{number_format($tiket->harga_tiket)}}</option>
                           @endforeach
                        </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">No. Anggota IDI</label>
                    <input type="number" name="no_anggota_idi" placeholder="Input Your Number IDI Organization" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">No. Anggota PDFI</label>
                    <input type="number" name="no_anggota_pdfi" placeholder="Input Your Number PDFI Organization" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label fw-bold">Bukti Transfer</label>
                    <input class="form-control" name="bukti_transfer" type="file" id="formFile">
                </div>
                <div class="row g-3">
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Provinsi</label>
                        <select id="province" name="id_provinsi" class="form-select" aria-label="Default select example">
                            <option selected disabled>Pilih Provinsi</option>
                            @foreach ($provinsi as $item)
                                <option value="{{ $item->code }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Kabupaten/Kota</label>
                        <select id="city" name="id_kota" class="form-select" aria-label="Default select example">
                        <option selected disabled>Pilih Kabupaten/Kota</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Kecamatan</label>
                        <select id="kecamatan" name="id_kecamatan" class="form-select" aria-label="Default select example">
                            <option selected disabled>Pilih Kecamatan</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">Alamat</label>
                    <input type="text" name="alamat" placeholder="Input Your Address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">Asal Cabang</label>
                    <input type="text" name="cabang" placeholder="Input Your Address Brach Clinic" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary store">
                    Pesan
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Join-->
<div class="modal fade" id="exampleModaljoin" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nobar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">Nama Panjang</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Jenis Kelamin</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Pilih Jenis Kelamin</option>
                            <option value="1">Laki-Laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">No Telepon</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">No. Anggota IDI</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">No. Anggota PDFI</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="row g-3">
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Provinsi</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Kabupaten/Kota</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Kecamatan</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">Alamat</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">Asal Cabang</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">
                    Pesan
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Login -->
<div class="modal fade" id="exampleModallogin" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 mx-auto" id="exampleModalToggleLabel">Login Or Register</h1>
      </div>
      <div class="modal-body mx-auto my-2">
            <a class="btn btn-dark px-3 py-1" href="/register" role="button "><p class="md">Register</p></a>
            <a class="btn btn-primary px-3 py-1" href="/login" role="button "><p class="md">Login</p></a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(function (){
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        $(function(){
            $('#province').on('change', function(){
                let id_provinsi = $('#province').val();
                
                $.ajax({
                    type: 'POST',
                    url: "{{route('kota')}}",
                    data: {id_provinsi:id_provinsi},
                    cache: false,

                    success: function(msg){
                        $('#city').html(msg);
                    },
                    error: function(data){
                        console.log('error:', data)
                    },
                })
            });


            $('#city').on('change', function(){
                let id_kota = $('#city').val();
                
                $.ajax({
                    type: 'POST',
                    url: "{{route('kecamatan')}}",
                    data: {id_kota:id_kota},
                    cache: false,

                    success: function(msg){
                        $('#kecamatan').html(msg);
                    },
                    error: function(data){
                        console.log('error:', data)
                    },
                })
            });

        });

    });
</script>

@endsection
