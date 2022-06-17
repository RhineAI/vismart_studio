@extends('layouts.main')

@section('content')

<header class="navarticle aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
    @include('partials.navarticle')
</header>

<section class="posts" id="posts">
    @if ($article->count())
    <div class="container py-3">
        <div class="row justify-content-center justify-content-center text-center" style="min-height: 100vh;">

            <div class="row row-cols-1 row-cols-lg-3 align-items-stretch justify-content-center g-4 py-5">

                @foreach ($article as $item)
                    <div class="col mb-4 aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
                        <div class="card article">
                            <img src="{{ asset('storage/'.$item->photo) }}" class="card-img-top" alt="...">
                            <div class="card-body p-4 text-start">
                                <h5 class="card-title fw-bold">{{ $item->title }}</h5>
                                <p class="card-text">{{ Str::limit(strip_tags($item->body), 120) }}</p>
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