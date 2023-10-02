@extends('mainFE')
@section('judul_tab','Organisasi PDFI')

@section('content')
<link rel="stylesheet" href=" {{ asset('css/page/organisasi.css')}}">

<div class="organisasiPage"  style="transform: translateY(7rem)">

    <div class="header">
        <div class="container">
            <div class="row align-items-center" id="bg-header">
                <div class="col-12 col-lg-6 px-5 py-2">
                    <h1>Lorem ipsum dolor sit amet consectetur.</h1>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus, libero animi quis aperiam doloremque vero?</p>
                </div>
                <div class="col-12 col-lg-6 d-flex justify-content-center">
                    <img src="{{asset('../image/dokterAgenda.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="tentangKami my-sm-5 my-3 py-sm-5 py-3">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-xl-6 col-lg-5 col-md-6 col-sm-12">
                    <h3 class="text-blue fw-bold">Tentang Kami</h3>
                    <p class="md text-justify fw-bold mt-3">Persatuan Dokter Forensik Indonesia (The Indonesian Association of Forensic Medicine), disingkat PDFI adalah satu-satunya organisasi profesi bagi para Dokter Spesialis Forensik di Indonesia merupakan salah satu Badan Kelengkapan Ikatan Dokter Indonesia (IDI), bersifat bebas, tidak mencari keuntungan, dijiwai oleh Sumpah Dokter Indonesia, mematuhi Kode Etik Kedokteran Indonesia serta peraturan perundang-undangan yang berlaku. Perhimpunan ini didirikan di Yogyakarta pada tanggal 5 Oktober 1993.</p>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-5 col-sm-12">
                    <div class="row">
                        <div class="col-sm-6 col-md-12 col-12">
                            <div class="cardVm text-center p-2 my-2">
                                <h3 class="text-blue fw-bold">Visi</h3>
                                <p class="md fw-bold">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem saepe, ad quam iste eius exercitationem eaque.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-12">
                            <div class="cardVm text-center p-2 my-2">
                                <h3 class="text-blue fw-bold">Visi</h3>
                                <p class="md fw-bold">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem saepe, ad quam iste eius exercitationem eaque.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pengurus my-sm-5 my-3 py-sm-5 py-3">
        <div class="container">
            <div class="row justify-content-center  align-items-center">
                <h3 class="text-blue fw-bold mb-3">Jajaran Pengurus</h3>
                <div class="card col-10 col-md-3 mb-3 col-sm-6">
                    <img src="{{asset('../image/profile.jpg')}}" class="" alt="...">
                    <div class="card-body">
                        <p class="card-text fs-5 fw-bold text-center">Ketua Pengurus</p>
                    </div>
                </div>
                <div class="card col-10 col-md-3 mb-3 col-sm-6">
                    <img src="{{asset('../image/profile.jpg')}}" class="" alt="...">
                    <div class="card-body">
                        <p class="card-text fs-5 fw-bold text-center">Ketua Pengurus</p>
                    </div>
                </div>
                <div class="card col-10 col-md-3 mb-3 col-sm-6">
                    <img src="{{asset('../image/profile.jpg')}}" class="" alt="...">
                    <div class="card-body">
                        <p class="card-text fs-5 fw-bold text-center">Ketua Pengurus</p>
                    </div>
                </div>
                <div class="card col-10 col-md-3 mb-3 col-sm-6">
                    <img src="{{asset('../image/profile.jpg')}}" class="" alt="...">
                    <div class="card-body">
                        <p class="card-text fs-5 fw-bold text-center">Ketua Pengurus</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sejarah my-sm-5 my-3 py-sm-5 py-3">
        <div class="container">
            <h3 class="text-blue fw-bold mb-3">Sejarah PDFI</h3>
            <p class="md text-justify fw-bold mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga molestias quisquam similique neque assumenda, doloribus maiores iure! Alias, voluptatum nobis modi esse, dolorum sint inventore voluptatem asperiores iusto quas ea! Sint rem nisi mollitia, labore fuga fugit! Saepe sint maxime perspiciatis minus vitae fuga temporibus earum necessitatibus, quaerat ipsum commodi praesentium, autem laborum consequuntur aliquid odio aspernatur. Distinctio totam assumenda placeat modi vitae adipisci, ipsam exercitationem omnis, obcaecati, mollitia impedit tempora officiis odio dolore eligendi quasi! Voluptatum tenetur assumenda quidem.</p>
        </div>
    </div>

</div>
@endsection