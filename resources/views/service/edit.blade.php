@extends('admin.dashboard')

@section('content')

<div class="col-md-12 p-2 mb-3" style="background-color: white;">
    <div class="box">
        <div class="box-header" style="margin-bottom: 50px;">
            <h2>Edit</h2>
        </div>

        <div class="box-body">
           <div class="col-lg-5">
               <form action="{{ route('service.update', $service->id) }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf

                    <div class="mb-2">
                        <label for="title" class="form-label">Title</label> 
                        <input type="text" class="form-control @error('title') is-invalid @enderror" rows="3" id="title" name="title" value="{{ old('title', $service->title) }}" required minlength="9" maxlength="50"></input>
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> 

                    <div class="mb-2">
                        <label for="image" class="form-label">Image</label>
                        <input type="hidden" name="oldImage" id="oldImage" value="{{ $service->image }}">
                        @if($service->image)
                            <img src="{{ asset('storage/' . $service->image) }}" class="img-preview img-fluid my-3 col-sm-5 d-block">
                        @else
                            <img class="img-preview img-fluid my-3 col-sm-5">
                        @endif
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()" value="{{ old('image', $service->image) }}">

                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        
                    </div>

                    <div class="mb-2">
                        <label for="package" class="form-label">Package</label>
                        <div class="input-group">
                            <select name="package[]" id="package" class="form-control mb-4">
                                @foreach ($package as $item)
                                    @if(old('package[]', $service->id) == $item->id)
                                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        @error('package')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>   

                    <div class="mb-2">
                        <label for="module" class="form-label">Module</label>
                        <div class="input-group">
                            <select name="module[]" id="module" class="form-control mb-4">
                                @foreach ($module as $item)
                                    @if(old('module[]', $service->id) == $item->id)
                                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        @error('module')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>   
                    
            </div>
        </div>

        <div class="box-footer mt-5 mb-4 mx-2">
            <button type="submit" class="btn btn-primary">Update Service</button>
            </form>
        </div>

    </div>
</div>

@includeIf('package.feature')  
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