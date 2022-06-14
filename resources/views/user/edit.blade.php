@extends('admin.main')

@section('content')
<div class="col-md-12 p-2 my-3" style="background-color: white;">
    <div class="box">
        <div class="box-header" style="margin-bottom: 50px;">
            <h2 class="ml-3">Form Pengguna</h2>
        </div>

        <div class="box-body">
            <div class="col-lg-5">
                <form action="{{ route('user.update', $user) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="mb-2">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name', $user->name) }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                            name="username" value="{{ old('username', $user->username) }}">
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="old_password" class="form-label">Password Lama</label>
                        <input type="password" name="old_password" class="form-control  @error('old_password') is-invalid @enderror " id="old_password"  
                        minlength="4">
                        <div class="col-sm-4">
                            <span class="help-block with-errors"></span>
                            @error('old_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="password" class="form-label">Password Baru</label>
                        <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror " id="password"  
                        minlength="4">
                        <div class="col-sm-4">
                            <span class="help-block with-errors"></span>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control  @error('password_confirmation') is-invalid @enderror "  
                        data-match=#password" minlength="4">
                        <div class="col-sm-4">
                            <span class="help-block with-errors"></span>
                            @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
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
