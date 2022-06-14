@extends('admin.main')

@section('content')

<div class="col-md-12 p-2 my-3" style="background-color: white;">
    <div class="box">
        <div class="box-header" style="margin-bottom: 50px;">
            <h2 class="ml-3">Form Layanan Utama</h2>
        </div>

        <div class="box-body">
            <div class="col-lg-5">
                <form action="{{ route('service.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" rows="3" id="title"
                            name="title" value="{{ old('title') }}" required maxlength="50">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="slug" class="form-label">Pranala</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" rows="3" id="slug"
                            name="slug" value="{{ old('slug') }}" required maxlength="50" readonly>
                        @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="logo" class="form-label">Gambar</label>
                        <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo"
                            name="logo" value="{{ old('logo') }}" required onchange="previewImage()">
                        <img class="img-preview img-fluid my-3 col-sm-5">
                        @error('logo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
            </div>
        </div>

        <div class="box-footer mt-5 mb-4 mx-2">
            <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>

    </div>
</div>
@endsection

@push('script')
<script>
    function previewImage() {
        const image = document.querySelector('#logo');
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