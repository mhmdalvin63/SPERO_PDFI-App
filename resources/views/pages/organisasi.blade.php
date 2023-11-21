@extends('mainFE')
@section('judul_tab','Organisasi PDFI')

@section('content')
<link rel="stylesheet" href=" {{ asset('css/page/organisasi.css')}}">
<div class="organisasiPage">
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
    <div class="pengurus my-2 my-sm-2">
        <div class="container">
            <h3 class="text-blue fw-bold mb-3">Pengurus Besar</h3>
            <div class="row align-items-center">
                @foreach($ketua as $ket)
                <div class="card col-10 bx mx-1 col-md-3 mb-3 col-sm-6">
                    <img src="{{asset('img/'.$ket->foto)}}" class="" alt="...">
                    <div class="card-body">
                        <p class="card-text fs-5 fw-bold text-blue text-center">{{$ket->nama}}</p>
                        <p class="card-text fs-5 fw-bold text-center">{{$ket->posisi->posisi}}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                @foreach($sekretaris as $sek)
                <div class="card col-10 bx mx-1 col-md-3 mb-3 col-sm-6">
                    <img src="{{asset('img/'.$sek->foto)}}" class="" alt="...">
                    <div class="card-body">
                        <p class="card-text fs-5 fw-bold text-blue text-center">{{$sek->nama}}</p>
                        <p class="card-text fs-5 fw-bold text-center">{{$sek->posisi->posisi}}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                @foreach($seksi as $seksis)
                <div class="card col-10 bx mx-1 col-md-3 mb-3 col-sm-6">
                    <img src="{{asset('img/'.$seksis->foto)}}" class="" alt="...">
                    <div class="card-body">
                        <p class="card-text fs-5 fw-bold text-blue text-center">{{$seksis->nama}}</p>
                        <p class="card-text fs-5 fw-bold text-center">{{$seksis->posisi->posisi}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <div class="sejarah">
        <div class="container">
            <ul class="nav nav-tabs fw-bold justify-content-center" id="myTabs">
                <li class="nav-item">
                    <a class="nav-link fs-5 active" id="bidangTab" data-bs-toggle="tab" href="#bidang">Bidang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" id="dewanTab" data-bs-toggle="tab" href="#dewan">Dewan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" id="koorTab" data-bs-toggle="tab" href="#koor">Koordinator</a>
                </li>
            </ul>
            <div class="tab-content fw-bold">
                <div class="tab-pane show active fade" id="bidang">
                    @foreach($bidang as $item)
                    <p class="fw-bold text-blue fs-4">{{$item->nama}}</p>
                        @foreach($item->organisasi as $ketu)
                            @if($ketu->posisi->tingkatan == 4)
                            <p class="fw-bold text-dark fs-5 ms-2">Ketua: {{$ketu->nama}}</p>
                            @endif
                            @if($ketu->posisi->tingkatan == 5)
                            <p class="fw-bold text-dark fs-5 ms-2">Wakil Ketua: {{$ketu->nama}}</p>
                            @endif
                            @if($ketu->posisi->tingkatan == 6)
                            <p class="fw-bold text-dark fs-5 ms-2">Sekretaris: {{$ketu->nama}}</p>
                            @endif
                        @endforeach
                            <p class="fw-bold text-dark fs-5">Anggota:</p>
                            <ul class="fw-bold text-dark fs-5">
                        @foreach($item->organisasi as $pengurus)
                            @if($pengurus->posisi->tingkatan == 7)
                                <li>{{$pengurus->nama}}</li>
                                @endif
                                @endforeach
                            </ul>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="dewan">
                @foreach($dewan as $item)
                    <p class="fw-bold text-blue fs-4">{{$item->nama}}</p>
                        @foreach($item->organisasi as $ketu)
                            @if($ketu->posisi->tingkatan == 4)
                            <p class="fw-bold text-dark fs-5 ms-2">Ketua: {{$ketu->nama}}</p>
                            @endif
                            @if($ketu->posisi->tingkatan == 5)
                            <p class="fw-bold text-dark fs-5 ms-2">Wakil Ketua: {{$ketu->nama}}</p>
                            @endif
                            @if($ketu->posisi->tingkatan == 6)
                            <p class="fw-bold text-dark fs-5 ms-2">Sekretaris: {{$ketu->nama}}</p>
                            @endif
                        @endforeach
                            <ul class="fw-bold text-dark fs-5">
                        @foreach($item->organisasi as $pengurus)
                            @if($pengurus->posisi->tingkatan == 7)
                                <li>{{$pengurus->nama}}</li>
                                @endif
                                @endforeach
                            </ul>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="koor">
                @foreach($koor as $item)
                    <p class="fw-bold text-blue fs-4">{{$item->nama}}</p>
                        @foreach($item->organisasi as $ketu)
                            @if($ketu->posisi->tingkatan == 4)
                            <p class="fw-bold text-dark fs-5 ms-2">Ketua: {{$ketu->nama}}</p>
                            @endif
                            @if($ketu->posisi->tingkatan == 5)
                            <p class="fw-bold text-dark fs-5 ms-2">Wakil Ketua: {{$ketu->nama}}</p>
                            @endif
                            @if($ketu->posisi->tingkatan == 6)
                            <p class="fw-bold text-dark fs-5 ms-2">Sekretaris: {{$ketu->nama}}</p>
                            @endif
                        @endforeach
                            <ul class="fw-bold text-dark fs-5">
                        @foreach($item->organisasi as $pengurus)
                            @if($pengurus->posisi->tingkatan == 7)
                                <li>{{$pengurus->nama}}</li>
                                @endif
                                @endforeach
                            </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="sejarah my-sm-5 my-3 py-sm-5 py-3">
        <div class="container">
            <h3 class="text-blue fw-bold mb-3">Demografi PDFI</h3>
            <div class="row justify-content-center gap-1">
                @foreach ($users->pluck('kota')->unique('id') as $city)
                <div class="col-sm-5">
                    <div class="card">
                        <div class="card-body">
                            <p class="fw-bold fs-5 text-blue">{{$city->name}}</p>
                            <p class="card-text mb-3">Total Dokter Forensik: {{ $users->where('asal_cabang', $city->id)->count() }}</p>
                            <button type="button" class="btn px-0" data-bs-toggle="modal" data-bs-target="#exampleModal{{$city->id}}">
                                Detail Cabang
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$city->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail {{$city->name}}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               <table class="table table-hover table-striped" id="table1_{{ $city->id }}">
                               <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Name</th>
                                        <th style="text-align: center;">Jenis Kelamin</th>
                                        <th style="text-align: center;">Umur</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users->where('asal_cabang', $city->id) as $user)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{ $user->name}}</td>
                                        <td>{{ $user->jenis_kelamin == "P" ? "Perempuan" : "Laki-Laki" }}</td>
                                        <td>{{ \Carbon\Carbon::parse($user->tanggal_lahir)->age }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                               </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
            // Initialize DataTable for each table with a dynamic ID
                    $(document).ready(function() {
                        $('#table1_{{ $city->id }}').DataTable();
                    });
                </script>
                @endforeach
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