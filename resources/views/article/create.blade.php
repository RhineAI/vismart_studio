@extends('admin.main')

@section('content')
<div class="col-md-12 p-2 my-3" style="background-color: white;">
    <div class="box">
        <div class="box-header mb-2">
            <h2 class="ml-3 mb-5">Form Article</h2>
        </div>
    </div>

    <div class="box body ">
        <form method="POST" action="/dashboard/article" class="mb-5 mx-3" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
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
                <input id="summernote" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body"></trix-editor>
            </div>
        
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>

    </div>
</div>
@endsection

@push('script')
<script>
    $(document).ready(function() {
        $('#summernote').summernote()
    })
    
    const title = document.querySelector('#title');
    const title = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/article/articleSlug?title=' + title.value)
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