@extends('admin.main')

@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col">
                    <h4 class="page-title mb-1"><b>List Fitur</b></h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item">Paket</li>
                        <li class="breadcrumb-item active"><a href="/dashboard/feature">List Fitur</a></li>
                        <li class="breadcrumb-item active">Form List Fitur</li>
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
                    <h2 class="text-center">Form List Fitur</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('feature.update', $fitur->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="feature" class="form-label">Fitur</label>
                            <input type="text" class="form-control @error('feature') is-invalid @enderror" id="feature"
                                name="feature" value="{{ old('feature', $fitur->feature) }}" autofocus>
                            @error('feature')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="/dashboard/feature" class="btn btn-danger">Kembali</a>
                    </form>                                           
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div>
</div>
@endsection