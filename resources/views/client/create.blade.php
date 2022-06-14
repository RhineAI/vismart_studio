@extends('admin.main')

@section('content')

<div class="col-md-12 p-2 my-3" style="background-color: white;">
    <div class="box">
        <div class="box-header" style="margin-bottom: 50px;">
            <h2 class="ml-3">Form Klien</h2>
        </div>

        <div class="box-body">
            <div class="col-lg-5">
                <form action="/dashboard/client" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="logo" class="form-label">Logo</label>
                        <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo"
                            name="logo" value="{{ old('logo') }}" required onchange="previewLogo()">
                        <img class="logo-preview logo-fluid my-3 col-sm-5">
                        @error('logo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}" required autofocus>
                        @error('name')
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

<script>
    function previewLogo() {
        const logo = document.querySelector('#logo');
        const logoPreview = document.querySelector('.logo-preview');

        logoPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(logo.files[0]);

        oFReader.onload = function(oFREvent) {
            logoPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection
