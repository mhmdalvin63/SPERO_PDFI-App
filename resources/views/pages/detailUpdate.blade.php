@extends('mainFE')
@section('judul_tab','Detail Update PDFI')

@section('content')
<link rel="stylesheet" href=" {{ asset('../css/page/detailUpdate.css')}}">

<div class="berandaPage" style="transform: translateY(5.75rem)">
    <div class="header">
        <img class="headerImage" src="{{asset('img/'.$detailupdate->foto)}}" alt="">
    </div>

    <div class="container my-5">
        <div class="row justify-content-between">
            <div class="col-lg-8 col-md-7 col-sm-7">
                <div class="daTitle mb-5">
                    <h3 class="fw-bold">{{$detailupdate->judul_update}}</h3>
                    <p class="fw-semibold">Upload On {{date('d F Y', strtotime($detailupdate->created_at))}}</p>
                </div>
                <div class="daDesc my-3">
                    <p class="md fw-semibold text-justify">{{$detailupdate->isi_berita}}
                    </p>
                </div>
                <div class="interactiveIcon d-flex gap-4 my-3">
                    <a href=""><i class="fa-solid fa-share-nodes fa-xl"></i></a>
                    <a href=""><i class="fa-solid fa-thumbs-up fa-xl"></i></a>
                </div>
                <div class="hastag d-flex flex-wrap gap-2">
                    @foreach($detailupdate->tag as $item)
                    <a href=""><p class="xl">#{{$item->tag_name}}</p></a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-8 mt-sm-0 mt-4 p-3" id="artikelTerkait">
                <h3 class="fw-bold">Artikel Lainnya</h3>
                @foreach($terkait as $artikel)
                <div class="artikelTerkait">
                    <div class="hr"></div>
                    <div class="atContent">
                        <p>Update on {{date('d F Y', strtotime($artikel->created_at))}}</p>
                        <p class="md fw-bold">{{$artikel->judul_update}}</p>
                        <a href="{{ url('/detailupdate', $artikel->id) }}"><p>Read Article</p></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        
    </div>
</div>
@endsection
