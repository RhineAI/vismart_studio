@extends('layouts.main')

@section('content')

<section class="header">
    <div class="container">
        <div class="row text-center align-items-center justify-content-center" style="min-height: 100vh">
            <div class="col-12">
                <img src="/img/logo vismart studio.png" class="card-img-top" alt="..." style="width: 200px">
                <h1 class="mt-5 mb-3 fw-bold">Now Managing Instagram Business is Easier Without Having a Team, Thinking About Content and Design</h1>
                <p class="fs-4 mb-5">We've Experience about Creative Content, Viral Content & Brand Hacking!</p>
                <a href="#page-1"><button type="button" class="btn-border-primary btn rounded-pill border-3 p-3 px-5">REACH US!</button></a>
            </div>
        </div>
    </div>
</section>

<section class="page-1" id="page-1">
    <div class="container">
        <div class="row align-items-center justify-content-center py-5" style="min-height: 100vh">
            <div class="col-lg-6 p-5 order-md-last aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
                <img src="/img/smm/smm.png" class="img-fluid" alt="..." style="width: 40em">
            </div>
            <div class="col-lg-6 p-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease">
                <h2 class="fw-bold">Apa itu Social Media Management?</h2><br>
                <p class="fs-4">Pada intinya, social media management adalah penggunaan berbagai tools, software maupun layanan yang mampu membantu para pebisnis dalam membagikan konten bisnisnya di media sosial.</p>
                <p class="fs-4">Beberapa hal yang bisa dikategorikan dalam kegiatan social media management adalah menjadwalkan waktu posting di media sosial, melakukan interaksi dengan target audience, sampai mengelola respon di media sosial secara cepat.</p><br>
                <a href="#column-3"><button type="button" class="btn-white btn rounded-pill border-3 p-3 px-5">NEXT</button></a>
            </div>
        </div>
    </div>
</section>

<section class="column-3" id="column-3">
    <div class="container">
        <div class="row justify-content-around text-center" style="min-height: 100vh">
            <h1 class="fw-bold my-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease">Mengapa Anda Harus Menggunakan Jasa Social Media Management dari Vismart Studio</h1>
            <div class="col-lg-4 col-md-6 p-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
                <img src="/img/smm/Content Idea.png" class="img-fluid mb-3" alt="..." style="width: 15em">
                <h4 class="fw-bold">Content Idea</h4>
                <p class="text-black-50">Berbagai Ide Konten Interaktif dan Edukasi yang dapat meningkatkan brand awareness</p>
            </div>
            <div class="col-lg-4 col-md-6 p-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
                <img src="/img/smm/Content Design.png" class="img-fluid mb-3" alt="..." style="width: 15em">
                <h4 class="fw-bold">Content Design</h4>
                <p class="text-black-50">Konten divisualisasikan dalam bentuk desain kreatif oleh desainer grafis profesional</p>
            </div>
            <div class="col-lg-4 col-md-6 p-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
                <img src="/img/smm/Copywriting.png" class="img-fluid mb-3" alt="..." style="width: 15em">
                <h4 class="fw-bold">Copywriting</h4>
                <p class="text-black-50">Teknik copywriting persuasif dan kuat yang disesuaikan dengan target pasar Anda</p>
            </div>
            <div class="col-lg-4 col-md-6 p-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
                <img src="/img/smm/Hashtag Research.png" class="img-fluid mb-3" alt="..." style="width: 15em">
                <h4 class="fw-bold">Hashtag Research</h4>
                <p class="text-black-50">Mengoptimalkan copywriting dengan hashtag yang relevan dan populer sesuai bisnis agar mudah ditemukan audiens</p>
            </div>
            <div class="col-lg-4 col-md-6 p-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
                <img src="/img/smm/Schedule Post.png" class="img-fluid mb-3" alt="..." style="width: 15em">
                <h4 class="fw-bold">Schedule Post</h4>
                <p class="text-black-50">Jadwalkan postingan sesuai prime time Instagram Business secara konsisten</p>
            </div>
            <div class="col-lg-4 col-md-6 p-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
                <img src="/img/smm/Private Zoom Video.png" class="img-fluid mb-3" alt="..." style="width: 15em">
                <h4 class="fw-bold">Private  Zoom Video</h4>
                <p class="text-black-50">Dalam private zoom Anda dapat bertanya apa saja tentang pemasaran, branding, kampanye, dll</p>
            </div>
        </div>
    </div>
</section>

<section class="portofolio" id="portofolio">
    <div class="container">
        <div class="row justify-content-center text-center">
            <h1 class="fw-bold my-5 aos-init aos-animate" data-aos="fade-up">Portofolio Vismart Studio</h1>
            <div class="col-12 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
                <div class="owl-carousel owl-images owl-theme">

                @foreach ($portofolios as $portofolio)
                <div class="item mx-3 my-5">
                  <a href="{{ asset('storage/' . $portofolio->image) }}" data-lightbox="roadtrip" data-title="{{ $portofolio->title }}"><img src="{{ asset('storage/' . $portofolio->image) }}" alt="{{ $portofolio->title }}"></a>
                </div>
                @endforeach

                </div>
            </div>
        </div>
    </div>
  </section>

<section class="contact" id="contact">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center" style="min-height: 100vh">
            <div class="col-lg-10">
                <h1 class="fw-bold my-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease">Konsul yuk terkait bisnis dan branding dari produk kamu!</h1>
                <p class="fs-4 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">Manto Mukhli Fardi</p>
                <p class="fs-4 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">0812 3456 7890</p>
                <a href="https://wa.wizard.id/109912" target="_blank"><button type="button" class="btn-white btn rounded-pill border-3 p-3 px-5 mt-3 mb-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="200">Chat Sekarang!</button></a>
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
            nav:false,
            autoplay:true,
            autoplayTimeout:4000,
            autoplayHoverPause:true,
            center:true,
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

        lightbox.option({
            resizeDuration: 200,
            wrapAround: true,
            showImageNumberLabel: false
        })

    </script>

@endpush