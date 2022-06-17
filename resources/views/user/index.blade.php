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
                        <li class="breadcrumb-item active">Pengguna</li>
                    </ol>
                </div><!--end col-->
            </div><!--end row-->                                                              
        </div><!--end page-title-box-->
    </div><!--end col-->
</div><!--end row-->
<div class="col-md-12 p-2 mb-3" style="background-color: white">

        {{-- @if(session()->has('success'))
        <div class="p-3 bg-success text-white" id="alert">{{ session()->get('success') }}</div>
        @endif --}}

        @if(session()->has('error'))
        <div class="p-3 bg-danger text-white" id="alert">{{ session()->get('error') }}</div>
        @endif

        <div class="box">
            <div class="box-header with-border mx-2">
                <h2 class="my-5 text-center">Pengguna</h2>
                <a href="/dashboard/user/create" class="btn btn-outline-dark mb-3 p-2">
                    Tambah Baru
                    <span data-feather="plus-circle"></span>
                </a>
            </div>

            <div class="box-body table-responsive">
                <table class="table table-bordered table-user">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center table-default" style="color:black;" width="6%">No</th>
                            <th scope="col" class="text-center table-default" style="color:black;">Nama</th>
                            <th scope="col" class="text-center table-default" style="color:black;">Username</th>
                            <th width="10%" scope="col" class="text-center table-default" style="color:black;"> <i class="fas fa-regular fa-gears"></i></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
</div>
@endsection

@push('script')
<script> 
    var time = document.getElementById("alert");

    setTimeout(function(){
    time.style.display = "none";
    }, 3000);

    let table;
        table = $('.table-user').DataTable({
        processing: true,
        responsive: true,
        autoWidth: false,
        serverSide: true,
        ajax: {
            url: "{{ route('user.data') }}",
            type: "POST",
            data: {  
                _token: '{{ csrf_token() }}'
            }
        },
        columns: [
            {data:'DT_RowIndex', searchable: false, sortable: false},
            {data:'name'},
            {data:'username'},
            {data:'action', searchable: false, sortable: false},
        ]
    });

    function deleteData(url) {
        Swal.fire({
            title: 'Hapus Pengguna yang dipilih?',
            icon: 'question',
            iconColor: '#DC3545',
            showDenyButton: true,
            denyButtonColor: '#838383',
            denyButtonText: 'Batal',
            confirmButtonText: 'Hapus',
            confirmButtonColor: '#DC3545'
            }).then((result) => {
            if (result.isConfirmed) {
                $.post(url, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'delete'
                })
                .done((response) => {
                    Swal.fire({
                        title: 'Sukses!',
                        text: 'Pengguna berhasil dihapus',
                        icon: 'success',
                        confirmButtonText: 'Lanjut',
                        confirmButtonColor: '#28A745'
                    }) 
                    table.ajax.reload();
                })
                .fail((errors) => {
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Pengguna gagal dihapus',
                        icon: 'error',
                        confirmButtonText: 'Kembali',
                        confirmButtonColor: '#DC3545'
                    })                       
                    return;
                });
            } else if (result.isDenied) {
                Swal.fire({
                    title: 'Pengguna batal dihapus',
                    icon: 'warning'
                })
            }
        })
    }
</script> 
@endpush