@extends('admin.main')

@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col">
                    <h4 class="page-title mb-1"><b>Portofolio</b></h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="/dashboard/portofolio">Portofolio</a></li>
                        <li class="breadcrumb-item active">Form Portofolio</li>
                    </ol>
                </div><!--end col-->
            </div><!--end row-->                                                              
        </div><!--end page-title-box-->
    </div><!--end col-->
</div><!--end row-->
<div class="col-md-12 pt-3 pb-2 mb-3" style="background-color: white;">
    <div class="box">
        <div class="col-lg-8" style="margin: auto">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Form Portofolio</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('portofolio.update', $portofolio->id) }}" method="post"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="title" class="form-label">Judul</label>
                            <input class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                                value="{{ old('title', $portofolio->title) }}" maxlength="225" minlength="3">
                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image" class="form-label">Gambar</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                name="image" onchange="previewImage()" value="{{ old('image', $portofolio->img) }}">
                            <input type="hidden" name="oldImage" id="oldImage" value="{{ $portofolio->img }}">
                            @if($portofolio->img)
                            <img src="{{ asset('storage/' . $portofolio->img) }}"
                                class="img-preview img-fluid my-3 col-sm-5 d-block">
                            @else
                            <img class="img-preview img-fluid my-3 col-sm-5">
                            @endif
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="/dashboard/portofolio" class="btn btn-danger">Kembali</a>
                    </form>                                           
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div>
</div>

<script>
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
@endsection
