@extends('layouts.main', ['title' => $article->title])

@section('content')

<header class="navarticle aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
    <nav class="navbar nav-article navbar-expand-lg fixed-top py-3">
        <div class="container"><a href="/" class="navbar-brand text-uppercase ms-2"><img src="/img/logo vismart studio.png" class="img-fluid" alt="..." style="width: 5em;"></a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
            
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item ms-2"><a href="/" class="nav-link text-uppercase">Home</a></li>
                    <li class="nav-item ms-2"><a href="/#page-1" class="nav-link text-uppercase">About</a></li>
                    <li class="nav-item ms-2"><a href="/posts" class="nav-link text-uppercase">Blogs</a></li>
                    <li class="nav-item ms-2"><a href="#footer" class="nav-link text-uppercase">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<section class="post" style="margin-top: 10em">
    
    <div class="container mt-5">
        <div class="row mb-5">
            <div class="col-lg-7 mb-1" style="margin-left:70px;">
                <div class="article__title mb-4">
                    <h1>{{ $article->title }}</h1>
                </div>
                <div class="article__categories mb-4">
                    @foreach ($article->categories as $item)
                        <span class="badge badge-primary py-2 px-3">{{ $item->categories }}</span>
                    @endforeach
                </div>
                <div class="article__image mb-3">
                    <div style="max-height: 400px; overflow:hidden">
                        <img src="{{ asset('storage/'.$article->photo) }}" class="img-fluid">
                    </div>
                </div>
                <div class="article__information d-flex gap-2 mb-2">
                    <p><i class="fa fa-user"></i> {{ $article->author }}</p>
                    <p>|</p>
                    <span>{{ date('d-m-Y', strtotime($article->created_at)) }}</span>
                </div>
                {{-- <div class="article__separator">
                    <hr />
                </div> --}}
                <div class="article__content">
                    {!! $article->body !!}
                </div>

                
            </div>

            <div class="col-lg-4">
                <div  style="margin-bottom: 70px"><h2>Rekomendasi Artikel</h2></div>
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0 mx-1">
                        <h4 class="mb-4">Artikel Terbaru</h4>
                        @foreach ($artikel as $item)
                            <div class="col-md-4">
                                <img src="{{ asset('storage/'.$item->photo) }}" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                <a href="{{ $item->slug }}"><h4 class="card-title text-dark">{{ $item->title }}</h4></a>
                                <p class="card-text">{{ Str::limit(strip_tags($item->body), 50) }}</p>
                                <p class="card-text"><small class="text-muted">{{ $item->created_at->diffForHumans() }}</small></p>
                                </div>
                            </div>   
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        
    </div>

</section>


@endsection
