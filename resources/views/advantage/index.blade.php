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
                        <li class="breadcrumb-item active">Keunggulan</li>
                    </ol>
                </div><!--end col-->
            </div><!--end row-->                                                              
        </div><!--end page-title-box-->
    </div><!--end col-->
</div><!--end row-->
<div class="col-md-12 p-2 mb-3" style="background-color: white">

        <div class="box">
            <div class="box-header with-border mx-2">
                <h2 class="my-5 text-center">Keunggulan</h2>
                <a href="/dashboard/advantage/create" class="btn btn-outline-dark mb-3 p-2">
                    Tambah Baru
                    <span data-feather="plus-circle"></span>
                </a>
            </div>

            <div class="box-body table-responsive">
                <table class="table table-bordered table-advantage">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center table-default" style="color:black;" width="6%">No</th>
                            <th width="20%" scope="col" class="text-center table-default" style="color:black;">Gambar
                            </th>
                            <th scope="col" class="text-center table-default" style="color:black;">Keunggulan</th>
                            <th scope="col" class="text-center table-default" style="color:black;">Deskripsi</th>
                            <th width="15%" scope="col" class="text-center table-default" style="color:black;">Created
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

    function messageSuccess() {
        alert(
            Swal.fire({
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
            })
        );
    }


    var time = document.getElementById("alert");

    setTimeout(function(){
        time.style.display = "none";
    }, 3000);   

    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
        }
    }

    let table;
        table = $('.table-advantage').DataTable({
        processing: true,
        responsive: true,
        autoWidth: false,
        serverSide: true,
        ajax: {
            url: "{{ route('advantage.data') }}",
            type: "POST",
            data: {  
                _token: '{{ csrf_token() }}'
            }
        },
        columns: [
            {data:'DT_RowIndex', searchable: false, sortable: false},
            {data:'image'},
            {data:'advantage'},
            {data:'description'},
            {data:'created'},
            {data:'action', searchable: false, sortable: false},
        ]
    });

    function deleteData(url) {
        Swal.fire({
            title: 'Hapus Keunggulan yang dipilih?',
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
                        text: 'Keunggulan berhasil dihapus',
                        icon: 'success',
                        confirmButtonText: 'Lanjut',
                        confirmButtonColor: '#28A745'
                        ,
                    }) 
                    table.ajax.reload();
                })
                .fail((errors) => {
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Keunggulan gagal dihapus',
                        icon: 'error',
                        confirmButtonText: 'Kembali',
                        confirmButtonColor: '#DC3545'
                        ,
                    })                       
                    return;
                });
            } else if (result.isDenied) {
                Swal.fire({
                    title: 'Keunggulan batal dihapus',
                    icon: 'warning'
                    ,
                })
            }
        })
    }
</script> 
@endpush
