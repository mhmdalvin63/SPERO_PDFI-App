@extends('mainFe')
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
            <h1 class="text-blue fw-bolder mb-5">List Update</h1>
            <div class="row d-flex justify-content-sm-start justify-content-center">
                <div class="col-10 col-sm-6 col-md-4  my-3">
                    <div class="luContent">
                        <div class="lcImage">
                            <img src="{{asset('../image/lu-content.png')}}" alt="">
                        </div>
                        <div class="lcText p-3">
                            <div class="ltHeader d-flex justify-content-between mb-2">
                                <p class="lg fw-semibold">Update</p>
                                <p class="lg fw-semibold">Maret 1,2023</p>
                            </div>
                            <div class="ltTitle mb-2">
                                <p class="xl fw-bold">CME 313 - Penatalaksanaan Hipertensi Emergensi ( 2 SKP IDI )</p>
                            </div>
                            <a class="text-decoration-none text-black" href="">
                                <p class="lg fw-semibold">Selengkapnya>></p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-sm-6 col-md-4  my-3">
                    <div class="luContent">
                        <div class="lcImage">
                            <img src="{{asset('../image/lu-content.png')}}" alt="">
                        </div>
                        <div class="lcText p-3">
                            <div class="ltHeader d-flex justify-content-between mb-2">
                                <p class="lg fw-semibold">Update</p>
                                <p class="lg fw-semibold">Maret 1,2023</p>
                            </div>
                            <div class="ltTitle mb-2">
                                <p class="xl fw-bold">CME 313 - Penatalaksanaan Hipertensi Emergensi ( 2 SKP IDI )</p>
                            </div>
                            <a class="text-decoration-none text-black" href="">
                                <p class="lg fw-semibold">Selengkapnya>></p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-sm-6 col-md-4  my-3">
                    <div class="luContent">
                        <div class="lcImage">
                            <img src="{{asset('../image/lu-content.png')}}" alt="">
                        </div>
                        <div class="lcText p-3">
                            <div class="ltHeader d-flex justify-content-between mb-2">
                                <p class="lg fw-semibold">Update</p>
                                <p class="lg fw-semibold">Maret 1,2023</p>
                            </div>
                            <div class="ltTitle mb-2">
                                <p class="xl fw-bold">CME 313 - Penatalaksanaan Hipertensi Emergensi ( 2 SKP IDI )</p>
                            </div>
                            <a class="text-decoration-none text-black" href="">
                                <p class="lg fw-semibold">Selengkapnya>></p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-sm-6 col-md-4  my-3">
                    <div class="luContent">
                        <div class="lcImage">
                            <img src="{{asset('../image/lu-content.png')}}" alt="">
                        </div>
                        <div class="lcText p-3">
                            <div class="ltHeader d-flex justify-content-between mb-2">
                                <p class="lg fw-semibold">Update</p>
                                <p class="lg fw-semibold">Maret 1,2023</p>
                            </div>
                            <div class="ltTitle mb-2">
                                <p class="xl fw-bold">CME 313 - Penatalaksanaan Hipertensi Emergensi ( 2 SKP IDI )</p>
                            </div>
                            <a class="text-decoration-none text-black" href="">
                                <p class="lg fw-semibold">Selengkapnya>></p>
                            </a>
                        </div>
                    </div>
                </div>
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
                <div class="col-9">
                    {{-- <div class="responsive position-relative"  style="height: 100%; width: 100%;">
                            <div class="text-white sliderItem">
                                <div class="sliderContent position-relative">
                                    <img class="position-relative" src="{{asset('../image/slider-img.png')}}" alt="">
                                    <div class="scText position-absolute top-0 p-3">
                                        <p class="md">Webinar</p>
                                    <p class="xl fw-bold">CME 313 - Penatalaksanaan Hipertensi Emergensi ( 2 SKP IDI )</p>
                                    <div class="scButtons d-flex justify-content-between align-items-center">
                                        <div class="sdLeft py-2 px-3 d-flex gap-1 align-items-center">
                                            <p class="md fw-bold">Lihat Agenda</p>
                                            <div class="arrowRounded">
                                                <i class="fa-solid fa-arrow-right fa-2xs"></i>
                                            </div>
                                        </div>
                                        <div class="sbRight">
                                            <p class="md">Maret 1, 2023</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-white sliderItem">
                                <div class="sliderContent position-relative">
                                    <img class="position-relative" src="{{asset('../image/slider-img.png')}}" alt="">
                                    <div class="scText position-absolute top-0 p-3">
                                        <p class="md">Webinar</p>
                                    <p class="xl fw-bold">CME 313 - Penatalaksanaan Hipertensi Emergensi ( 2 SKP IDI )</p>
                                    <div class="scButtons d-flex justify-content-between align-items-center">
                                        <div class="sdLeft py-2 px-3 d-flex gap-1 align-items-center">
                                            <p class="md fw-bold">Lihat Agenda</p>
                                            <div class="arrowRounded">
                                                <i class="fa-solid fa-arrow-right fa-2xs"></i>
                                            </div>
                                        </div>
                                        <div class="sbRight">
                                            <p class="md">Maret 1, 2023</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                   <div class="sliderButton position-absolute d-flex justify-content-between w-100">
                        <div class="sbPrev">
                            <i id="previous" class="fa-solid fa-chevron-left"></i>
                        </div>
                        <div class="sbNext">
                            <i id="next" class="fa-solid fa-chevron-right"></i>
                        </div>
                   </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('customScript')
<script src="text/javascript"></script>
{{-- <script>
    var totalSliderItem = $('.sliderItem').length;
    var rowing = (totalSliderItem > "2") ? "2":"1";
    var slide = (totalSliderItem > "4") ? "4":"1";
    // alert(rowing)
    $('.responsive').slick({
  dots: true,
  infinite: true,
    //   arrows: true,
  rows: 2,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  nextArrow: $('.sbNext'),
    prevArrow: $('.sbPrev'),
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
</script> --}}
@endsection
