@extends('mainFe')
@section('judul_tab','Agenda PDFI')

@section('content')
<link rel="stylesheet" href=" {{ asset('../css/page/agenda.css')}}">

<div class="agendaPage" style="transform: translateY(7rem)">

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

    <div class="listUpdate mt-5">
        <div class="container">
            <h3 class="text-gray fw-bolder mb-2 mb-lg-4">List <span class="text-blue">Agenda</span></h3>
            <div class="row  justify-content-sm-start justify-content-center">
                @foreach($agenda as $item)
                <div class="col-10 col-sm-6 col-md-4  my-3">
                    <div class="luContent">
                        <div class="lcImage">
                            <img src="{{asset('img/'.$item->foto)}}" height="147px" width="100%" alt="">
                        </div>
                        <div class="lcText p-3">
                            <div class="ltHeader d-flex justify-content-between mb-2">
                                <p class="lg fw-semibold">Update</p>
                                <p class="lg fw-semibold">{{date('F d, Y', strtotime($item->created_at))}}</p>
                            </div>
                            <div class="ltTitle mb-2">
                                <p class="xl fw-bold">{{$item->judul_agenda}}</p>
                            </div>
                            <a class="text-decoration-none mt-3 px-3 py-2 mx-auto text-black d-flex justify-content-between align-items-center" href="{{ url('/detailagenda', $item->id) }}">
                                <p class="lg fw-semibold">Mulai Course</p>
                                <div class="arrow">
                                    <i class="fa-solid fa-arrow-right fa-2xs"></i>
                                </div>
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