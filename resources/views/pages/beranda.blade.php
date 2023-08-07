@extends('mainFE')
@section('judul_tab','Beranda PDFI')

@section('content')
<link rel="stylesheet" href=" {{ asset('../css/page/beranda.css')}}">

<div class="berandaPage" style="transform: translateY(5rem)">
    <div class="header">
        <img class="headerImage" src="{{asset('../image/professional-medical-uniforms.png')}}" alt="">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-10">
                    <form class="form_search px-md-4 px-2 py-md-3 py-1 fw-semibold" action="">
                        <button type="submit py-auto"><i class="fa fa-search icon"></i></button>
                        <input class="fw-semibold" type="text" placeholder="Search..." name="search">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="listUpdate mt-5 pt-0">
        <div class="container">
            <h3 class="text-blue fw-bolder mb-2 mb-lg-5">List Update</h3>
            <div class="row d-flex justify-content-sm-start justify-content-center">
            @foreach ($listupdate as $item)
                <div class="col-10 col-sm-6 col-md-4  my-3">
                    <div class="luContent">
                        <div class="lcImage">
                            <img src="{{asset('img/'.$item->foto)}}" alt="">
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

    <div class="listAgenda mt-5">
        <div class="container">
            <div class="row">
                <div class="col-3 leftImage">
                    <h3 class="fw-bold text-blue">List Agenda</h3>
                    <p class="lg">lorem ipsum</p>
                    <img src="{{asset('../image/doctor-pose-new.png')}}" alt="">
                </div>
                <div class="col-md-9 col-12">
                     <div class="row position-relative">
                        <div class="col-12 position-relative">
                            <div class="responsive row d-flex">
                                @foreach($listagenda as $item)
                                <div class="slider-item mb-2 position-relative px-2" id="foreach">
                                    <img class="position-relative" style="height: 262px; border-radius: 10px;" src="{{asset('img/'.$item->foto)}}" alt="">
                                    <div class="siText">
                                        <p class="xl topTitle">Webinar</p>
                                        <div class="stBottom">
                                            <p class="md fw-bold">{{$item->judul_agenda}}
                                            </p>
                                            <div class="flexBottom d-flex justify-content-between align-items-center mt-2">
                                                <a class="btn btn-la  d-flex align-items-center gap-2" href="{{ url('/detailagenda', $item->id) }}">
                                                    <p class="text-blue fw-bold">Lihat Agenda</p>
                                                    <div class="arrow-la">
                                                        <i class="fa-solid fa-arrow-right fa-2xs" style="color: #fcfcfc;"></i>
                                                    </div>
                                                </a>
                                                <p>{{date('F d, Y', strtotime($item->created_at))}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                               </div>
        
                            <div class="arrowSlider d-flex justify-content-between">
                                <div class="prev"><i class="fa-solid fa-chevron-left"></i></div>
                                <div class="next"><i class="fa-solid fa-chevron-right"></i></div>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('customScript')
<script src="text/javascript"></script>
<script>
    $('.responsive').slick({
  dots: false,
  infinite: true,
  rows: 2,
  speed: 300,
slidesPerRow: 2,
  prevArrow: $('.prev'),
    nextArrow: $('.next'),
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        rows: 2,
        slidesPerRow: 1,
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

</script>
@endsection
