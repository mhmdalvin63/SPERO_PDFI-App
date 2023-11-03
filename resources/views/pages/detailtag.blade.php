@extends('mainFE')
@section('judul_tab','Tag PDFI')

@section('content')
<link rel="stylesheet" href=" {{ asset('css/page/update.css')}}">

<div class="updatePage" style="transform: translateY(7rem)">
    <div class="header">    
        <div class="container">
            <div class="row align-items-center" id="bg-header">
                
            </div>
        </div>
    </div>

    <div class="listUpdate mt-5">
        <div class="container">
        <h3 class="text-gray fw-bolder mb-2 mb-lg-4"><span class="">List Tag <span class="text-blue">#{{$detailtag->tag_name}}</span></span></h3>
            <div class="row  justify-content-sm-start justify-content-center">
            @if(Auth::check() && Auth::user()->level != 'user')
                @foreach ($detailtagpublic->upd as $item)
                <div class="col-10 col-sm-6 col-md-4  my-3">
                    <div class="luContent">
                        <div class="lcImage">
                        @foreach($item->foto->take(1) as $foto)
                            <img class="position-relative" style="height: 200px; border-radius: 10px;" src="{{asset('img/'.$foto->foto)}}" alt="">
                            @endforeach
                        </div>
                        <div class="lcText p-3">
                            <div class="ltHeader d-flex justify-content-between mb-2">
                                <p class="lg fw-semibold">Update</p>
                                <p class="lg fw-semibold">{{date('F d, Y', strtotime($item->created_at))}}</p>
                            </div>
                            <div class="ltTitle mb-2">
                                <p class="xl fw-bold">{{$item->judul_update}}</p>
                            </div>
                            <a class="text-decoration-none text-black" href="{{ url('/detailupdate', $item->slug) }}">
                                <p class="lg fw-semibold">Selengkapnya>></p>
                            </a>
                        </div>
                    </div>
                </div>
               @endforeach
               @elseif(Auth::check() && Auth::user()->level == 'user')
               @foreach ($detailtag->upd as $item)
                <div class="col-10 col-sm-6 col-md-4  my-3">
                    <div class="luContent">
                        <div class="lcImage">
                        @foreach($item->foto->take(1) as $foto)
                            <img class="position-relative" style="height: 200px; border-radius: 10px;" src="{{asset('img/'.$foto->foto)}}" alt="">
                            @endforeach
                        </div>
                        <div class="lcText p-3">
                            <div class="ltHeader d-flex justify-content-between mb-2">
                                <p class="lg fw-semibold">Update</p>
                                <p class="lg fw-semibold">{{date('F d, Y', strtotime($item->created_at))}}</p>
                            </div>
                            <div class="ltTitle mb-2">
                                <p class="xl fw-bold">{{$item->judul_update}}</p>
                            </div>
                            <a class="text-decoration-none text-black" href="{{ url('/detailupdate', $item->slug) }}">
                                <p class="lg fw-semibold">Selengkapnya>></p>
                            </a>
                        </div>
                    </div>
                </div>
               @endforeach
               @endif
            </div>
        </div>
    </div>
</div>
@endsection