@extends('admin.main')

@section('content')
<div class="content">
        <div class="row my-3">
                <div class="col-lg-8">
                        <h1 class="mb-3">{{ $article->title }}</h1>
                        
                        <a href="/dashboard/article" class="btn btn-outline-info"><i class="fa-solid fa-arrow-left-long"></i> Back to all my article</a>
                        <a href="/dashboard/article/{{ $article->slug }}/edit" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                <form action="/dashboard/article/{{ $article->slug }}" method="article" class="d-inline">
                                        @method('delete')
                                        @csrf 
                                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                            <i class="fa-solid fa-trash-can"></i> Delete</button>
                                        </form>
                                        
                                        <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid mt-1">

                        <article class="my-3 fs-5">
                                {!! $article->body !!}
                        </article>
                </div>
        </div>
</div> 
@endsection