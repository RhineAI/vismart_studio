@extends('layouts.main')

@section('content')

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

<section class="page-1" id="page-1">
    <div class="container">
        <div class="row align-items-center justify-content-center py-5" style="min-height: 100vh">
            <div class="col-lg-6 d-flex justify-content-center align-items-center p-5 order-md-last aos-init aos-animate" data-aos="fade-left" data-aos-easing="ease" data-aos-delay="100">
                <img src="/img/logo_branding/logo branding.png" class="img-fluid" alt="..." style="width: 40em">
            </div>
            <div class="col-lg-6 p-5">
                <h1 class="fw-bold aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease">Mengapa Harus Memiliki Logo?</h1><br>
                <p class="fs-4 aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="100">Tahukah Anda, logo merupakan unsur yang paling penting bagi sebuah perusahaan.</p>
                <p class="fs-4 aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="100">Sebab, umumnya manusia itu akan cenderung lebih mudah untuk mengingat sesuatu secara
                    visual. Sehingga, desain logo yang memikat tentu akan sangat mendukung brand bisnis dalam menarik
                    minat konsumen.</p>
                <p class="fs-4 aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="100">Jadi tunggu apalagi? Yuk segera pesan desain logo untuk perusahaan kamu kepada ahlinya.</p><br>
                <a href="#column-3"><button type="button" class="btn-white btn rounded-pill p-3 px-5 fs-5 fw-bold aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">NEXT</button></a>
            </div>
        </div>
    </div>
</section>

<section class="column-3" id="column-3">
  <div class="container">
      <div class="row justify-content-around text-center">
          <h1 class="fw-bold my-5 px-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease">Alasan Anda Harus Menggunakan Jasa Logo dan Branding dari Kami</h1>
          @foreach ($details->advantage as $item)      
          <div class="col-lg-4 col-md-6 p-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
              <img src="{{ asset('storage/'. $item->image) }}" class="img-fluid mb-3" alt="..." style="width: 5em">
              <h4 class="fw-bold">{{ $item->advantage }}</h4>
              <p class="text-black-50"></p>
            </div>
          @endforeach
          {{-- <div class="col-lg-4 col-md-6 p-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
              <img src="/img/logo_branding/file master.png" class="img-fluid mb-3" alt="..." style="width: 5em">
              <h4 class="fw-bold">File Master</h4>
              <p class="text-black-50">File master edit table diberikan untuk mempermudah klien mencetak dan memperbaiki file.</p>
          </div>
          <div class="col-lg-4 col-md-6 p-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
              <img src="/img/logo_branding/konsultasi.png" class="img-fluid mb-3" alt="..." style="width: 5em">
              <h4 class="fw-bold">Konsultasi</h4>
              <p class="text-black-50">Anda bebas konsultasi dengan <br> tim kami agar tim kami memahami kebutuhan anda.</p>
          </div> --}}
      </div>
  </div>
</section>

<section class="column-3" id="column-3">
  <div class="container">
      <div class="row justify-content-center text-center" style="min-height: 100vh">
          <h1 class="fw-bold my-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease">Layanan Jasa Desain Logo</h1>
          @foreach ( $details->jasa as $item )
          <div class="col-lg-4 col-md-6 p-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
            <img src="{{ asset('storage/'. $item->image) }}" class="img-fluid rounded-start mb-3" alt="Logo UMKM" style="width: 15em">
            <h4 class="fw-bold">{{ $item->title }}</h4>
            <p class="text-black-50">{{ $item->description }}</p>
          </div>
          @endforeach
          {{-- <div class="col-lg-4 col-md-6 p-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
              <img src="/img/logo_branding/logo website.png" class="img-fluid rounded-start mb-3" alt="Logo Web" style="width: 15em">
              <h4 class="fw-bold">Logo Web</h4>
              <p class="text-black-50">Logo dari web itu sendiri penting, menggambarkan produk yang anda produksi.</p>
          </div>
          <div class="col-lg-4 col-md-6 p-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
              <img src="/img/logo_branding/logo online shop.png" class="img-fluid rounded-start mb-3" alt="Logo Online Shop" style="width: 15em">
              <h4 class="fw-bold">Logo Online Shop</h4>
              <p class="text-black-50">Bisnis online shop mulai bangkit, walaupun hanya dropship sudah sepatutnya memiliki logo.</p>
          </div>

          <div class="col-lg-4 col-md-6 p-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
              <img src="/img/logo_branding/logo waralaba.png" class="img-fluid rounded-start mb-3" alt="Logo Waralaba" style="width: 15em">
              <h4 class="fw-bold">Logo Waralaba</h4>
              <p class="text-black-50">Anda pemilik waralaba, logo unik dengan warna yang tegas adalah ciri khas dari branding waralaba.</p>
          </div>
          <div class="col-lg-4 col-md-6 p-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
              <img src="/img/logo_branding/logo company.png" class="img-fluid rounded-start mb-3" alt="Logo Perusahaan" style="width: 15em">
              <h4 class="fw-bold">Logo Perusahaan</h4>
              <p class="text-black-50">Untuk pengajuan legalitas perusahaan, logo adalah salah satu syarat yang harus dimiliki.</p>
          </div>
          <div class="col-lg-4 col-md-6 p-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
              <img src="/img/logo_branding/logo lembaga.png" class="img-fluid rounded-start mb-3" alt="Logo Lembaga" style="width: 15em">
              <h4 class="fw-bold">Logo Lembaga</h4>
              <p class="text-black-50">Dalam sebuah lembaga, logo sering juga disebut sebagai lambang, Vismart Studio menerima jasa pembuatan logo lembaga.</p>
          </div> --}}
      </div>
  </div>
</section>

<section class="portofolio" id="portofolio">
  <div class="container">
      <div class="row justify-content-center text-center">
          <h1 class="fw-bold my-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease">Portofolio Vismart Studio</h1>
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

<section class="testimonial" id="testimonial">
  <div class="container">
      <div class="row align-items-center justify-content-center text-center">
        <div class="col-10 aos-init aos-animate" data-aos="fade-up">
          <div class="owl-carousel owl-text owl-theme">

            @foreach ($testimonials as $testimonial)
              <div class="item">
                <h1 class="fw-bold mb-4">" {{ $testimonial->description }} "</h1>
                <h4 class="fw-bold">{{ $testimonial->name }}</h4>
              </div>
            @endforeach
              
          </div>
        </div>
      </div>
  </div>
</section>

<section class="pricing">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center" style="min-height: 100vh">
            <h1 class="fw-bold my-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease">Pilih Paket</h1>
            @foreach ($details->package as $item)
            <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="200">
                <div class="card mb-4 py-3">
                    <h4 class="fw-bold mt-3">{{ $item->name }}</h4>
                    <div class="card-body">
                        <span class="h2 fw-bold">IDR {{ floatval($item->price) / 1000 }}k </span>/ Month
                            <ul class="list-group list-group-flush fa-ul text-start p-3 mb-3">
                                @foreach ($item->feature as $feature)
                                <li class="list-group-item"><i class="fa-solid fa-check fa-li"></i>{{ $feature->feature }}</li>
                                @endforeach
                                {{-- <li class="list-group-item"><i class="fa-solid fa-check fa-li"></i>Kamu Tinggal Terima Beres Aja!</li>
                                <li class="list-group-item"><i class="fa-solid fa-check fa-li"></i>Posting <b>SETIAP HARI</b> Kec. Hari Libur</li>
                                <li class="list-group-item"><i class="fa-solid fa-check fa-li"></i>Ide Konten & Materi Konten</li>
                                <li class="list-group-item"><i class="fa-solid fa-check fa-li"></i>Copywriting konten & Caption</li>
                                <li class="list-group-item"><i class="fa-solid fa-check fa-li"></i>Hashtag Setiap konten</li>
                                <li class="list-group-item"><i class="fa-solid fa-check fa-li"></i>Bisa kasi konsep / Referensi design</li>
                                <li class="list-group-item"><i class="fa-solid fa-check fa-li"></i>Admin Posting Di IG & Fb</li>
                                <li class="list-group-item"><i class="fa-solid fa-check fa-li"></i>Revisi ( Minor ) 2x / Desain</li> --}}
                            </ul>
                        <a href="https://wa.wizard.id/5e107e" target="_blank"><button type="button" class="btn-primary btn rounded-pill p-3 px-5 fs-5 fw-bold">Beli Sekarang!</button></a>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="col-lg-4 aos-init  aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
                <div class="card mb-4 py-5"  style="color: #fff; background-color: var(--primary-color);">
                    <h4 class="fw-bold mt-3">Ajib</h4>
                    <div class="card-body">
                        <span class="h2 fw-bold">IDR 1489k </span>/ Month
                            <ul class="list-group list-group-flush fa-ul text-start p-3 mb-3">
                                <li class="list-group-item list-primary"><i class="fa-solid fa-check fa-li"></i>Kamu Tinggal Terima Beres Aja!</li>
                                <li class="list-group-item list-primary"><i class="fa-solid fa-check fa-li"></i>Posting <b>SETIAP HARI</b> Kec. Hari Libur</li>
                                <li class="list-group-item list-primary"><i class="fa-solid fa-check fa-li"></i>Ide Konten & Materi Konten</li>
                                <li class="list-group-item list-primary"><i class="fa-solid fa-check fa-li"></i>Copywriting konten & Caption</li>
                                <li class="list-group-item list-primary"><i class="fa-solid fa-check fa-li"></i>Hashtag Setiap konten</li>
                                <li class="list-group-item list-primary"><i class="fa-solid fa-check fa-li"></i>Bisa kasi konsep / Referensi design</li>
                                <li class="list-group-item list-primary"><i class="fa-solid fa-check fa-li"></i>Admin Posting Di IG & Fb</li>
                                <li class="list-group-item list-primary"><i class="fa-solid fa-check fa-li"></i>Revisi ( Minor ) 2x / Desain</li>
                            </ul>
                        <a href="https://wa.wizard.id/4349a1" target="_blank"><button type="button" class="btn-white btn rounded-pill p-3 px-5 fs-5 fw-bold">Beli Sekarang!</button></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 aos-init  aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="200">
                <div class="card mb-4 py-3">
                    <h4 class="fw-bold mt-3">Mantap</h4>
                    <div class="card-body">
                        <span class="h2 fw-bold">IDR 934k </span>/ Month
                            <ul class="list-group list-group-flush fa-ul text-start p-3 mb-3">
                                <li class="list-group-item"><i class="fa-solid fa-check fa-li"></i>Kamu Tinggal Terima Beres Aja!</li>
                                <li class="list-group-item"><i class="fa-solid fa-check fa-li"></i>Posting <b>SETIAP HARI</b> Kec. Hari Libur</li>
                                <li class="list-group-item"><i class="fa-solid fa-check fa-li"></i>Ide Konten & Materi Konten</li>
                                <li class="list-group-item"><i class="fa-solid fa-check fa-li"></i>Copywriting konten & Caption</li>
                                <li class="list-group-item"><i class="fa-solid fa-check fa-li"></i>Hashtag Setiap konten</li>
                                <li class="list-group-item"><i class="fa-solid fa-check fa-li"></i>Bisa kasi konsep / Referensi design</li>
                                <li class="list-group-item"><i class="fa-solid fa-check fa-li"></i>Admin Posting Di IG & Fb</li>
                                <li class="list-group-item"><i class="fa-solid fa-check fa-li"></i>Revisi ( Minor ) 2x / Desain</li>
                            </ul>
                        <a href="https://wa.wizard.id/0fba2d" target="_blank"><button type="button" class="btn-primary btn rounded-pill p-3 px-5 fs-5 fw-bold">Beli Sekarang!</button></a>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>

<section class="contact" id="contact">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center" style="min-height: 100vh">
            <div class="col-lg-8 aos-init aos-animate">
                <h1 class="fw-bold my-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease">Konsul yuk terkait bisnis dan branding dari produk kamu!</h1>
                <p class="fs-4 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">Manto Mukhli Fardi</p>
                <p class="fs-4 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">0812 3456 7890</p>
                <a href="https://wa.wizard.id/e091ae" target="_blank"><button type="button" class="btn-white btn rounded-pill p-3 px-5 mt-3 mb-5 fs-5 fw-bold aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">Chat Sekarang!</button></a>
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

    </script>

@endpush