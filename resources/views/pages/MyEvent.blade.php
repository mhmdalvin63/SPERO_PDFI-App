@extends('mainFE')
@section('judul_tab','My Event')

@section('content')
<link rel="stylesheet" href=" {{ asset('../css/page/update.css')}}">

<div class="myEventPage" style="transform: translateY(5.75rem)">

    <div class="myEvent">
        <div class="container">
            <div class="row  justify-content-sm-start justify-content-center">
                <div class="col-10 col-sm-6 col-md-4  my-3">
                    <div class="luContent">
                        <div class="lcImage">
                            {{-- <img src="{{asset('img/'.$item->foto)}}" alt=""> --}}
                            <img src="{{asset('../image/qrSample.png')}}" alt="">
                        </div>
                        <div class="lcText p-3">
                            <div class="ltHeader d-flex justify-content-between mb-2">
                                <p class="lg fw-semibold">Judul Event</p>
                                {{-- <p class="lg fw-semibold">{{date('F d, Y', strtotime($item->created_at))}}</p> --}}
                                <p class="lg fw-semibold">2</p>
                            </div>
                            <div class="ltHeader d-flex justify-content-between mb-2">
                                <p class="lg fw-semibold">Start Date</p>
                                {{-- <p class="lg fw-semibold">{{date('F d, Y', strtotime($item->created_at))}}</p> --}}
                                <p class="lg fw-semibold">2</p>
                            </div>
                            <div class="ltHeader d-flex justify-content-between mb-2">
                                <p class="lg fw-semibold">Email</p>
                                {{-- <p class="lg fw-semibold">{{date('F d, Y', strtotime($item->created_at))}}</p> --}}
                                <p class="lg fw-semibold">2</p>
                            </div>
                            {{-- <a class="text-decoration-none text-black" href="{{ url('/detailupdate', $item->id) }}"> --}}
                            {{-- <a class="text-decoration-none text-black" href="">
                                <p class="lg fw-semibold">Selengkapnya>></p>
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection