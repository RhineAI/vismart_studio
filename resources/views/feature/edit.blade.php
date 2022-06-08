@extends('admin.dashboard')

@section('content')

<div class="col-md-12 p-2 mb-3" style="background-color: white;">
    <div class="box">
        <div class="box-header" style="margin-bottom: 50px;">
            <h2>Edit</h2>
        </div>

        <div class="box-body">
           <div class="col-lg-5">
               <form action="{{ route('feature.update', $fitur->id) }}" method="post">
                @method('put')

                @csrf
                    <div class="mb-2">
                        <label for="feature" class="form-label">feature</label>
                        <input type="text" class="form-control @error('feature') is-invalid @enderror" id="feature" name="feature" value="{{ old('feature', $fitur->feature) }}" autofocus>
                        @error('feature')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        
                    </div>
           </div>
        </div>

        <div class="box-footer mt-5 mb-4 mx-2">
            <button type="submit" class="btn btn-primary">Update Feature</button>
            </form>
        </div>

    </div>
</div>
    
@endsection