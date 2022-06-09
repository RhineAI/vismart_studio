@extends('admin.dashboard')

@section('content')

<div class="col-md-12 p-2 mb-3" style="background-color: white;">
    <div class="box">
        <div class="box-header" style="margin-bottom: 50px;">
            <h2>Create New Advantage</h2>
        </div>

        <div class="box-body">
           <div class="col-lg-5">
               <form action="{{ route('advantage.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="mb-2">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image') }}" required onchange="previewImage()">
                        <img class="img-preview img-fluid my-3 col-sm-5">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror  
                    </div>

                    <div class="mb-2">
                        <label for="advantage" class="form-label">Advantage</label>
                        <input class="form-control @error('advantage') is-invalid @enderror" rows="3" id="advantage" name="advantage" value="{{ old('advantage') }}" required autofocus></input>
                        @error('advantage')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
           </div>
        </div>

        <div class="box-footer mt-5 mb-4 mx-2">
            <button type="submit" class="btn btn-primary">Create Advantage</button>
            </form>
        </div>

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