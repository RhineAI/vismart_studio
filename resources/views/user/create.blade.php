@extends('admin.main')

@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col">
                    <h4 class="page-title mb-1"><b>Pengguna</b></h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="/dashboard/user">Pengguna</a></li>
                        <li class="breadcrumb-item active">Form Pengguna</li>
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
                    <h2 class="text-center">Form Klien</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="post" id="user-form">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}" required>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                                name="username" value="{{ old('username') }}" required>
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                                name="password" value="{{ old('password') }}" required minlength="4">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="/dashboard/user" class="btn btn-danger">Kembali</a>
                    </form>                                           
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div>
</div>
@endsection

@push('script')
<script>
     $('#user-form').validator().on('submit', function (e) {
        if (! e.preventDefault()) {
            $.post($('#user-form').attr('action'), $('#user-form form').serialize());
                if((response == true) => {
                    Swal.fire({
                        title: 'Sukses!',
                        text: response,
                        icon: 'success',
                        confirmButtonText: 'Lanjut',
                        confirmButtonColor: '#28A745'
                    })
                    window.location('/dashboard/user');
                })
                else((response ) => {
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Data Produk yang diinput sudah ada',
                        icon: 'error',
                        confirmButtonText: 'Kembali',
                        confirmButtonColor: '#DC3545'
                    })
                    table.ajax.reload();
    
                    return;
                });
        }
    });
</script>
    
@endpush