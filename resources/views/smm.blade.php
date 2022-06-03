@extends('layouts.main')

@section('content')

<section class="header">
    <div class="container">
        <div class="row text-center align-items-center justify-content-center" style="min-height: 100vh">
            <div class="col-10">
                <img src="/img/logo vismart studio.png" class="card-img-top" alt="..." style="width: 200px">
                <h2 class="mt-5 mb-3 fw-bold">Now Managing Instagram Business is Easier Without Having a Team, Thinking About Content and Design</h2>
                <p class="fs-4 mb-5">We've Experience about Creative Content, Viral Content & Brand Hacking!</p>
                <a href="#page-1"><button type="button" class="btn-border-primary btn rounded-pill border-3 p-3 px-5">REACH US!</button></a>
            </div>
        </div>
    </div>
</section>

<section class="page-1" id="page-1">
    <div class="container">
        <div class="row align-items-center justify-content-center py-5" style="min-height: 100vh; margin-bottom: 10em;">
            <div class="col-lg-6 p-5 order-md-last">
                <img src="/img/Digital Marketing.png" class="img-fluid" alt="..." style="width: 40em">
            </div>
            <div class="col-lg-6 p-5">
                <h2 class="fw-bold">Apa itu Social Media Management?</h2><br>
                <p class="fs-4">Pada intinya, social media management adalah penggunaan berbagai tools, software maupun layanan yang mampu membantu para pebisnis dalam membagikan konten bisnisnya di media sosial.</p>
                <p class="fs-4">Beberapa hal yang bisa dikategorikan dalam kegiatan social media management adalah menjadwalkan waktu posting di media sosial, melakukan interaksi dengan target audience, sampai mengelola respon di media sosial secara cepat.</p><br>
                <a href="#page-2"><button type="button" class="btn-white btn rounded-pill border-3 p-3 px-5">NEXT</button></a>
            </div>
        </div>
    </div>
</section>

<section class="column-3" id="column-3">
    <div class="container">
        <div class="row justify-content-around text-center" style="min-height: 100vh">
            <h1 class="fw-bold my-5">Why Must Social Media Management By Vismart Studio</h1>
            <div class="col-lg-4 col-md-6 p-5">
                <img src="/img/Content Idea.png" class="img-fluid mb-3" alt="..." style="width: 15em">
                <h4 class="fw-bold">Content Idea</h4>
                <p class="text-black-50">Various Interactive and Educational Content Ideas that can increase brand awareness</p>
            </div>
            <div class="col-lg-4 col-md-6 p-5">
                <img src="/img/Content Design.png" class="img-fluid mb-3" alt="..." style="width: 15em">
                <h4 class="fw-bold">Content Design</h4>
                <p class="text-black-50">Content visualized in the form of creative designs by professional graphic designers</p>
            </div>
            <div class="col-lg-4 col-md-6 p-5">
                <img src="/img/Copywriting.png" class="img-fluid mb-3" alt="..." style="width: 15em">
                <h4 class="fw-bold">Copywriting</h4>
                <p class="text-black-50">Persuasive and powerful copywriting techniques tailored to your target market</p>
            </div>
            <div class="col-lg-4 col-md-6 p-5">
                <img src="/img/Hashtag Research.png" class="img-fluid mb-3" alt="..." style="width: 15em">
                <h4 class="fw-bold">Hashtag Research</h4>
                <p class="text-black-50">Optimizing copywriting with relevant and popular hashtags according to the business to make it easy for the audience to find</p>
            </div>
            <div class="col-lg-4 col-md-6 p-5">
                <img src="/img/Schedule Post.png" class="img-fluid mb-3" alt="..." style="width: 15em">
                <h4 class="fw-bold">Schedule Post</h4>
                <p class="text-black-50">Schedule posts according to Instagram Business prime time consistently</p>
            </div>
            <div class="col-lg-4 col-md-6 p-5">
                <img src="/img/Private Zoom Video.png" class="img-fluid mb-3" alt="..." style="width: 15em">
                <h4 class="fw-bold">Private  Zoom Video</h4>
                <p class="text-black-50">In private zoom you can ask anything about marketing, branding, campaigns, etc..</p>
            </div>
        </div>
    </div>
</section>

<section class="page-5" id="page-5">
    <div class="container text-center">
        <div class="row justify-content-center text-center">
            <h1 class="fw-bold my-5">Portofolio Vismart Studio</h1>
            <div class="col-11">
                <div class="owl-carousel owl-images owl-theme">
                    <div class="item mx-3 my-5"><img src="img/klinik arrahman.jpg" alt=""></div>
                    <div class="item mx-3 my-5"><img src="img/klinik marhamah.jpg" alt=""></div>
                    <div class="item mx-3 my-5"><img src="img/klinik keluarga.jpg" alt=""></div>
                    <div class="item mx-3 my-5"><img src="img/medisy.jpg" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-4" id="page-4">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center" style="min-height: 100vh">
            <div class="col-lg-10">
                <h1 class="fw-bold my-5">Saatnya menumbuhkan Bisnismu dengan Konten-konten yang lebih Menjual & Profesional</h1>
                <p class="fs-4">Manto Mukhli Fardi</p>
                <p class="fs-4">0812 3456 7890</p>
                <a href=""><button type="button" class="btn-white btn rounded-pill border-3 p-3 px-5 mt-3 mb-5">Chat Sekarang!</button></a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    <script>
        $(".owl-images").owlCarousel({
            loop:true,
            margin:30,
            nav:true,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,

            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        })

    </script>
@endpush