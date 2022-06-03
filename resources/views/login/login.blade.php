@extends('layouts.main')

@section('content')

  <section class="login">
      <div class="container d-flex justify-content-center">
        <div class="background-login card my-3" style="width: 1100px;">
          <div class="row g-0">
            <div class="col-md-6 d-flex justify-content-center">
              <img src="img/login.jpg" class="img-fluid rounded-start p-4" alt="...">
            </div>
            <div class="col-md-6">
              <div class="card-body p-4">

                @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                
                @if(session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <h2 class="card-title fw-bold">Login</h2>
                <form class="pe-lg-4 pe-md-4 text-center" action="/login" method="POST">
                  @csrf
                  <input class="username form-control my-4 w-100 p-3 @error('username') is-invalid @enderror" type="text" name="username" id="username" required value="{{ old('username') }}" placeholder="Username" aria-label="username">
                  @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                  @enderror
                  <input class="password form-control my-4 w-100 p-3 @error('password') is-invalid @enderror" type="password" name="password" id="password" required  placeholder="Password" aria-label="password">
                  @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                  @enderror
                  <button class=" btn-primary btn w-30 mb-2 p-3 px-5" type="sumbit">Login</button>
                  <p class="register">Don't have account?<a href="/pricing"> Register </a>now</p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>

@endsection