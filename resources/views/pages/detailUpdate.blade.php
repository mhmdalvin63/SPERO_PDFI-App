@extends('mainFE')
@section('judul_tab','Detail Update PDFI')

@section('content')
<link rel="stylesheet" href=" {{ asset('css/page/detailUpdate.css')}}">
<link rel="stylesheet" type="text/css" href="../slick/slick.css"/>
// Add the new slick-theme.css if you want the default styling
<link rel="stylesheet" type="text/css" href="../slick/slick-theme.css"/>

<div class="berandaPage" style="transform: translateY(5.75rem)">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-12">
                <div id="page">
                    <div class="row">
                        <div class="column small-11 small-centered">
                            <div class="slider slider-single">
                                @foreach($detailupdate->foto as $item)
                                <div>
                                    <img class="carouselDA" src="{{asset('img/'.$item->foto)}}" alt="">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container my-5">
                    <div class="row justify-content-between text-justify">
                        <div class="daTitle mb-5">
                            <h3 class="fw-bold">{{$detailupdate->judul_update}}</h3>
                            <p class="fw-semibold">Upload On {{date('d F Y', strtotime($detailupdate->created_at))}}</p>
                        </div>
                        <div class="daDesc my-3">
                            <p class="fw-bold text-justify isi_berita">{!! $detailupdate->isi_berita !!}
                            </p>
                        </div>
                        <div class="interactiveIcon d-flex gap-2 my-3">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" style="color: #666262; padding: 5px 10px;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-share-nodes fa-xl"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item">{!! $shareComponent !!}</li>
                            </ul>
                        </div>
                        @if(Auth::check() && Auth::user()->level == 'user')
                            <button class="trigLike-button btn {{ ($like && $like->id_user == Auth::user()->id) ? 'text-primary' : ''}} " data-update-slug="{{ $detailupdate->slug }}" data-trig="like"><i class="fa-solid fa-thumbs-up fa-xl"></i><span class="fw-bold text-primary ms-2 my-auto" id="like-count-{{$detailupdate->slug}}">{{$countlike}}</span></button>
                        @else
                            <a class="pt-1" href="/login"><i class="fa-solid fa-thumbs-up fa-xl"></i><span class="fw-bold text-primary ms-2 my-auto" id="like-count-{{$detailupdate->slug}}">{{$countlike}}</span></a>
                        @endif
                        </div>
                        <div class="hastag d-flex flex-wrap gap-2">
                            @foreach($detailupdate->tag as $item)
                            <a href="{{url('/update/tag/'.$item->slug)}}"><p class="xl">#{{$item->tag_name}}</p></a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-12 ">
                <div class="listUpdate mt-3">
                    <div class="container">
                        <h3 class="text-gray fw-bolder mb-2">Update Lainnya</h3>
                        <div class="justify-content-sm-start">
                            @foreach($similarUpdates->take(5) as $item)
                                <div class="">
                                    <a href="{{ url('/detailupdate', $item->slug) }}" style="text-decoration: none; color: black;">
                                        <div class="luContent">
                                            <div class="lcImage">
                                              {{--  <img src="{{asset('img/'.$item->foto)}}" alt=""> --}}
                                            </div>
                                            <div class="lcText p-3">
                                                <div class="ltHeader d-flex justify-content-between mb-2">
                                                    <p class="lg fw-semibold">Update</p>
                                                </div>
                                                <div class="ltTitle mb-2">
                                                    <p class="xl fw-bold">{{$item->judul_update}}</p>
                                                </div>
                                                    <p class="lg fw-semibold">{{date('d F, Y', strtotime($item->created_at))}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
           <div class="col-12">
                
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="{{ asset('../slick/slick.min.js') }}"></script>

<script>
    $(document).ready(function () {
        function updateLikeCount(updateSlug) {
        $.ajax({
            type: 'GET',
            url: '/countlike/' + updateSlug,
            success: function (data) {
                $('#like-count-' + updateSlug).text(data.countlike);
            }
        });
    }

    $('.trigLike-button').on('click', function () {
        let trig = $(this).attr('data-trig')
        let self = $(this)
        let updateSlug = $(this).data('update-slug');
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: (trig == "unlike" ? "DELETE" : "POST"),
            url: '/'+ (trig == "unlike" ? "unlike" : "like") +'/' + updateSlug,
            data: {
                '_token': csrfToken
            },
            success: function (data) {
                // Handle success, update UI as needed (e.g., increment like count)
                // $('.trigLike-button').html(data);
                
                if (trig == "unlike") {
                    self.attr('data-trig', 'like')
                   self.removeClass('text-primary');
                }else{
                    self.attr('data-trig', 'unlike')
                   self.addClass('text-primary');
                }
            }
        });
        updateLikeCount(updateSlug)
    });
});


</script>

<script>
    $('.slider-single').slick({
        autoplay: true,
    autoplaySpeed: 3000,
 	slidesToShow: 1,
 	slidesToScroll: 1,
 	arrows: true,
 	fade: false,
 	adaptiveHeight: true,
 	infinite: false,
	useTransform: true,
 	speed: 400,
 	cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',
 });

 $('.slider-nav')
 	.on('init', function(event, slick) {
 		$('.slider-nav .slick-slide.slick-current').addClass('is-active');
 	})
 	.slick({
 		slidesToShow: 7,
 		slidesToScroll: 7,
 		dots: false,
 		focusOnSelect: false,
 		infinite: false,
 		responsive: [{
 			breakpoint: 1024,
 			settings: {
 				slidesToShow: 5,
 				slidesToScroll: 5,
 			}
 		}, {
 			breakpoint: 640,
 			settings: {
 				slidesToShow: 4,
 				slidesToScroll: 4,
			}
 		}, {
 			breakpoint: 420,
 			settings: {
 				slidesToShow: 3,
 				slidesToScroll: 3,
		}
 		}]
 	});

 $('.slider-single').on('afterChange', function(event, slick, currentSlide) {
 	$('.slider-nav').slick('slickGoTo', currentSlide);
 	var currrentNavSlideElem = '.slider-nav .slick-slide[data-slick-index="' + currentSlide + '"]';
 	$('.slider-nav .slick-slide.is-active').removeClass('is-active');
 	$(currrentNavSlideElem).addClass('is-active');
 });

 $('.slider-nav').on('click', '.slick-slide', function(event) {
 	event.preventDefault();
 	var goToSingleSlide = $(this).data('slick-index');

 	$('.slider-single').slick('slickGoTo', goToSingleSlide);
 });
</script>
@endsection

