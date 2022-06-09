@extends('admin.dashboard')

@section('content')

<div class="col-md-12 p-2 mb-3" style="background-color: white;">
    <div class="box">
        <div class="box-header" style="margin-bottom: 50px;">
            <h2>Edit Client</h2>
        </div>

        <div class="box-body">
            <div class="col-lg-5">
                <form action="/dashboard/client/{{ $client->id }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="mb-2">
                        <label for="logo" class="form-label">Logo</label>
                        <input type="hidden" name="oldLogo" id="oldLogo" value="{{ $client->logo }}">

                        <img src="{{ asset('storage/' . $client->logo) }}" class="logo-preview img-fluid my-3 col-sm-5 d-block">

                        <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo" onchange="previewlogo()" value="{{ old('logo', $client->logo) }}">

                        @error('logo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        
                    </div>

                    <div class="mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $client->name) }}" required autofocus>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        
                    </div>
            </div>
        </div>

        <div class="box-footer mt-5 mb-4 mx-2">
            <button type="submit" class="btn btn-primary">Update client</button>
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
