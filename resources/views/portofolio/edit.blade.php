@extends('admin.main')

@section('content')

<div class="col-md-12 p-2 my-3" style="background-color: white;">
    <div class="box">
        <div class="box-header" style="margin-bottom: 50px;">
            <h2 class="ml-3">Form Portofolio</h2>
        </div>

        <div class="box-body">
            <div class="col-lg-5">
                <form action="{{ route('portofolio.update', $portofolio->id) }}" method="post"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="mb-2">
                        <label for="title" class="form-label">Judul</label>
                        <input class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                            value="{{ old('title', $portofolio->title) }}" maxlength="225" minlength="3">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-2">
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

                    {{-- <div class="mb-2">
                        <label for="img" class="form-label">Gambar</label>
                        <input type="file" class="form-control @error('img') is-invalid @enderror" id="img"
                            name="img" onchange="previewImage()" value="{{ old('img', $portofolio->img) }}">
                        <input type="hidden" name="oldImage" id="oldImage" value="{{ $portofolio->img }}">
                        @if($portofolio->img)
                        <img src="{{ asset('storage/' . $portofolio->img) }}"
                            class="img-preview img-fluid my-3 col-sm-5 d-block">
                        @else
                        <img class="img-preview img-fluid my-3 col-sm-5">
                        @endif
                        @error('img')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div> --}}
            </div>
        </div>

        <div class="box-footer mt-5 mb-4 mx-2">
            <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>

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
