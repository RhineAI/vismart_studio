@extends('layouts.main')

@section('content')

<header class="navarticle aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
    <nav class="navbar nav-article navbar-expand-lg fixed-top py-3">
        <div class="container"><a href="/" class="navbar-brand text-uppercase ms-2"><img src="/img/logo vismart studio.png" class="img-fluid" alt="..." style="width: 5em;"></a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
            
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item ms-2"><a href="/" class="nav-link text-uppercase">Home</a></li>
                    <li class="nav-item ms-2"><a href="/#page-1" class="nav-link text-uppercase">About</a></li>
                    <li class="nav-item ms-2"><a href="/#page-2" class="nav-link text-uppercase">Services</a></li>
                    <li class="nav-item ms-2"><a href="#footer" class="nav-link text-uppercase">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>


<section class="posts" id="posts">
    @if ($article->count())
    <div class="container py-3">
        <div class="row justify-content-center justify-content-center text-center" style="min-height: 100vh;">

            <div class="row row-cols-1 row-cols-lg-3 align-items-stretch justify-content-center g-4 py-5">

                @foreach ($article as $item)
                    <div class="col mb-2 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
                        <div class="card article">
                            <img src="{{ asset('storage/'.$item->photo) }}" class="card-img-top" alt="...">
                            <div class="card-body p-4 text-start">
                                <h5 class="card-title fw-bold">{{ $item->title }}</h5>
                                <p class="card-text">{{ Str::limit(strip_tags($item->body), 60) }}</p>
                                <a href="{{ url('article/'. $item->slug) }}" class="btn btn-primary">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endif

<div class="d-flex justify-content-center">
    {{ $article->links() }}
</div>
</section>

@endsection