@extends('admin.dashboard')

@section('content')
<div class="col-md-12 p-2 my-3" style="background-color: white;">
    <div class="box">
        <div class="box-header" style="margin-bottom: 50px;">
            <h2 class="ml-3">Form Pengguna</h2>
        </div>

        <div class="box-body">
            <div class="col-lg-5">
                <form action="{{ route('user.store') }}" method="post" id="user-form">
                    @csrf
                    <div class="mb-2">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}" required>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                            name="username" value="{{ old('username') }}" required>
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            name="password" value="{{ old('password') }}" required minlength="4">
                        @error('password')
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