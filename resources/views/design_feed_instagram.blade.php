@extends('layouts.main')

@section('content')

<header class="header aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
    @include('partials.navpage')
</header>

@if($setting->is_landing_page == 1)
<section class="header">
    <div class="container">
        <div class="row text-center align-items-center justify-content-center" style="min-height: 100vh">
            <div class="col-10">
                <img src="/img/logo vismart studio.png" class="img-fluid aos-init aos-animate" data-aos="zoom-in" alt="..." style="width: 20em;">
                <h1 class="fw-bold my-5 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">Now Managing Instagram Business is Easier Without Having a Team, Thinking About Content and Design</h1>
                <a href="#page-1"><button type="button" class="btn-primary btn rounded-pill p-3 px-5 fs-4 fw-bold aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">REACH US!</button></a>
            </div>
        </div>
    </div>
</section>
@endif

@if ($setting->is_info == 1)
    <section class="page-1" id="page-1">
        <div class="container">
            <div class="row align-items-center justify-content-center py-5" style="min-height: 100vh">
                <div class="col-lg-6 d-flex justify-content-center align-items-center p-5 order-md-last aos-init aos-animate" data-aos="fade-left" data-aos-easing="ease" data-aos-delay="100">
                    <img src="{{ asset('storage/'. $detail->image) }}" class="img-fluid" alt="..." style="width: 40em">
                </div>
                <div class="col-lg-6 p-5">
                    <h1 class="fw-bold aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease">{{ $question }}</h1><br>
                    <div class="fs-4 aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="100">{!! $answer !!}</div>               
                        
                    <a href="#page-2"><button type="button" class="btn-white btn rounded-pill p-3 px-5 fs-5 fw-bold aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">NEXT</button></a>
                </div>
            </div>
        </div>
    </section>
@endif

<section class="page-2" id="page-2">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center" style="min-height: 100vh">
            <h1 class="fw-bold my-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease">Apa yang bisa Kami lakukan untuk Bisnismu</h1>
            <div class="col-12">
            
            <div class="row my-5" id="1">
                <div class="col-lg-6 p-5 d-flex justify-content-center align-items-center order-md-last aos-init aos-animate" data-aos="fade-left" data-aos-easing="ease" data-aos-delay="100">
                    <img src="/img/design_feed_instagram/profesional.png" class="img-fluid" alt="..." style="width: 25em">
                </div>
                <div class="col-lg-6 p-5 text-start">
                    <h2 class="fw-bold aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease">Membuat Desain yang Profesional</h2><br>
                    <ul class="text-black-50 aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="100">
                        <li class="fs-4">Design dibuat Manual, No Template dengan menggunakan Software Design Profesional (Photoshop, Ilustrator, Corel, dan Figma).</li>
                        <li class="fs-4">Dikerjakan oleh Tim Profesional.</li>
                        <li class="fs-4">100% Konsep bisa dibantu oleh Tim Vismart Studio.</li>
                    </ul><br>
                    <a href="#2"><button type="button" class="btn-primary btn rounded-pill p-3 px-5 fs-5 fw-bold aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">NEXT</button></a>
                </div>
            </div>

            <div class="row my-5" id="2">
                <div class="col-lg-6 p-5 d-flex justify-content-center align-items-center p-5 aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="100">
                    <img src="/img/design_feed_instagram/riset.png" class="img-fluid" alt="..." style="width: 25em">
                </div>
                <div class="col-lg-6 p-5 text-start">
                    <h2 class="fw-bold aos-init aos-animate" data-aos="fade-left" data-aos-easing="ease">Content dibuat dengan Profesional</h2><br>
                    <ul class="text-black-50 aos-init aos-animate" data-aos="fade-left" data-aos-easing="ease" data-aos-delay="100">
                        <li class="fs-4">Team Content Planner Vismart Studio sudah dilatih dalam membuat konten yang profesional untuk semua client.</li>
                        <li class="fs-4">Konten dibuat dengan tujuan agar bisa mendatangkan sales & meningkatkan interaksi.</li>
                        <li class="fs-4">Team Content Planner akan memberikan Preview Content kepada Client setelah full membuat Plannernya.</li>
                    </ul><br>
                    <a href="#3"><button type="button" class="btn-primary btn rounded-pill p-3 px-5 fs-5 fw-bold aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">NEXT</button></a>
                </div>
            </div>

            <div class="row my-5" id="3">
                <div class="col-lg-6 p-5 d-flex justify-content-center align-items-center p-5 order-md-last aos-init aos-animate" data-aos="fade-left" data-aos-easing="ease" data-aos-delay="100">
                    <img src="/img/design_feed_instagram/request1.png" class="img-fluid" alt="..." style="width: 25em">
                </div>
                <div class="col-lg-6 p-5 text-start">
                    <h2 class="fw-bold aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease">Client Bebas Request Apapun</h2><br>
                    <ul class="text-black-50 aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="100">
                        <li class="fs-4">Client boleh request agar di semua konten ada Logo Brand Client.</li>
                        <li class="fs-4">Client boleh request Visual & Layoutnya sesuai dengan Referensi yang Client inginkan.</li>
                        <li class="fs-4">Client boleh request jika ada goal-goal khusus untuk kontennya.</li>
                    </ul><br>
                    <a href="#4"><button type="button" class="btn-primary btn rounded-pill p-3 px-5 fs-5 fw-bold aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">NEXT</button></a>
                </div>
            </div>

            <div class="row my-5" id="4">
                <div class="col-lg-6 p-5 d-flex justify-content-center align-items-center p-5 aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="100">
                    <img src="/img/design_feed_instagram/sosmed.png" class="img-fluid" alt="..." style="width: 25em">
                </div>
                <div class="col-lg-6 p-5 text-start" data-aos="fade-left" data-aos-easing="ease">
                    <h2 class="fw-bold aos-init aos-animate" data-aos="fade-left" data-aos-easing="ease">Desain bisa digunakan ke Platform lain</h2><br>
                    <ul class="text-black-50 aos-init aos-animate" data-aos="fade-left" data-aos-easing="ease" data-aos-delay="100">
                        <li class="fs-4">Iklan IG Ads & FB Ads.</li>
                        <li class="fs-4">Untuk diberikan ke Agen, Distributor, Reseller Anda.</li>
                        <li class="fs-4">Untuk Anda posting ke WA Story, FB personal, dll.</li>
                        <li class="fs-4">Untuk Anda jadikan konten di Marketplace.</li>
                    </ul><br>
                    <a href="#5"><button type="button" class="btn-primary btn rounded-pill p-3 px-5 fs-5 fw-bold aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">NEXT</button></a>
                </div>
            </div>

            <div class="row my-5" id="5">
                <div class="col-lg-6 p-5 d-flex justify-content-center align-items-center p-5 order-md-last aos-init aos-animate" data-aos="fade-left" data-aos-easing="ease" data-aos-delay="100">
                    <img src="/img/design_feed_instagram/happy.png" class="img-fluid" alt="..." style="width: 25em">
                </div>
                <div class="col-lg-6 p-5 text-start">
                    <h2 class="fw-bold aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease">Keuntungan lain yang Client dapatkan</h2><br>
                    <ul class="text-black-50 aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="100">
                        <li class="fs-4">Harga yang Super Terjangkau. Seluruh Paket Vismart Studio dibuat KHUSUS untuk UMKM di Indonesia, sehingga Harga yang Vismart Studio hadirkan juga sangat terjangkau di Kantong para UMKM yang ada.</li>
                        <li class="fs-4">FREE Revisi Desain. Jika ada kesalahan / ada yang tidak sesuai dengan brief yang sudah Anda berikan, Anda bisa mengajukan revisi untuk Project Anda.</li>
                    </ul><br>
                    <a href="#column-3"><button type="button" class="btn-primary btn rounded-pill p-3 px-5 fs-5 fw-bold aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">NEXT</button></a>
                </div>
            </div>
        
        </div>

        </div>
    </div>
</section>

@if(!$detail->advantage->isEmpty())

<section class="column-3" id="column-3">
  <div class="container">
      <div class="row justify-content-around text-center">
          <h1 class="fw-bold my-5 px-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease">Alasan Anda Harus Menggunakan Jasa {{ $title }} dari Kami</h1>
          @foreach ($detail->advantage as $item)      
          <div class="col-lg-4 col-md-6 p-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
              <img src="{{ asset('storage/'. $item->image) }}" class="img-fluid mb-3" alt="..." style="width: 5em">
              <h4 class="fw-bold">{{ $item->advantage }}</h4>
              <p class="text-black-50">{{ $item->description }}</p>
              <p class="text-black-50"></p>
            </div>
          @endforeach
      </div>
  </div>
</section>

@elseif(!$detail->advantage->isNotEmpty())
<section>
</section>
@endif


@if(!$detail->jasa->isEmpty())

<section class="column-3" id="column-3">
    <div class="container">
        <div class="row justify-content-center text-center" style="min-height: 100vh">
            <h1 class="fw-bold my-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease">Layanan Jasa {{ $title }}</h1>
            @foreach ( $detail->jasa as $item )
            <div class="col-lg-4 col-md-6 p-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
              <img src="{{ asset('storage/'. $item->image) }}" class="img-fluid rounded-start mb-3" alt="Logo UMKM" style="width: 15em">
              <h4 class="fw-bold">{{ $item->title }}</h4>
              <p class="text-black-50">{{ $item->description }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

@elseif(!$detail->advantage->isNotEmpty())
<section>
</section>
@endif

<section class="portofolio" id="portofolio">
    <div class="container">
        <div class="row justify-content-center text-center">
            <h1 class="fw-bold my-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease">Portofolio Vismart Studio</h1>
            <div class="col-12 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
                <div class="owl-carousel owl-images owl-theme">
  
                  @foreach ($portofolio as $p)
                  <div class="item mx-3 my-5">
                    <a href="{{ asset('storage/' . $p->img) }}" data-lightbox="roadtrip" data-title="{{ $p->title }}"><img src="{{ asset('storage/' . $p->img) }}" alt="{{ $p->title }}"></a>
                  </div>
                  @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</section>
  
<section class="testimonial" id="testimonial">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-10 aos-init aos-animate" data-aos="fade-up">
            <div class="owl-carousel owl-text owl-theme">
  
              @foreach ($testimonial as $t)
                <div class="item">
                  <h1 class="fw-bold mb-4">" {{ $t->description }} "</h1>
                  <h4 class="fw-bold">{{ $t->name }}</h4>
                </div>
              @endforeach
                
            </div>
          </div>
        </div>
    </div>
</section>


@if(!$detail->package->isEmpty())
  
<section class="pricing" id="pricing">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center" style="min-height: 100vh">
            <h1 class="fw-bold my-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease">Pilih Paket</h1>
            @foreach ($detail->package as $item)
                @if ($item->is_first == 1)
                <div class="col-lg-4 aos-init  aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
                    <div class="card mb-4 py-5"  style="color: #fff; background-color: var(--primary-color);">
                        <h4 class="fw-bold mt-3">{{ $item->name }}</h4>
                        <div class="card-body">
                            <span class="h2 fw-bold">IDR {{ floatval($item->price) / 1000 }} k </span>/ Month
                                <ul class="list-group list-group-flush fa-ul text-start p-3 mb-3">
                                    @foreach ($item->feature as $feature)
                                        <li class="list-group-item" style="color:#fff; background-color: var(--primary-color); "><i class="fa-solid fa-check fa-li"></i>{{ $feature->feature }}</li>
                                    @endforeach
                                </ul>
                            <a href="{{ $item->link }}" target="_blank"><button type="button" class="btn-white btn rounded-pill p-3 px-5 fs-5 fw-bold">Beli Sekarang! <p style="margin-top: -17px"></p> </button></a>
                        </div>
                    </div>
                </div> 
                @else
                <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="200">
                    <div class="card mb-4 py-3">
                        <h4 class="fw-bold mt-3">{{ $item->name }}</h4>
                        <div class="card-body">
                            <span class="h2 fw-bold">IDR {{ floatval($item->price) / 1000 }} k </span>/ Month
                            <ul class="list-group list-group-flush fa-ul text-start p-3 mb-3">
                                @foreach ($item->feature as $feature)
                                    <li class="list-group-item"><i class="fa-solid fa-check fa-li"></i>{{ $feature->feature }}</li>
                                @endforeach
                            </ul>
                            <a href="{{ $item->link }}" target="_blank"><button type="button" class="btn-primary btn rounded-pill p-3 px-5 fs-5 fw-bold">Beli Sekarang! <p style="margin-top: -17px"></p>  </button></a>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

@elseif(!$detail->package->isNotEmpty())
<section>
</section>
@endif

<section class="contact" id="contact">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center" style="min-height: 100vh">
            <div class="col-lg-8 aos-init aos-animate">
                <h1 class="fw-bold my-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease">Konsul yuk terkait bisnis dan branding dari produk kamu!</h1>
                <p class="fs-4 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">Vismart Studio</p>
                <p class="fs-4 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">0878 3637 0765</p>
                <a href="https://wa.wizard.id/d53b5b" target="_blank"><button type="button" class="btn-white btn rounded-pill p-3 px-5 mt-3 mb-5 fs-5 fw-bold aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">Chat Sekarang!</button></a>
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

        $(".owl-text").owlCarousel({
            loop:true,
            margin:30,
            nav:true,
            autoplay:true,
            autoplayTimeout:4000,
            autoplayHoverPause:true,
            navText:[
                "<i class='fa fa-angle-left'></i>",
                "<i class='fa fa-angle-right'></i>"
            ],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        })

        lightbox.option({
            resizeDuration: 200,
            wrapAround: true,
            showImageNumberLabel: false
        })

        $(function () {
            $(window).on('scroll', function () {
                if ( $(window).scrollTop() > 10 ) {
                    $('.nav-page').addClass('active');
                } else {
                    $('.nav-page').removeClass('active');
                }
            });
        });

    </script>

@endpush