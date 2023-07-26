@extends('mainFe')
@section('judul_tab','Detail Agenda PDFI')

@section('content')
<link rel="stylesheet" href=" {{ asset('../css/page/detailAgenda.css')}}">

<div class="berandaPage" style="transform: translateY(5.75rem)">
    <div class="header">
        <img class="headerImage" src="{{asset('../image/daAgenda.png')}}" alt="">
    </div>

    <div class="container my-5">
        <div class="daTitle my-5">
            <h3 class="fw-bold">CPD 313 - Tata Laksana Keracunan Ethylene Glycol</h3>
            <div class="penyelenggara d-flex gap-3 align-items-center mt-2">
                <i class="fa-regular fa-user"></i>
                <p class="fw-semibold">Penyelenggara</p>
            </div>
        </div>
        <div class="daDesc my-3">
            <p class="md fw-semibold">Lorem ipsum dolor sit amet consectetur. Odio tincidunt justo a id vitae. At aliquet posuere vitae volutpat iaculis. Ac et sagittis et pellentesque egestas sodales elementum pharetra facilisis. Lorem posuere a cras tortor aenean eu pulvinar posuere consequat. In eget dignissim morbi id volutpat sapien. Nam ante sit purus sed. 

                Tristique lobortis aliquet mattis faucibus. Scelerisque consectetur non leo feugiat ultricies egestas id praesent.
                Placerat sed aliquet orci platea etiam nulla. Accumsan consectetur mauris nec et odio lectus nulla. Sagittis in ipsum faucibus ut ante in a cum porta. Donec cras odio sed ut. Aliquam accumsan auctor ut vulputate eget sem leo. Morbi fringilla ultrices urna odio cursus. Erat pellentesque ornare eu risus vitae.
            </p>
        </div>
        <div class="textFlex d-flex my-3">
            <p class="md fw-bold">Event Type</p>
            <p class="md fw-bold">:&emsp;Offline, Concert</p>
        </div>
        <div class="textFlex d-flex my-3">
            <p class="md fw-bold">Location</p>
            <p class="md fw-bold">:&emsp;Jln.Muara, Jagakarsa, Jakarta Selatan</p>
        </div>
        <div class="textFlex d-flex my-3">
            <p class="md fw-bold">Start - End Date</p>
            <p class="md fw-bold">:&emsp;1-2 March 2023</p>
        </div>
        <div class="textFlex d-flex my-3">
            <p class="md fw-bold">Tickets</p>
            <p class="md fw-bold">:&emsp;Rp 100.000 - Rp 250.000</p>
        </div>
        <a class="btn btn-pesan px-5" href="#" role="button">Pesan</a>

        <div class="listUpdate mt-5">
            <div class="container">
                <h3 class="text-gray fw-bolder mb-2">Kegiatan Lainnya</h3>
                <div class="row  justify-content-sm-start justify-content-center">
                    <div class="col-12 col-sm-6 col-md-4  my-3">
                        <div class="luContent">
                            <div class="lcImage">
                                <img src="{{asset('../image/lu-content.png')}}" alt="">
                            </div>
                            <div class="lcText p-3">
                                <div class="ltHeader d-flex justify-content-between mb-2">
                                    <p class="lg fw-semibold">Webinar</p>
                                    <p class="lg fw-bold">Free</p>
                                </div>
                                <div class="ltTitle mb-2">
                                    <p class="xl fw-bold">CME 313 - Penatalaksanaan Hipertensi Emergensi ( 2 SKP IDI )</p>
                                </div>
                                    <p class="lg fw-semibold">Maret 1, 2023</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4  my-3">
                        <div class="luContent">
                            <div class="lcImage">
                                <img src="{{asset('../image/lu-content.png')}}" alt="">
                            </div>
                            <div class="lcText p-3">
                                <div class="ltHeader d-flex justify-content-between mb-2">
                                    <p class="lg fw-semibold">Webinar</p>
                                    <p class="lg fw-bold">Free</p>
                                </div>
                                <div class="ltTitle mb-2">
                                    <p class="xl fw-bold">CME 313 - Penatalaksanaan Hipertensi Emergensi ( 2 SKP IDI )</p>
                                </div>
                                    <p class="lg fw-semibold">Maret 1, 2023</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4  my-3">
                        <div class="luContent">
                            <div class="lcImage">
                                <img src="{{asset('../image/lu-content.png')}}" alt="">
                            </div>
                            <div class="lcText p-3">
                                <div class="ltHeader d-flex justify-content-between mb-2">
                                    <p class="lg fw-semibold">Webinar</p>
                                    <p class="lg fw-bold">Free</p>
                                </div>
                                <div class="ltTitle mb-2">
                                    <p class="xl fw-bold">CME 313 - Penatalaksanaan Hipertensi Emergensi ( 2 SKP IDI )</p>
                                </div>
                                    <p class="lg fw-semibold">Maret 1, 2023</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4  my-3">
                        <div class="luContent">
                            <div class="lcImage">
                                <img src="{{asset('../image/lu-content.png')}}" alt="">
                            </div>
                            <div class="lcText p-3">
                                <div class="ltHeader d-flex justify-content-between mb-2">
                                    <p class="lg fw-semibold">Webinar</p>
                                    <p class="lg fw-bold">Free</p>
                                </div>
                                <div class="ltTitle mb-2">
                                    <p class="xl fw-bold">CME 313 - Penatalaksanaan Hipertensi Emergensi ( 2 SKP IDI )</p>
                                </div>
                                    <p class="lg fw-semibold">Maret 1, 2023</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
