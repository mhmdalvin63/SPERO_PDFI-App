@extends('mainFE')
@section('judul_tab','Detail Update PDFI')

@section('content')
<link rel="stylesheet" href=" {{ asset('../css/page/detailUpdate.css')}}">

<div class="berandaPage" style="transform: translateY(5.75rem)">
    <div class="header">
        <img class="headerImage" src="{{asset('../image/daBanner.png')}}" alt="">
    </div>

    <div class="container my-5">
        <div class="row justify-content-between">
            <div class="col-lg-8 col-md-7 col-sm-7">
                <div class="daTitle mb-5">
                    <h3 class="fw-bold">CME 313 - Penatalaksanaan Hipertensi Emergensi
                        ( 2 SKP IDI )</h3>
                    <p class="fw-semibold">Upload On 17 March 2023</p>
                </div>
                <div class="daDesc my-3">
                    <p class="md fw-semibold text-justify">Lorem ipsum dolor sit amet consectetur. Odio tincidunt justo a id vitae. At aliquet posuere vitae volutpat iaculis. Ac et sagittis et pellentesque egestas sodales elementum pharetra facilisis. Lorem posuere a cras tortor aenean eu pulvinar posuere consequat. In eget dignissim morbi id volutpat sapien. Nam ante sit purus sed. 
        
                        Tristique lobortis aliquet mattis faucibus. Scelerisque consectetur non leo feugiat ultricies egestas id praesent.
                        Placerat sed aliquet orci platea etiam nulla. Accumsan consectetur mauris nec et odio lectus nulla. Sagittis in ipsum faucibus ut ante in a cum porta. Donec cras odio sed ut. Aliquam accumsan auctor ut vulputate eget sem leo. Morbi fringilla ultrices urna odio cursus. Erat pellentesque ornare eu risus vitae.
                    </p>
                </div>
                <div class="interactiveIcon d-flex gap-4 my-3">
                    <a href=""><i class="fa-solid fa-share-nodes fa-xl"></i></a>
                    <a href=""><i class="fa-solid fa-thumbs-up fa-xl"></i></a>
                </div>
                <div class="hastag d-flex flex-wrap gap-2">
                    <a href=""><p class="xl">#loremipsum</p></a>
                    <a href=""><p class="xl">#loremipsum</p></a>
                    <a href=""><p class="xl">#loremipsum</p></a>
                    <a href=""><p class="xl">#loremipsum</p></a>
                    <a href=""><p class="xl">#loremipsum</p></a>
                    <a href=""><p class="xl">#loremipsum</p></a>
                    <a href=""><p class="xl">#loremipsum</p></a>
                    <a href=""><p class="xl">#loremipsum</p></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-8 mt-sm-0 mt-4 p-3" id="artikelTerkait">
                <h3 class="fw-bold">Artikel Terkait</h3>
                <div class="artikelTerkait">
                    <div class="hr"></div>
                    <div class="atContent">
                        <p>Update on 17 March 2023</p>
                        <p class="md fw-bold">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <a href=""><p>Read Article</p></a>
                    </div>
                </div>
                <div class="artikelTerkait">
                    <div class="hr"></div>
                    <div class="atContent">
                        <p>Update on 17 March 2023</p>
                        <p class="md fw-bold">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <a href=""><p>Read Article</p></a>
                    </div>
                </div>
                <div class="artikelTerkait">
                    <div class="hr"></div>
                    <div class="atContent">
                        <p>Update on 17 March 2023</p>
                        <p class="md fw-bold">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <a href=""><p>Read Article</p></a>
                    </div>
                </div>
                <div class="artikelTerkait">
                    <div class="hr"></div>
                    <div class="atContent">
                        <p>Update on 17 March 2023</p>
                        <p class="md fw-bold">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <a href=""><p>Read Article</p></a>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="listUpdate mt-5">
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
        </div> --}}
    </div>
</div>
@endsection
