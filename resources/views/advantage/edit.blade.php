@extends('admin.dashboard')

@section('content')

<div class="col-md-12 p-2 my-3" style="background-color: white;">
    <div class="box">
        <div class="box-header" style="margin-bottom: 50px;">
            <h2>Edit</h2>
        </div>

        <div class="box-body">
            <div class="col-lg-5">
                <form action="{{ route('advantage.update', $previllege->id) }}" method="post"
                    enctype="multipart/form-data">
                    @method('put')

                    @csrf
                    <div class="mb-2">
                        <label for="image" class="form-label">Gambar</label>
                        <input type="hidden" name="oldImage" id="oldImage" value="{{ $previllege->image }}">
                        @if($previllege->image)
                        <img src="{{ asset('storage/' . $previllege->image) }}"
                            class="img-preview img-fluid my-3 col-sm-5 d-block">
                        @else
                        <img class="img-preview img-fluid my-3 col-sm-5">
                        @endif
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                            name="image" onchange="previewImage()" value="{{ old('image', $previllege->image) }}">

                    </div>

                    <div class="mb-2">
                        <label for="advantage" class="form-label">Keuntungan</label>
                        <input class="form-control @error('advantage') is-invalid @enderror" rows="3" id="advantage"
                            name="advantage" value="{{ old('advantage', $previllege->advantage ) }}" required
                            autofocus></input>
                        @error('advantage')
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