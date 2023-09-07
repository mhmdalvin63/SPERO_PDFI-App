@extends('mainFE')
@section('judul_tab','My Event')

@section('content')
<link rel="stylesheet" href=" {{ asset('css/page/update.css')}}">

<div class="myEventPage" style="transform: translateY(5.75rem)">

    <div class="myEvent">
        <div class="container">
            <div class="row  justify-content-sm-start justify-content-center">
                <div class="col-10 col-sm-6 col-md-4  my-3">
                    @foreach($pendaftar as $item)
                    <div class="luContent">
                        <div class="lcImage"">
                            {!! DNS2D::getBarcodeHTML($item->token, 'QRCODE',7,7) !!}
                        </div>
                        <div class="lcText p-3">
                            <div class="ltHeader d-flex justify-content-between mb-2">
                                <p class="lg fw-semibold">Judul Event</p>
                                <p class="lg fw-semibold">{{$item->agenda->judul_agenda}}</p>
                            </div>
                            <div class="ltHeader d-flex justify-content-between mb-2">
                                <p class="lg fw-semibold">Start Date</p>
                                <p class="lg fw-semibold">{{date('F d, Y', strtotime($item->agenda->start_date))}}</p>
                            </div>
                            <div class="ltHeader d-flex justify-content-between mb-2">
                                <p class="lg fw-semibold">Email</p>
                                <p class="lg fw-semibold">{{$item->email}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection