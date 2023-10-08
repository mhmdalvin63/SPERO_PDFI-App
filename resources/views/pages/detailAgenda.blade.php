@extends('mainFE')
@section('judul_tab','Detail Agenda PDFI')

@section('content')
<link rel="stylesheet" href=" {{ asset('css/page/detailAgenda.css')}}">
<link rel="stylesheet" type="text/css" href="../slick/slick.css"/>
// Add the new slick-theme.css if you want the default styling
<link rel="stylesheet" type="text/css" href="../slick/slick-theme.css"/>
				



<div class="berandaPage" style="transform: translateY(5.75rem)">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-12">
                {{-- <div class="header">
                    <img class="headerImage" src="{{asset('img/'.$detailagenda->foto)}}" alt="">
                    <img class="headerImage" src="{{asset('image/shopeeImg.png')}}" alt="">
                </div> --}}
                <div id="page">
                    <div class="row">
                        <div class="column small-11 small-centered">
                            <div class="slider slider-single">
                            @foreach($detailagenda->foto as $item)
                                <div>
                                    <img class="carouselDA" src="{{asset('img/'.$item->foto)}}" alt="">
                                </div>
                                @endforeach
                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="container my-5">
                    <div class="daTitle my-5">
                        <h3 class="fw-bold">{{$detailagenda->judul_agenda}}</h3>
                        <div class="penyelenggara d-flex gap-3 align-items-center mt-2">
                            <i class="fa-regular fa-user"></i>
                            <p class="fw-semibold">{{$detailagenda->anggota->nama_anggota}}</p>
                        </div>
                    </div>
                    <div class="daDesc my-3">
                        <p class="md fw-semibold">{{$detailagenda->deskripsi}}
                        </p>
                    </div>
                    <div class="textFlex d-flex my-3">
                        <p class="md fw-bold">Event Type</p>
                        <p class="md fw-bold">:&emsp;@foreach($detailagenda->type as $item){{$item->nama_tipe}} @endforeach</p>
                    </div>
                    <div class="textFlex d-flex my-3">
                        <p class="md fw-bold">Location</p>
                        <p class="md fw-bold">:&emsp;{{$detailagenda->location}}</p>
                    </div>
                    <div class="textFlex d-flex">
                        <p class="md fw-bold">Start - End Date</p>
                        <p class="md fw-bold">:&emsp;{{date('d F, Y', strtotime($detailagenda->start_date))}} - {{date('d F, Y', strtotime($detailagenda->end_date))}}</p>
                    </div>
                    <div class="textFlex d-flex my-3">
                        <p class="md fw-bold">Tickets</p>
                        <p class="md fw-bold">:&emsp;
                            @if($detailagenda->status_event == 'Buy')
                            @foreach($detailagenda->tiket as $item)
                            {{$item->nama_tiket}}, Rp. {{number_format($item->harga_tiket)}}<br>&emsp;&nbsp;
                            @endforeach
                            @elseif($detailagenda->status_event == 'Free')
                            Free
                            @endif
                        </p>
                    </div>  
                    
                        @if($detailagenda->status_event == 'Free')
                        @if(Auth::check() && Auth::user()->level == 'user')
                            <button type="button" class="btn btn-sm btn-pesan px-5" data-bs-toggle="modal" data-bs-target="#exampleModaljoin">
                                Join
                            </button>
                            @else
                                <button type="button" class="btn btn-sm btn-pesan px-5" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                    Daftar
                                </button>
                            @endif
                        @elseif($detailagenda->status_event == 'Buy')
                            @if(Auth::check() && Auth::user()->level == 'user')
                                <button type="button" class="btn btn-sm btn-pesan px-5" data-bs-toggle="modal" data-bs-target="#exampleModalpesan">
                                    Pesan
                                </button>
                            @else
                                <button type="button" class="btn btn-sm btn-pesan px-5" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                    Daftar
                                </button>
                            @endif
                        @endif
                        @if($detailagenda->panduan != NULL)
                        <a href="{{ URL( '/dw-panduan/'.$detailagenda->panduan)  }}" class="btn btn-sm btn-success fw-bold">Download Panduan</a>
                        @endif
                </div>
            </div>
            <div class="col-12">
                <div class="listUpdate mt-5">
                    <div class="container">
                        <h3 class="text-gray fw-bolder mb-2">Kegiatan Lainnya</h3>
                        <div class="row  justify-content-sm-start justify-content-center">
                            @foreach($similarUpdates as $item)
                                <div class="col-12 col-sm-6 col-md-4  my-3">
                                    <a href="{{ url('/detailagenda', $item->slug) }}" style="text-decoration: none; color: black;">
                                        <div class="luContent">
                                            <div class="lcImage">
                                                <img src="{{asset('img/'.$item->foto)}}" alt="">
                                            </div>
                                            <div class="lcText p-3">
                                                <div class="ltHeader d-flex justify-content-between mb-2">
                                                    <p class="lg fw-semibold">Webinar</p>
                                                    <p class="lg fw-bold">{{$item->status_event}}</p>
                                                </div>
                                                <div class="ltTitle mb-2">
                                                    <p class="xl fw-bold">{{$item->judul_agenda}}</p>
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
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Apakah Anda Anggota PDFI?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body justify-content-center">
        <a href="{{$detailagenda->link_gform}}" class="btn btn-outline-warning fw-bold" target="_blank" rel="noopener noreferrer">Tidak</a>
        <a href="/login" class="btn btn-outline-primary fw-bold" rel="noopener noreferrer">Ya</a>
    </div>
   
    </div>
</div>
</div>
<!-- Modal Pesan-->
<div class="modal fade" id="exampleModalpesan" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daftar {{$detailagenda->judul_agenda}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('daftaragenda', $detailagenda->slug) }}" id="myForm" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">Nama Panjang</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Your Name">
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" placeholder="Input Your Birthdate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Jenis Kelamin</label>
                        <select class="form-select" name="jenis_kelamin" aria-label="Default select example">
                            <option selected disabled>Pilih Jenis Kelamin</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">No Telepon</label>
                    <input type="number" name="no_telp" placeholder="Input Your Phone Number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">Email</label>
                    <input type="email" name="email" placeholder="Input Your Email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                
                <div class="mb-3">
                    <label for="tiket" class="form-label fw-bold">Jenis Tiket</label>
                    <select name="id_tiket" id="tiket" class="form-select" aria-label="Default select example">
                        <option selected disabled>Pilih Jenis Tiket</option>
                        @foreach($detailagenda->tiket as $tiket)
                        <option value="{{$tiket->id}}">{{$tiket->nama_tiket}} - {{number_format($tiket->harga_tiket)}}</option>
                        @endforeach
                    </select>
                    <div id="error-message" style="color: red;"></div>
                </div>
                @if($detailagenda->qris != NULL)
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">Qris Pembayaran</label><br>
                    <img src="{{asset('img/'.$detailagenda->qris)}}" height="200px" alt="">
                </div>
                @endif
                @if($detailagenda->no_rek != NULL)
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">Transfer</label><br>
                    <p class="fw-bold">No Rekening: {{$detailagenda->no_rek}}</p>
                </div>
                @endif
                <div class="row g-3">
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Provinsi</label>
                        <select id="province" name="id_provinsi" class="form-select" aria-label="Default select example">
                            <option selected disabled>Pilih Provinsi</option>
                            @foreach ($provinsi as $item)
                                <option value="{{ $item->code }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Kabupaten/Kota</label>
                        <select id="city" name="id_kota" class="form-select" aria-label="Default select example">
                        <option selected disabled>Pilih Kabupaten/Kota</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Kecamatan</label>
                        <select id="kecamatan" name="id_kecamatan" class="form-select" aria-label="Default select example">
                            <option selected disabled>Pilih Kecamatan</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">Alamat</label>
                    <input type="text" name="alamat" placeholder="Input Your Address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label fw-bold">Bukti Transfer</label>
                    <input required class="form-control" name="bukti_transfer" type="file" id="formFile">
                    @error('bukti_transfer')
                            <p class="text-danger">Gambar Harus Berupa jpg, jpeg, png, atau webp</p>
                    @enderror
                </div>
                <!-- <div class="mb-3">
                    <label for="formFile" class="form-label fw-bold">Bukti Keanggotaan</label>
                    <input class="form-control" name="bukti_keanggotaan" type="file" id="formFile">
                </div> -->
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary store">
                    Pesan
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Join-->
<div class="modal fade" id="exampleModaljoin" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daftar {{$detailagenda->judul_agenda}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('daftaragenda', $detailagenda->slug) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">Nama Panjang</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Your Name">
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" placeholder="Input Your Birthdate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Jenis Kelamin</label>
                        <select class="form-select" name="jenis_kelamin" aria-label="Default select example">
                            <option selected disabled>Pilih Jenis Kelamin</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">No Telepon</label>
                    <input type="number" name="no_telp" placeholder="Input Your Phone Number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">Email</label>
                    <input type="email" name="email" placeholder="Input Your Email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="row g-3">
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Provinsi</label>
                        <select id="provinsi" name="id_provinsi" class="form-select" aria-label="Default select example">
                            <option selected disabled>Pilih Provinsi</option>
                            @foreach ($provinsi as $item)
                                <option value="{{ $item->code }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Kabupaten/Kota</label>
                        <select id="kota" name="id_kota" class="form-select" aria-label="Default select example">
                        <option selected disabled>Pilih Kabupaten/Kota</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Kecamatan</label>
                        <select id="camat" name="id_kecamatan" class="form-select" aria-label="Default select example">
                            <option selected disabled>Pilih Kecamatan</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">Alamat</label>
                    <input type="text" name="alamat" placeholder="Input Your Address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <!-- <div class="mb-3">
                    <label for="formFile" class="form-label fw-bold">Bukti Keanggotaan</label>
                    <input class="form-control" name="bukti_keanggotaan" type="file" id="formFile">
                </div> -->
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary store">
                    Pesan
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Login -->
<div class="modal fade" id="exampleModallogin" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 mx-auto" id="exampleModalToggleLabel">Login Or Register</h1>
      </div>
      <div class="modal-body mx-auto my-2">
            <a class="btn btn-dark px-3 py-1" href="/register" role="button "><p class="md">Register</p></a>
            <a class="btn btn-primary px-3 py-1" href="/login" role="button "><p class="md">Login</p></a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script>

<script>
$(document).ready(function() {
  $("#myForm").submit(function(e) {
    e.preventDefault(); // Prevent the form from submitting by default
    
    // Get the selected value of the "gender" select element
    var selectedtiket = $("#tiket").val();
    
    // Check if the selected value is empty (i.e., the user selected "Select")
    if (selectedtiket === "") {
      $("#error-message").text("Pilih Tiket");
      return; // Stop form submission
    }
    
    // If a gender is selected, you can proceed with form submission
    // You can add additional validation logic here
    
    // If everything is valid, you can submit the form
    this.submit();
  });
});
</script>
<script>
    $(function (){
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        $(function(){
            $('#provinsi').on('change', function(){
                let id_provinsi = $('#provinsi').val();
                
                $.ajax({
                    type: 'POST',
                    url: "{{route('kota')}}",
                    data: {id_provinsi:id_provinsi},
                    cache: false,

                    success: function(msg){
                        $('#kota').html(msg);
                    },
                    error: function(data){
                        console.log('error:', data)
                    },
                })
            });


            $('#kota').on('change', function(){
                let id_kota = $('#kota').val();
                
                $.ajax({
                    type: 'POST',
                    url: "{{route('kecamatan')}}",
                    data: {id_kota:id_kota},
                    cache: false,

                    success: function(msg){
                        $('#camat').html(msg);
                    },
                    error: function(data){
                        console.log('error:', data)
                    },
                })
            });

        });

    });
</script>

<script>
    $(function (){
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        $(function(){
            $('#province').on('change', function(){
                let id_provinsi = $('#province').val();
                
                $.ajax({
                    type: 'POST',
                    url: "{{route('kota')}}",
                    data: {id_provinsi:id_provinsi},
                    cache: false,

                    success: function(msg){
                        $('#city').html(msg);
                    },
                    error: function(data){
                        console.log('error:', data)
                    },
                })
            });


            $('#city').on('change', function(){
                let id_kota = $('#city').val();
                
                $.ajax({
                    type: 'POST',
                    url: "{{route('kecamatan')}}",
                    data: {id_kota:id_kota},
                    cache: false,

                    success: function(msg){
                        $('#kecamatan').html(msg);
                    },
                    error: function(data){
                        console.log('error:', data)
                    },
                })
            });

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
