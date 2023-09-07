@extends('mainFE')
@section('judul_tab','Organisasi PDFI')

@section('content')
<link rel="stylesheet" href=" {{ asset('css/page/organisasi.css')}}">

<div class="organisasiPage" style="transform: translateY(5.75rem)">

    <div class="header position-relative">
        <img class="position-relative" src="{{asset('../image/organisasiBanner.png')}}" alt="">
        <h1>ORGANISASI</h1>
    </div>  

    <div class="tentangKami my-sm-5 my-3 py-sm-5 py-3">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-xl-6 col-lg-5 col-md-6 col-sm-12">
                    <h3 class="text-blue fw-bold">Tentang Kami</h3>
                    <p class="md text-justify fw-medium mt-3">Persatuan Dokter Forensik Indonesia (The Indonesian Association of Forensic Medicine), disingkat PDFI adalah satu-satunya organisasi profesi bagi para Dokter Spesialis Forensik di Indonesia merupakan salah satu Badan Kelengkapan Ikatan Dokter Indonesia (IDI), bersifat bebas, tidak mencari keuntungan, dijiwai oleh Sumpah Dokter Indonesia, mematuhi Kode Etik Kedokteran Indonesia serta peraturan perundang-undangan yang berlaku. Perhimpunan ini didirikan di Yogyakarta pada tanggal 5 Oktober 1993.</p>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-5 col-sm-12">
                    <div class="row">
                        <div class="col-sm-6 col-md-12 col-12">
                            <div class="cardVm text-center p-2 my-2">
                                <h3 class="text-blue fw-bold">Visi</h3>
                                <p class="md fw-medium">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem saepe, ad quam iste eius exercitationem eaque.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-12">
                            <div class="cardVm text-center p-2 my-2">
                                <h3 class="text-blue fw-bold">Visi</h3>
                                <p class="md fw-medium">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem saepe, ad quam iste eius exercitationem eaque.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection