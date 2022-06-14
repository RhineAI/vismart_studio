@extends('layouts.main')

@section('content')

<section class="header">
    <div class="container">
        <div class="row text-center align-items-center justify-content-center" style="min-height: 100vh">
            <div class="col-10">
                <img src="/img/logo vismart studio.png" class="img-fluid aos-init aos-animate" data-aos="zoom-in" alt="..." style="width: 20em;">
                <h1 class="fw-bold my-5 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">One Stop Solution for Branding, Digital Marketing, Social Media Management & Marketing Communication</h1>
                <a href="#page-1"><button type="button" class="btn-primary btn rounded-pill p-3 px-5 fs-4 fw-bold aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">REACH US!</button></a>
            </div>
        </div>
    </div>
</section>

<section class="page-1" id="page-1">
    <div class="container">
        <div class="row align-items-center justify-content-center py-5" style="min-height: 100vh">
            <div class="col-lg-6 d-flex justify-content-center align-items-center p-5 order-md-last aos-init aos-animate" data-aos="fade-left" data-aos-easing="ease" data-aos-delay="100">
                <img src="/img/home/homee.png" class="img-fluid" alt="..." style="width: 40em">
            </div>
            <div class="col-lg-6 p-5">
                <h1 class="fw-bold aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease">Kenapa Harus Vismart Studio?</h1><br>
                <p class="fs-4 aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="100">Kami adalah tim kreatif dari PT Madtive Studio Indonesia yang didirikan sejak tahun 2015 yang sudah bekerjasama dengan banyak client mulai dari UMKM, Perusahaan menengah keatas hingga pemerintahan.</p>
                <p class="fs-4 aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="100">Sehingga kami sudah sangat siap untuk membantu apapun jenis bisnis kamu untuk tumbuh dan berkembang dengan konten yang terbaik dan profesional untuk target market kamu.</p><br>
                <a href="#page-2"><button type="button" class="btn-white btn rounded-pill p-3 px-5 fs-5 fw-bold aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">NEXT</button></a>
            </div>
        </div>
    </div>
</section>

<section class="page-2" id="page-2">
    <div class="container">
        <div class="row align-items-center justify-content-between text-center" style="min-height: 100vh;">
            <h1 class="fw-bold my-3 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease">Layanan Kami</h1>
            <div class="col-lg-6 aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="100">
                <img src="/img/home/home.png" class="img-fluid page-2-img" alt="..." style="width: 35em">
            </div>
            <div class="col-lg-5">
                @foreach ($service as $item)     
                    <div class="service p-2 px-4 mb-4 aos-init aos-animate" data-aos="fade-left" data-aos-easing="ease">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-lg-2 text-center">
                                <img src="{{ asset('storage/'. $item->logo) }}" class="img-fluid" alt="..." style="width: 6em">
                            </div>
                            <div class="col-lg-10 p-3 text-center text-lg-start">
                                <h3 class="fw-bold">{{ $item->title }}</h3>
                            </div>
                        </div>
                    </div>
                @endforeach

                    {{-- <a href="#2"> 
                        <div class="service p-2 px-4 mb-4">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-2 text-center">
                                    <img src="/img/home/Design Feed Instagram Icon.png" class="img-fluid" alt="..." style="width: 6em">
                                </div>
                                <div class="col-lg-10 p-3 text-center text-lg-start">
                                    <h3 class="fw-bold">Desain Feed Instagram</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#3">
                        <div class="service p-2 px-4 mb-4 aos-init aos-animate" data-aos="fade-left" data-aos-easing="ease">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-2 text-center">
                                    <img src="/img/home/Digital Marketing Icon.png" class="img-fluid" alt="..." style="width: 6em">
                                </div>
                                <div class="col-lg-10 p-3 text-center text-lg-start">
                                    <h3 class="fw-bold">Digital Marketing</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#4">
                        <div class="service p-2 px-4 mb-4 aos-init aos-animate" data-aos="fade-left" data-aos-easing="ease">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-2 text-center">
                                    <img src="/img/home/Social Media Management Icon.png" class="img-fluid" alt="..." style="width: 6em">
                                </div>
                                <div class="col-lg-10 p-3 text-center text-lg-start">
                                    <h3 class="fw-bold">Social Media Management</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#5">
                        <div class="service p-2 px-4 mb-4 aos-init aos-animate" data-aos="fade-left" data-aos-easing="ease">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-2 text-center">
                                    <img src="/img/home/Marketing Communications Icon.png" class="img-fluid" alt="..." style="width: 6em">
                                </div>
                                <div class="col-lg-10 p-3 text-center text-lg-start">
                                    <h3 class="fw-bold">Marketing Communications</h3>
                                </div>
                            </div>
                        </div>
                    </a> --}} 
            </div>
        </div>
    </div>
</section>

<section class="">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center" style="min-height: 100vh">
            <div class="col-12">
            
            <div class="row my-5" id="1">
                <div class="col-lg-6 d-flex justify-content-center align-items-center p-5 order-md-last aos-init aos-animate" data-aos="fade-left" data-aos-easing="ease" data-aos-delay="100">
                    <img src="/img/home/Logo dan Branding Icon.png" class="img-fluid" alt="..." style="width: 25em">
                </div>
                <div class="col-lg-6 p-5 text-start">
                    <h1 class="fw-bold aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease">Mengapa Harus Memiliki Logo?</h1><br>
                    <p class="fs-4 text-black-50 aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="100">Tahukah Anda, logo merupakan unsur yang paling penting bagi sebuah perusahaan.</p>
                    <p class="fs-4 text-black-50 aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="100">Sebab, umumnya manusia itu akan cenderung lebih mudah untuk mengingat sesuatu secara
                        visual. Sehingga, desain logo yang memikat tentu akan sangat mendukung brand bisnis dalam menarik
                        minat konsumen.</p>
                    <p class="fs-4 text-black-50 aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="100">Jadi tunggu apalagi? Yuk segera pesan desain logo untuk perusahaan kamu kepada ahlinya.</p><br>
                    <a href="#2"><button type="button" class="btn-primary btn rounded-pill p-3 px-5 fs-5 fw-bold aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">NEXT</button></a>
                </div>
            </div>

            <div class="row my-5" id="2">
                <div class="col-lg-6 d-flex justify-content-center align-items-center p-5 aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="100">
                    <img src="/img/home/Design Feed Instagram Icon.png" class="img-fluid" alt="..." style="width: 25em">
                </div>
                <div class="col-lg-6 p-5 text-start">
                    <h1 class="fw-bold aos-init aos-animate" data-aos="fade-left" data-aos-easing="ease">Apa itu Desain Feed Instagram?</h1><br>
                    <p class="fs-4 text-black-50 aos-init aos-animate" data-aos="fade-left" data-aos-easing="ease" data-aos-delay="100">Desain feed pada instagram kamu adalah kunci keberhasilan proses branding. Baik itu akun personal maupun akun bisnis. Dari desain feed, audiens bisa mengetahui vibes dan kesan visual yang kamu inginkan.</p>
                    <p class="fs-4 text-black-50 aos-init aos-animate" data-aos="fade-left" data-aos-easing="ease" data-aos-delay="100">Feed Instagram menjadi media utama ketika kamu ingin mengembangkan sebuah akun. Dari situ, kamu bisa mencapai audiens yang kamu inginkan, menyampaikan branding, dan membangun interaksi atau engagement dengan audiens.</p><br>
                    <a href="#3"><button type="button" class="btn-primary btn rounded-pill p-3 px-5 fs-5 fw-bold aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">NEXT</button></a>
                </div>
            </div>

            <div class="row my-5" id="3">
                <div class="col-lg-6 d-flex justify-content-center align-items-center p-5 order-md-last aos-init aos-animate" data-aos="fade-left" data-aos-easing="ease" data-aos-delay="100">
                    <img src="/img/home/Digital Marketing Icon.png" class="img-fluid" alt="..." style="width: 25em">
                </div>
                <div class="col-lg-6 p-5 text-start">
                    <h1 class="fw-bold aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease">Apa itu Digital Marketing?</h1><br>
                    <p class="fs-4 text-black-50 aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="100">Apa itu digital marketing? Pengertian digital marketing adalah suatu strategi pemasaran menggunakan media digital dan internet.</p>
                    <p class="fs-4 text-black-50 aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="100">Apakah Anda pernah melihat suatu brand atau produk perusahaan yang melakukan digital campaign atau kampanye online? Atau mungkin Anda juga pernah melihatnya melalui website dan social media suatu perusahaan?</p>
                    <p class="fs-4 text-black-50 aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="100">Seiring dengan kemajuan teknologi, tren di dunia bisnis juga semakin bervariasi. Salah satunya adalah tren digital marketing.</p><br>
                    <a href="#4"><button type="button" class="btn-primary btn rounded-pill p-3 px-5 fs-5 fw-bold aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">NEXT</button></a>
                </div>
            </div>

            <div class="row my-5" id="4">
                <div class="col-lg-6 d-flex justify-content-center align-items-center p-5 aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="100">
                    <img src="/img/home/Social Media Management Icon.png" class="img-fluid" alt="..." style="width: 25em">
                </div>
                <div class="col-lg-6 p-5 text-start">
                    <h1 class="fw-bold aos-init aos-animate" data-aos="fade-left" data-aos-easing="ease">Apa itu Social Media Management?</h1><br>
                    <p class="fs-4 text-black-50 aos-init aos-animate" data-aos="fade-left" data-aos-easing="ease" data-aos-delay="100">Pada intinya, social media management adalah penggunaan berbagai tools, software maupun layanan yang mampu membantu para pebisnis dalam membagikan konten bisnisnya di media sosial.</p>
                    <p class="fs-4 text-black-50 aos-init aos-animate" data-aos="fade-left" data-aos-easing="ease" data-aos-delay="100">Beberapa hal yang bisa dikategorikan dalam kegiatan social media management adalah menjadwalkan waktu posting di media sosial, melakukan interaksi dengan target audience, sampai mengelola respon di media sosial secara cepat.</p><br>
                    <a href="#5"><button type="button" class="btn-primary btn rounded-pill p-3 px-5 fs-5 fw-bold aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">NEXT</button></a>
                </div>
            </div>

            <div class="row my-5" id="5">
                <div class="col-lg-6 d-flex justify-content-center align-items-center p-5 order-md-last aos-init aos-animate" data-aos="fade-left" data-aos-easing="ease" data-aos-delay="100">
                    <img src="/img/home/Marketing Communications Icon.png" class="img-fluid" alt="..." style="width: 25em">
                </div>
                <div class="col-lg-6 p-5 text-start">
                    <h1 class="fw-bold aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease">Apa itu Marketing Communications?</h1><br>
                    <p class="fs-4 text-black-50 aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="100">Pada dasarnya, komunikasi adalah proses mengirim pesan dan informasi. Komunikasi dapat dikatakan sukses jika kedua pihak tersebut bisa mengerti dan mengolah pesan yang disampaikan.</p>
                    <p class="fs-4 text-black-50 aos-init aos-animate" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="100">Demikian juga dengan marketing communication. Agar calon konsumen bersedia mengeluarkan uang untuk menggunakan produk dan layanan jasa yang ditawarkan, diperlukan pengertian yang sama. Di mana produk dan layanan jasa yang bersangkutan adalah solusi dari problem mereka.</p><br>
                    <a href="#page-3"><button type="button" class="btn-primary btn rounded-pill p-3 px-5 fs-5 fw-bold aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">NEXT</button></a>
                </div>
            </div>
        
        </div>

        </div>
    </div>
</section>


<section class="page-3" id="page-3">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center" style="min-height: 100vh;">
            <h1 class="fw-bold my-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease">Apa yang Kamu Butuhkan?</h1>
            
            <div class="row row-cols-1 row-cols-lg-3 align-items-stretch justify-content-center g-4 py-5">
                @foreach ($service as $item)  
                <div class="col mb-4 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
                    <div class="card feature h-100 text-center">
                        <div class="image text-center">
                            <img src="{{ asset('storage/'. $item->image) }}" class="img-fluid my-3" alt=" $p" style="width: 12em">
                        </div>
                    <div class="text">
                        <h2 class="px-5 fw-bold">{{ $item->title }}</h2>
                    </div>
                    <div class="text-center mt-auto">
                        <a href="{{ $item->slug }}"><button type="button" class="btn-primary btn rounded-pill p-3 px-5 mb-5 fs-5 fw-bold">CLICK HERE</button></a>
                    </div>
                </div>
            </div>
            @endforeach  

                {{-- <div class="col mb-4 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
                  <div class="card feature h-100 text-center">
                    <div class="image text-center">
                        <img src="/img/home/Design Feed Instagram Icon.png" class="img-fluid my-3" alt="..." style="width: 12em">
                    </div>
                    <div class="text">
                        <h2 class="px-5 fw-bold">Design Feed Instagram</h2>
                    </div>
                    <div class="text-center mt-auto">
                      <a href="designfeed"><button type="button" class="btn-primary btn rounded-pill p-3 px-5 mb-5 fs-5 fw-bold">CLICK HERE</button></a>
                    </div>
                  </div>
                </div>

                <div class="col mb-4 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
                  <div class="card feature h-100 text-center">
                    <div class="image text-center">
                        <img src="/img/home/Digital Marketing Icon.png" class="img-fluid my-3" alt="..." style="width: 12em">
                    </div>
                    <div class="text">
                        <h2 class="px-5 fw-bold">Digital Marketing</h2>
                    </div>
                    <div class="text-center mt-auto">
                      <a href="digitalmarketing"><button type="button" class="btn-primary btn rounded-pill p-3 px-5 mb-5 fs-5 fw-bold">CLICK HERE</button></a>
                    </div>
                  </div>
                </div>

                <div class="col mb-4 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
                  <div class="card feature h-100 text-center">
                    <div class="image text-center">
                        <img src="/img/home/Social Media Management Icon.png" class="img-fluid my-3" alt="..." style="width: 12em">
                    </div>
                    <div class="text">
                        <h2 class="px-5 fw-bold">Social Media Management</h2>
                    </div>
                    <div class="text-center mt-auto">
                      <a href="smm"><button type="button" class="btn-primary btn rounded-pill p-3 px-5 mb-5 fs-5 fw-bold">CLICK HERE</button></a>
                    </div>
                  </div>
                </div>

                <div class="col mb-4 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
                  <div class="card feature h-100 text-center">
                    <div class="image text-center">
                        <img src="/img/home/Marketing Communications Icon.png" class="img-fluid my-3" alt="..." style="width: 12em">
                    </div>
                    <div class="text">
                        <h2 class="px-5 fw-bold">Marketing Communications</h2>
                    </div>
                    <div class="text-center mt-auto">
                      <a href="marketingcommunications"><button type="button" class="btn-primary btn rounded-pill p-3 px-5 mb-5 fs-5 fw-bold">CLICK HERE</button></a>
                    </div>
                  </div>
                </div> --}}
            </div>

        </div>
    </div>
</section>

<section class="client" id="client">
    <div class="container text-center py-5">
        <div class="row justify-content-center text-center">
            <h1 class="fw-bold my-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease">Client Vismart Studio</h2>
            <div class="col-10 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
                <div class="owl-carousel owl-images owl-theme">

                @foreach ($clients as $client)
                    <div class="item mx-5">
                        <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}">
                    </div>
                @endforeach

                </div>
                <h4 class="fw-bold aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">Dan Masih Banyak Lagi</h4>
            </div>
        </div>
    </div>
</section>

<section class="contact" id="contact">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center" style="min-height: 100vh">
            <div class="col-lg-8 aos-init aos-animate">
                <h1 class="fw-bold my-5 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease">Saatnya menumbuhkan Bisnismu dengan Konten-konten yang lebih Menjual & Profesional</h1>
                <p class="fs-4 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">Manto Mukhli Fardi</p>
                <p class="fs-4 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">0812 3456 7890</p>
                <a href="https://wa.wizard.id/3ce917" target="_blank"><button type="button" class="btn-white btn rounded-pill p-3 px-5 mt-3 mb-5 fs-5 fw-bold aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">Chat Sekarang!</button></a>
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

    </script>
@endpush