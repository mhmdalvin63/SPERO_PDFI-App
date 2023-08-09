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
                {{$item->nama_tiket}}&emsp; = Rp. {{number_format($item->harga_tiket)}}<br> &emsp;
                @endforeach
                @elseif($detailagenda->status_event == 'Free')
                Free
                @endif
            </p>
        </div>  
        <button type="button" class="btn btn-pesan px-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Pesan
        </button>

        <div class="listUpdate mt-5">
            <div class="container">
                <h3 class="text-gray fw-bolder mb-2">Kegiatan Lainnya</h3>
                <div class="row  justify-content-sm-start justify-content-center">
                    <div class="col-12 col-sm-6 col-md-4  my-3">
                        <div class="luContent">
                            <div class="lcImage">
                                <img src="{{asset('../image/lu-content.png')}}" alt="">
                            </div>
                            <div class="lcText p-3">
                                <div class="ltHeader d-flex justify-content-between mb-2">
                                    <p class="lg fw-semibold">Webinar</p>
                                    <p class="lg fw-bold">Free</p>
                                </div>
                                <div class="ltTitle mb-2">
                                    <p class="xl fw-bold">CME 313 - Penatalaksanaan Hipertensi Emergensi ( 2 SKP IDI )</p>
                                </div>
                                    <p class="lg fw-semibold">Maret 1, 2023</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4  my-3">
                        <div class="luContent">
                            <div class="lcImage">
                                <img src="{{asset('../image/lu-content.png')}}" alt="">
                            </div>
                            <div class="lcText p-3">
                                <div class="ltHeader d-flex justify-content-between mb-2">
                                    <p class="lg fw-semibold">Webinar</p>
                                    <p class="lg fw-bold">Free</p>
                                </div>
                                <div class="ltTitle mb-2">
                                    <p class="xl fw-bold">CME 313 - Penatalaksanaan Hipertensi Emergensi ( 2 SKP IDI )</p>
                                </div>
                                    <p class="lg fw-semibold">Maret 1, 2023</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4  my-3">
                        <div class="luContent">
                            <div class="lcImage">
                                <img src="{{asset('../image/lu-content.png')}}" alt="">
                            </div>
                            <div class="lcText p-3">
                                <div class="ltHeader d-flex justify-content-between mb-2">
                                    <p class="lg fw-semibold">Webinar</p>
                                    <p class="lg fw-bold">Free</p>
                                </div>
                                <div class="ltTitle mb-2">
                                    <p class="xl fw-bold">CME 313 - Penatalaksanaan Hipertensi Emergensi ( 2 SKP IDI )</p>
                                </div>
                                    <p class="lg fw-semibold">Maret 1, 2023</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4  my-3">
                        <div class="luContent">
                            <div class="lcImage">
                                <img src="{{asset('../image/lu-content.png')}}" alt="">
                            </div>
                            <div class="lcText p-3">
                                <div class="ltHeader d-flex justify-content-between mb-2">
                                    <p class="lg fw-semibold">Webinar</p>
                                    <p class="lg fw-bold">Free</p>
                                </div>
                                <div class="ltTitle mb-2">
                                    <p class="xl fw-bold">CME 313 - Penatalaksanaan Hipertensi Emergensi ( 2 SKP IDI )</p>
                                </div>
                                    <p class="lg fw-semibold">Maret 1, 2023</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nobar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Panjang</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="col">
                    <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">Laki-Laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">No Telepon</label>
                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis Tiket</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">Laki-Laki</option>
                        <option value="2">Perempuan</option>
                    </select>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Bukti Transfer</label>
                <input class="form-control" type="file" id="formFile">
            </div>
            <div class="row g-3">
                <div class="col">
                    <label for="exampleInputEmail1" class="form-label">Provinsi</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="col">
                    <label for="exampleInputEmail1" class="form-label">Kabupaten/Kota</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="col">
                    <label for="exampleInputEmail1" class="form-label">Kecamatan</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Pekerjaan</label>
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
@endsection
