@extends('layouts.main')

@section('content')

<header class="navpage aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
    <nav class="navbar nav-page navbar-expand-lg fixed-top py-3">
        <div class="container"><a href="#" class="navbar-brand text-uppercase font-weight-bold"><img src="/img/logo vismart studio.png" class="img-fluid" alt="..." style="width: 5em;"></a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
            
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item ms-2"><a href="/" class="nav-link text-uppercase font-weight-bold">Home</a></li>
                    <li class="nav-item ms-2"><a href="#portofolio" class="nav-link text-uppercase font-weight-bold">Portofolio</a></li>
                    <li class="nav-item ms-2"><a href="#contact" class="nav-link text-uppercase font-weight-bold">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

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
            <h1 class="fw-bold my-5 aos-init aos-animate" data-aos="fade-up">Mengapa Marketing Communications Itu Penting?</h1>
            <div class="col-12">
            
            <div class="row my-5" id="1">
                <div class="col-lg-6 p-5 order-md-last aos-init aos-animate" data-aos="fade-left" data-aos-easing="ease" data-aos-delay="100">
                    <img src="/img/marketing_communications/Cohort analysis-amico.png" class="img-fluid" alt="..." style="width: 25em">
                </div>
                <div class="col-lg-6 p-5 text-start">
                    <h2 class="fw-bold aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease">Membentuk Brand Awareness</h2><br>
                    <p class="fs-4 text-black-50 aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="100">Marketing communication berfungsi penting untuk membentuk brand awareness di kalangan masyarakat. Tak peduli perusahaan lama atau baru, brand awareness perlu dibangun agar suatu produk atau layanan lebih dikenal eksistensinya.</p><br>
                    <a href="#2"><button type="button" class="btn-primary btn rounded-pill p-3 px-5 fs-5 fw-bold aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">NEXT</button></a>
                </div>
            </div>

            <div class="row my-5" id="2">
                <div class="col-lg-6 p-5 aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="100">
                    <img src="/img/marketing_communications/Customer Survey-amico.png" class="img-fluid" alt="..." style="width: 25em">
                </div>
                <div class="col-lg-6 p-5 text-start">
                    <h2 class="fw-bold  aos-init aos-animate" data-aos="fade-left" data-aos-easing="ease">Mengubah Citra Perusahaan</h2><br>
                    <p class="fs-4 text-black-50 aos-init aos-animate" data-aos="fade-left" data-aos-easing="ease" data-aos-delay="100">Selain itu, marketing communication dapat mengubah pandangan atau persepsi publik terhadap suatu produk/ layanan. Pasalnya, beberapa kesalahpahaman berkenaan tarif, fitur, cara penggunaan dsb dari sebuah produk/ layanan kerap terjadi di kalangan masyarakat.</p><br>
                    <a href="#3"><button type="button" class="btn-primary btn rounded-pill p-3 px-5 fs-5 fw-bold aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">NEXT</button></a>
                </div>
            </div>

            <div class="row my-5" id="3">
                <div class="col-lg-6 p-5 order-md-last aos-init aos-animate" data-aos="fade-left" data-aos-easing="ease" data-aos-delay="100">
                    <img src="/img/marketing_communications/Email capture-amico.png" class="img-fluid" alt="..." style="width: 25em">
                </div>
                <div class="col-lg-6 p-5 text-start">
                    <h2 class="fw-bold aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease">Membujuk Konsumen</h2><br>
                    <p class="fs-4 text-black-50 aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="100">Selanjutnya, marketing communication juga berguna untuk memotivasi konsumen agar datang lagi/ menggunakan kembali, serta melakukan pembelian berulang di kemudian hari.</p>
                    <p class="fs-4 text-black-50  aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="100">Langkah ini dapat diterapkan dengan cara membuat iklan yang membujuk, dengan menggarisbawahi apa saja manfaat dan keunggulan dari penggunaan sebuah produk atau layanan jasa daripada yang ditawarkan pesaing lainnya.</p><br>
                    <a href="#2"><button type="button" class="btn-primary btn rounded-pill p-3 px-5 fs-5 fw-bold aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">NEXT</button></a>
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

@elseif(!$detail->jasa->isNotEmpty())
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
                    <a href="{{ asset('storage/'. $p->img) }}" data-lightbox="roadtrip" data-title="{{ $p->title }}"><img src="{{ asset('storage/' . $p->img) }}" alt="{{ $p->title }}"></a>
                  </div>
                  @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</section>


@if(!$detail->package->isEmpty())

<section class="pricing">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center" style="min-height: 100vh">
            {{-- <h1 class="fw-bold my-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease">Pilih Paket</h1> --}}
                <h1 class="fw-bold my-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease">Pilih Paket</h1>
            {{-- @elseif (!empty($detail->package)) --}}
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
                                <a href="https://wa.wizard.id/4349a1" target="_blank"><button type="button" class="btn-white btn rounded-pill p-3 px-5 fs-5 fw-bold">Beli Sekarang! <p style="margin-top: -17px"></p> </button></a>
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
                                <a href="https://wa.wizard.id/5e107e" target="_blank"><button type="button" class="btn-primary btn rounded-pill p-3 px-5 fs-5 fw-bold">Beli Sekarang! <p style="margin-top: -17px"></p>  </button></a>
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
                <p class="fs-4 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">Manto Mukhli Fardi</p>
                <p class="fs-4 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">0812 3456 7890</p>
                <a href="https://wa.wizard.id/3596f7" target="_blank"><button type="button" class="btn-white btn rounded-pill p-3 px-5 mt-3 mb-5 fs-5 fw-bold aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">Chat Sekarang!</button></a>
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