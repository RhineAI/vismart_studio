@extends('admin.main')

@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col">
                    <h4 class="page-title mb-1"><b>Layanan</b></h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Layanan</li>
                        <li class="breadcrumb-item active"><a href="/dashboard/layanan/service/">Layanan Utama</a></li>
                        <li class="breadcrumb-item active">Form Layanan Utama</li>
                    </ol>
                </div><!--end col-->
            </div><!--end row-->                                                              
        </div><!--end page-title-box-->
    </div><!--end col-->
</div><!--end row-->
<div class="col-md-12 pt-3 pb-2 mb-3" style="background-color: white;">
    <div class="box">
        <div class="col-lg-8" style="margin: auto;">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Form Article</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-11 mb-3" style="margin:auto;">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" rows="3" id="title"
                                name="title" value="{{ old('title') }}" required maxlength="200">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-11 mb-3" style="margin:auto;">
                            <label for="slug" class="form-label">Pranala</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" rows="3" id="slug"
                                name="slug" value="{{ old('slug') }}" required maxlength="50" readonly>
                            @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-11 mb-3" style="margin: auto;">
                            <label for="user" class="form-label">Author</label>
                            <input type="text" class="form-control @error('user') is-invalid @enderror" rows="3" id="user"
                                name="user" value="{{ old('user', auth()->user()->name) }}" required readonly>
                            @error('user')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>       

                        <div class="form-group col-md-11 mb-3" style="margin: auto;">
                            <label for="category" class="form-label">Category</label>
                            <div class="input-group">
                                <select name="category" id="category" class="form-control mb-4">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($category as $item )
                                        <option value="{{ $item->id }}">{{ $item->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('user')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>  

                        <div class="form-group col-md-11 mb-3" style="margin: auto;">
                            <label for="image" class="form-label">Gambar</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                name="image" value="{{ old('image') }}" required onchange="previewImage()">
                            <img class="img-preview img-fluid my-3 col-sm-5">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-11 mb-3" style="margin: auto;">
                            <label for="body" class="form-label">Kutipan Artikel</label>
                            @error('answer')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <textarea name="body" id="summernote" cols="30" rows="10"></textarea>
                            {{-- <input type="hidden" class="form-control" id="answer" name="answer" value="{{ old('answer') }}" required maxlength="255">
                            <trix-editor input="answer"></trix-editor> --}}
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="/dashboard/layanan/article" class="btn btn-danger">Kembali</a>
                    </form>                                           
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
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

    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/layanan/service/makeSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
</script>
@endpush