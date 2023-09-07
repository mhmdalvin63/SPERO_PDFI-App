@extends('mainFE')
@section('judul_tab','Update PDFI')

@section('content')
<link rel="stylesheet" href=" {{ asset('../css/page/update.css')}}">

<div class="updatePage" style="transform: translateY(5.75rem)">
    <div class="header position-relative">
        <img class="position-relative" src="{{asset('../image/updateBanner.png')}}" alt="">
        <h1>Update</h1>
    </div>

    <div class="listUpdate mt-5">
        <div class="container">
            <div class="row  justify-content-sm-start justify-content-center">
                @foreach ($Update as $item)
                <div class="col-10 col-sm-6 col-md-4  my-3">
                    <div class="luContent">
                        <div class="lcImage">
                        @foreach($item->foto->take(1) as $foto)
                            <img src="{{asset('img/'.$foto->foto)}}" alt="">
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
                            <a class="text-decoration-none text-black" href="{{ url('/detailupdate', $item->id) }}">
                                <p class="lg fw-semibold">Selengkapnya>></p>
                            </a>
                        </div>
                    </div>
                </div>
               @endforeach
            </div>
        </div>
    </div>
</div>
@endsection