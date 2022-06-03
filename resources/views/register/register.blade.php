@extends('layouts.main')

@section('content')

  <section class="register">
      <div class="container d-flex justify-content-center">
        <div class="background-register card my-3" style="width: 1100px;">
          <div class="row g-0">
            <div class="col-md-6 d-flex justify-content-center">
              <img src="img/register.jpg" class="img-fluid rounded-start p-4" alt="...">
            </div>
            <div class="col-md-6">
              <div class="card-body p-4">
                <h2 class="card-title fw-bold">Register</h2>
                <form class="pe-lg-4 pe-md-4 text-center" action="/register" method="POST">
                  @csrf
                  <input class="nama form-control my-4 w-100 p-3 @error('nama_lengkap') is-invalid @enderror" type="text" name="nama_lengkap" id="nama_lengkap" required value="{{ old('nama_lengkap') }}" placeholder="Nama Lengkap" aria-label="nama_lengkap">
                  @error('nama_lengkap')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                  @enderror
                  <input class="no-tlp form-control my-4 w-100 p-3 @error('no_telp') is-invalid @enderror" type="number" name="no_telp" id="no_telp" required value="{{ old('no_telp') }}" placeholder="Nomor Telepon" aria-label="no_telp">
                  @error('no_telp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                  @enderror
                  <input class="username form-control my-4 w-100 p-3 @error('username') is-invalid @enderror" type="text" name="username" id="username" required value="{{ old('username') }}" placeholder="Username" aria-label="username">
                  @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                  @enderror
                  <input class="email form-control my-4 w-100 p-3 @error('email') is-invalid @enderror" type="email" name="email" id="email" required value="{{ old('email') }}" placeholder="Email Adress" aria-label="email">
                  @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                  @enderror
                  <input class="password form-control my-4 w-100 p-3 @error('password') is-invalid @enderror" type="password" name="password" id="password" required value="{{ old('password') }}" placeholder="Password" aria-label="password">
                  @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                  @enderror
                  <button class=" btn-primary btn w-30 mb-2 p-3 px-5" type="sumbit">Sign in</button>
                  <p class="login">Already have account?<a href="/login"> Login </a>now</p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>

@endsection