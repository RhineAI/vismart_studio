@extends('admin.main')

@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col">
                    <h4 class="page-title mb-1"><b>Layanan</b></h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item">Layanan</li>
                        <li class="breadcrumb-item active">Detail Layanan</li>
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

        <div class="box">
            <div class="box-header with-border mx-2">
                <h2 class="my-5 text-center">Detail Layanan</h2>
                <a href="/dashboard/layanan/detail_layanan/create" class="btn btn-outline-dark mb-3 p-2">
                    Tambah Baru
                    <span data-feather="plus-circle"></span>
                </a>
            </div>

            <div class="box-body table-responsive">
                <table class="table table-bordered table-detail">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center table-default" style="color:black;" width="6%">No</th>
                            <th scope="col" class="text-center table-default" style="color:black;">Layanan</th>
                            <th scope="col" class="text-center table-default" style="color:black;">Detail Layanan</th>
                            <th scope="col" class="text-center table-default" style="color:black;">Keuntungan</th>
                            <th scope="col" class="text-center table-default" style="color:black;">Paket</th>
                            <th width="20%" scope="col" class="text-center table-default" style="color:black;">Created
                                At</th>
                            <th width="10%" scope="col" class="text-center table-default" style="color:black;"> <i
                                    class="fas fa-regular fa-gears"></i> </th>
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
        table = $('.table-detail').DataTable({
        processing: true,
        responsive: true,
        autoWidth: false,
        serverSide: true,
        ajax: {
            url: "{{ route('detail_service.data') }}",
            type: "POST",
            data: {  
                _token: '{{ csrf_token() }}'
            }
        },
        columns: [
            {data:'DT_RowIndex', searchable: false, sortable: false},
            {data:'title'},
            {data:'jasa'},
            {data:'keuntungan'},
            {data:'paket'},
            {data:'created'},
            {data:'action', searchable: false, sortable: false},
        ]
    });

    function deleteData(url) {
        Swal.fire({
            title: 'Hapus Detail Layanan yang dipilih?',
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
                        text: 'Detail Layanan berhasil dihapus',
                        icon: 'success',
                        confirmButtonText: 'Lanjut',
                        confirmButtonColor: '#28A745',
                    }) 
                    table.ajax.reload();
                })
                .fail((errors) => {
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Detail Layanan gagal dihapus',
                        icon: 'error',
                        confirmButtonText: 'Kembali',
                        confirmButtonColor: '#DC3545',
                    })                       
                    return;
                });
            } else if (result.isDenied) {
                Swal.fire({
                    title: 'Detail Layanan Batal dihapus',
                    icon: 'warning',
                })
            }
        })
    }
</script> 
@endpush