@extends('admin.main')

@section('content')
<div class="col-md-12 p-2 my-3">
    <div class="box">
        <div class="box-header">
            <h2 class="ml-3 mb-5">Edit Article</h2>
        </div>
    </div>

    <box class="body">
        <form method="POST" action="{{ Route('article.update', $article->id) }}" class="mb-5" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $article->title) }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
            <label for="image" class="form-label">Gambar</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="body" class="form-label">Kutipan Artikel</label> 
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="body" type="hidden" name="body" value="{{ old('body', $article->body) }}">
                <trix-editor input="body"></trix-editor>
            </div>
    <div class="box-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    </box>
</div>
@endsection

@push('script')
<script>
    $(document).ready(function() {
        $('#summernote').summernote()
    })

    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/posts/articleSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
    
    document.addEventListener('trix-file-accept',function(e) 
    {
        e.preventDefault()
    })

    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>
@endpush