@extends('mainFE')
@section('judul_tab','Beranda PDFI')

@section('content')
<link rel="stylesheet" href=" {{ asset('css/page/beranda.css')}}">

<div class="berandaPage" style="transform: translateY(5rem)">
    <div class="header">
        <div class="headerImage">
            @foreach($banner as $item)
            @if($item->link == NULL)
            <img class="single-item" src="{{asset('img/'.$item->foto)}}" alt="">
            @else
            <a target="_blank" href="{{$item->link}}"><img class="single-item" src="{{asset('img/'.$item->foto)}}" alt=""></a>
            @endif
            @endforeach
        </div>
        <div class="container">
            <div class="arrowSliderTop d-flex justify-content-between">
                <div class="prev-top"><i class="fa-solid fa-chevron-left"></i></div>
                <div class="next-top"><i class="fa-solid fa-chevron-right"></i></div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-10">
                    <form class="form_search px-md-4 px-2 py-md-3 py-1 fw-semibold" action="/search">
                    <button type="submit py-auto" class="d-none d-sm-block"><i class="fa fa-search icon"></i></button>
                        <input class="fw-semibold" type="text" placeholder="Search..." name="search">
                        <button type="submit py-auto" class="d-sm-none d-block text-end"><i class="fa fa-search icon"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="listUpdate mt-5 pt-0">
        <div class="container">
            <h3 class="text-blue fw-bolder mb-2 mb-lg-5">List Update</h3>
            <div class="row d-flex justify-content-sm-start justify-content-center">
            @if(!Auth::user()  || Auth::user()->level != 'user')
                @foreach ($listupdateumum->take(3) as $item)
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
                                    <p class="lg fw-semibold">{{date('d F, Y', strtotime($item->created_at))}}</p>
                                </div>
                                <div class="ltTitle mb-2">
                                    <p class="xl fw-bold">{{Str::limit($item->judul_update, 60)}}</p>
                                </div>
                                <a class="text-decoration-none text-black" href="{{ url('/detailupdate', $item->slug) }}">
                                    <p class="lg text-primary fw-semibold">Selengkapnya>></p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
               @else
               @foreach ($listupdate->take(3) as $item)
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
                                <p class="xl fw-bold">{{Str::limit($item->judul_update, 60)}}</p>
                            </div>
                            <a class="text-decoration-none text-black" href="{{ url('/detailupdate', $item->slug) }}">
                                <p class="lg text-primary fw-semibold">Selengkapnya>></p>
                            </a>
                        </div>
                    </div>
                </div>
               @endforeach
               @endif
            </div>
        </div>
    </div>
    <div class="listAgenda mt-5">
        <div class="container">
            <h3 class="text-blue fw-bolder mb-2 mb-lg-5">List Agenda</h3>
            <div class="row">
                <div class="col-md-12 col-12">
                     <div class="row position-relative">
                        <div class="col-12 position-relative">
                            <div class="responsive row d-flex">
                                @foreach($listagenda as $item)
                                <div class="slider-item mb-2 position-relative px-2" id="foreach">
                                    @foreach($item->foto->take(1) as $foto)
                                    <img class="position-relative" style="height: 262px; border-radius: 10px;" src="{{asset('img/'.$foto->foto)}}" alt="">
                                    @endforeach
                                    <div class="siText">
                                        <div class="row fw-bold">
                                            <p class="xl col-8 topTitle">Webinar</p>
                                            @if($item->status_event == 'Free')
                                            <p class="xl col text-end topTitle">Gratis</p>
                                            @else
                                            <p class="xl col text-end topTitle">Berbayar</p>
                                            @endif
                                        </div>
                                        <div class="stBottom">
                                            <p class="md fw-bold">{{Str::limit($item->judul_agenda, 15)}}
                                            </p>
                                            <div class="flexBottom d-flex justify-content-between align-items-center mt-2">
                                                <a class="btn btn-la  d-flex align-items-center gap-2" href="{{ url('/detailagenda', $item->slug) }}">
                                                    <p class="text-blue fw-bold">Detail Agenda</p>
                                                    <div class="arrow-la">
                                                        <i class="fa-solid fa-arrow-right fa-2xs" style="color: #fcfcfc;"></i>
                                                    </div>
                                                </a>
                                                <p>{{date('d F, Y', strtotime($item->created_at))}}</p>
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
    @if($users->count() > 0)
    <div class="statistik">
        <div class="container">
            <h3 class="text-blue fw-bolder mb-2 mb-lg-5">Statistik</h3>
            <div class="row">
                <div class="col-sm-6">
                    <canvas id="myChart" width="400" height="200"></canvas>
                </div>
                <div class="col-sm-6">
                    <canvas id="ageChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>


<script>
     var maleCount = <?php echo $maleCount; ?>;
    var femaleCount = <?php echo $femaleCount; ?>;
    // Fetch data from the controller method

    var data = {
        labels: ['Male', 'Female'],
        datasets: [{
            label: 'Total User',
            data: [maleCount, femaleCount],
            backgroundColor :['#87C4FF', '#662549'],
            borderWidth : 0,
        }],
    };
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    suggestedMax: 10,
                }
            },
            responsive: true,
        }
    });
</script>

<script>
    // Data from the controller
    var ageGroups = <?php echo json_encode($ageGroups); ?>;

    // Data for the age group chart
    var ageChartData = {
        labels: Object.keys(ageGroups),
        datasets: [{
            label: 'Total User Sesuai Umur',
            data: Object.values(ageGroups),
            backgroundColor: ['rgba(0, 123, 255, 0.6)', 'rgba(255, 99, 132, 0.6)', 'rgba(75, 192, 192, 0.6)', 'rgba(255, 206, 86, 0.6)'],
            borderWidth: 1,
        }],
    };

    // Create the age group chart
    var ctx = document.getElementById('ageChart').getContext('2d');
    var ageChart = new Chart(ctx, {
        type: 'bar',
        data: ageChartData,
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    suggestedMax: 10,
                }
            },
            maintainAspectRatio: false, // Make the chart responsive
            responsive: true,
        }
    });
</script>


@endsection

@section('customScript')
<script src="text/javascript"></script>
<script>
    $('.responsive').slick({
  dots: false,
  infinite: true,
  rows: 1,
  speed: 300,
slidesToShow: 3,
slidesPerRow: 3,
  prevArrow: $('.prev'),
    nextArrow: $('.next'),
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 1,
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
</script>
<script>
  //Single Item 
  $('.headerImage').slick({
		infinite: true,
		arrows: true,
        prevArrow: $('.prev-top'),
        nextArrow: $('.next-top')
  });
</script>


@endsection
