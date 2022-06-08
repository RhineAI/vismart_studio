@extends('admin.dashboard')

@section('content')

<div class="col-md-12 p-2 mb-3 mt-3" style="background-color: white;">
    <div class="box">
        <div class="box-header" style="margin-bottom: 50px;">
            <h2 class="ml-3">Edit Module</h2>
        </div>

        <div class="box-body">
            <div class="col-lg-5">
                <form action="{{ route('module.update', $testi->id) }}" method="post" enctype="multipart/form-data">
                    @method('put')

                    @csrf
                    <div class="mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $testi->name) }}" autofocus>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> 
            </div>
        </div>
        

        <div class="box-footer mt-5 mb-4 mx-2">
            <button type="submit" class="btn btn-primary">Update Module</button>
            </form>
        </div>

    </div>
</div>

@endsection