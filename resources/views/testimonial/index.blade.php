@extends('admin.dashboard')


@section('content')
<div class="row mx-3">
    <div class="col-md-12 p-2 mb-3" style="background-color: white">

        @if(session()->has('success'))
            <div class="p-3 bg-success text-white" id="alert">{{ session()->get('success') }}</div>
        @endif

        <div class="box">
            <div class="box-header with-border mx-2">
                <h2 class="mb-5">Testimonial</h2>
                
                <a href="/dashboard/testimonial/create" class="btn btn-outline-dark mb-3 p-2">
                    Create new testimonial 
                    <span data-feather="plus-circle"></span> 
                </a>

                {{-- <button onclick="add()">Add</button> --}}
            </div>

            <div class="box-body table-responsive">
                <table class="table table-bordered table-testimonial">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center table-danger" style="color:black;" width="6%">No</th>
                            <th scope="col" class="text-center table-danger" style="color:black;">Name</th>
                            <th scope="col" class="text-center table-danger" style="color:black;">Description</th>
                            <th width="13%" scope="col" class="text-center table-danger" style="color:black;"> <i class="fas fa-regular fa-gears"></i> </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($testimonial as $item => $key)
                        <tr>
                            <th class=" table-secondary">{{ $item+1 }}</th>
                            <th class=" table-secondary">{{ $key->name }}</th>
                            <th class=" table-secondary">{{ $key->description }}</th>
                            <th class="table-secondary">
                                <a href="/dashboard/testimonial/{{ $key->id }}/edit" class="btn btn-xs bg-info"><span data-feather='edit'></span></a>
                                <form action="{{ route('testimonial.destroy', $key->id) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-xs bg-danger border-0" type="submit" onclick="return confirm('Sure?')"><span data-feather='trash-2' ></span></button>  
                                </form>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>

        </div>
    </div>
</div>

@includeIf('testimonial.form')
@endsection

@push('script')
<script>
    function add() {
        $('#modal-form').modal('show');
    }

    var time = document.getElementById("alert");

    setTimeout(function(){
        time.style.display = "none";
    }, 2000);

    let table;
        table = $('.table').DataTable({
            processing: true,
            responsive: true,
            autoWidth: false,
            serverSide: true,
            ajax: {
                url: '{{ route('testimonial.data') }}'',
            },
            columns: [
                {data:'DT_RowIndex', searchable: false, sortable: false},
                {data:'name'},
                {data:'description'},
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
                            confirmButtonColor: '#28A745'
                        }) 
                        table.ajax.reload();
                    })
                    .fail((errors) => {
                        Swal.fire({
                            title: 'Gagal!',
                            text: 'Data gagal dihapus',
                            icon: 'error',
                            confirmButtonText: 'Kembali',
                            confirmButtonColor: '#DC3545'
                        })                       
                        return;
                    });
                } else if (result.isDenied) {
                    Swal.fire({
                        title: 'Batal dihapus',
                        icon: 'warning',
                    })
                }
            })
        }


</script> 
@endpush
