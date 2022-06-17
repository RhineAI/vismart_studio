@extends('layouts.main', ['title' => $article->title])

@section('content')

<header class="navarticle aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100">
    @include('partials.navarticle')
</header>

<section class="post" style="margin-top: 10em">
    
    <div class="container mt-5">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7" style="">
                <div class="article__title mb-3">
                    <h2>{{ $article->title }}</h2>
                </div>
                <div class="article__categories mb-4">
                    <span class="badge badge-primary py-2 px-3">{{ $article->category->categories }}</span>
                </div>
                <div class="article__image mb-3">
                    <div style="max-height: 400px; overflow:hidden">
                        <img src="{{ asset('storage/'.$article->photo) }}" class="img-fluid">
                    </div>
                </div>
                <div class="article__information d-flex gap-2">
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
        </div>
    </div>

</section>


@endsection
