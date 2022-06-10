@extends('admin.dashboard')

@section('content')
<div class="row">
    <div class="col-md-12 p-2 my-3" style="background-color: white">

        @if(session()->has('success'))
        <div class="p-3 bg-success text-white" id="alert">{{ session()->get('success') }}</div>
        @endif

        <div class="box">
            <div class="box-header with-border mx-2">
                <h2 class="mb-5">Detail Paket</h2>
                <a href="/dashboard/layanan/detail_layanan_paket/create" class="btn btn-outline-dark mb-3 p-2">
                    Tambah Baru
                    <span data-feather="plus-circle"></span>
                </a>
            </div>

            <div class="box-body table-responsive">
                <table class="table table-bordered table-package">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center table-default" style="color:black;" width="6%">No</th>
                            <th scope="col" class="text-center table-default" style="color:black;">Detail Layanan</th>
                            <th scope="col" class="text-center table-default" style="color:black;">Paket</th>
                            <th width="12%" scope="col" class="text-center table-default" style="color:black;">Created
                                At</th>
                            <th width="12%" scope="col" class="text-center table-default" style="color:black;"> <i
                                    class="fas fa-regular fa-gears"></i> </th>
                        </tr>
                    </thead>

                </table>
            </div>

        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    var time = document.getElementById("alert");

    setTimeout(function(){
        time.style.display = "none";
    }, 2000);



    let table;
        table = $('.table-package').DataTable({
        processing: true,
        responsive: true,
        autoWidth: false,
        serverSide: true,
        ajax: {
            url: "{{ route('package.data') }}",
            type: "POST",
            data: {  
                _token: '{{ csrf_token() }}'
            }
        },
        columns: [
            {data:'DT_RowIndex', searchable: false, sortable: false},
            {data:'name'},
            {data:'feature'},
            {data:'price'},
            {data:'noTelp'},
            {data:'created'},
            {data:'action', searchable: false, sortable: false},
        ]
    });


    function deleteData(url) {
        Swal.fire({
            title: 'Hapus Data yang dipilih?',
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
                        text: 'Data berhasil dihapus',
                        icon: 'success',
                        confirmButtonText: 'Lanjut',
                        confirmButtonColor: '#28A745',
                        timer: 2000
                    }) 
                    table.ajax.reload();
                })
                .fail((errors) => {
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Data gagal dihapus',
                        icon: 'error',
                        confirmButtonText: 'Kembali',
                        confirmButtonColor: '#DC3545',
                        timer: 2000
                    })                       
                    return;
                });
            } else if (result.isDenied) {
                Swal.fire({
                    title: 'Batal dihapus',
                    icon: 'warning',
                    timer: 2000
                })
            }
        })
    }

</script> 
@endpush
