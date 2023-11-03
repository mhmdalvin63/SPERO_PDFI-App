@extends('mainFE')
@section('judul_tab','Agenda PDFI')

@section('content')
<link rel="stylesheet" href=" {{ asset('css/page/agenda.css')}}">

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
        <div class="row d-flex justify-content-center mb-3">
            <form action="/search-agenda">
                <div class="row">
                        <div class="col-lg-5 form-group">
                            <label class="fw-bold">Search Event By Organizer</label>
                            <input class="form-control" type="text" name="search" placeholder="Search...">
                        </div>
                        <div class="col-lg-3 form-group">
                            <label class="fw-bold">Search Start Date</label>
                            <input class="form-control mb-2" type="Date" name="start_date" placeholder="Search...">
                        </div> 
                        <div class="col-lg-3 form-group">
                            <label class="fw-bold">Search End Date</label>
                            <input class="form-control mb-2" type="Date" name="end_date" placeholder="Search...">
                        </div>
                        <div class="col-lg-1 mb-3">
                            <div class="br"><br></div>
                            <button class="btn btn-primary btn-md btn-block" type="submit">Search</button>
                        </div>
                </div>
            </form>
            <h3 class="text-gray fw-bolder mb-2 mb-lg-4"><span class="text-blue">List Agenda</span></h3>
            <div class="row  justify-content-sm-start justify-content-center">
                @foreach($agenda as $item)
                <div class="col-10 col-sm-6 col-md-4  my-3">
                    <div class="luContent">
                        <div class="lcImage">
                        @foreach($item->foto->take(1) as $foto)
                            <img class="position-relative" style="height: 200px; border-radius: 10px;" src="{{asset('img/'.$foto->foto)}}" alt="">
                            @endforeach
                        </div>
                        <div class="lcText p-3">
                            <div class="ltHeader d-flex justify-content-between mb-2">
                                <p class="lg fw-semibold">Agenda</p>
                                <p class="lg fw-semibold">{{date('d F, Y', strtotime($item->created_at))}}</p>
                            </div>
                            <div class="ltTitle mb-2">
                                <p class="xl fw-bold">{{Str::limit($item->judul_agenda, 60)}}</p>
                            </div>
                            <a class="text-decoration-none mt-3 px-3 py-2 mx-auto text-black d-flex justify-content-between align-items-center" href="{{ url('/detailagenda/'.$item->slug) }}">
                                <p class="lg fw-semibold">Detail Agenda</p>
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