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
                        <li class="breadcrumb-item active"><a href="/dashboard/advantage/">Keunggulan</a></li>
                        <li class="breadcrumb-item active">Form Keunggulan</li>
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
                    <h2 class="text-center">Form Keunggulan</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('advantage.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
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
                        <div class="form-group">
                            <label for="advantage" class="form-label">Keunggulan</label>
                            <input class="form-control @error('advantage') is-invalid @enderror" rows="3" id="advantage"
                                name="advantage" value="{{ old('advantage') }}" required autofocus>
                            @error('advantage')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3"
                                name="description" value="{{ old('description') }}" required></textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="/dashboard/advantage" class="btn btn-danger">Kembali</a>
                    </form>                                           
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div>
</div>
@endsection

@push('script')
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
@endpush