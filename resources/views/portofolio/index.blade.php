@extends('admin.dashboard')


@section('content')
<div class="row">
    <div class="col-md-12 p-2 mb-3 mt-3" style="background-color: white">

        @if (session()->has('success'))
            <div class="p-3 bg-success text-white" id="alert">{{ session()->get('success') }}</div>  
        @endif
       

        <div class="box">
            <div class="box-header with-border mx-2">
                <h2 class="mb-5">Portofolio</h2>
                
                <a href="/dashboard/portofolio/create" class="btn btn-outline-dark mb-3 p-2">
                    Create new Portofolio 
                    <span data-feather="plus-circle"></span> 
                </a>

                {{-- <button onclick="add()" class="btn btn-danger btn-sm">add</button> --}}
            </div>

            <div class="box-body table-responsive">
                <table class="table table-bordered table-portofolio">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center table-danger" style="color:black;" width="6%">No</th>
                            <th width="13%" scope="col" class="text-center table-danger" style="color:black;">Title</th>
                            <th width="14%" scope="col" class="text-center table-danger" style="color:black;">Image</th>
                            <th scope="col" class="text-center table-danger" style="color:black;">Description</th>
                            <th width="15%" scope="col" class="text-center table-danger" style="color:black;">Created At</th>
                            <th width="9%" scope="col" class="text-center table-danger" style="color:black;"> <i class="fas fa-regular fa-gears"></i> </th>
                        </tr>
                    </thead>

                    {{-- <tbody>
                        @foreach ($portofolio as $item => $key)
                        <tr>
                            <th class=" table-secondary">{{ $item+1 }}</th>
                            <th class=" table-secondary">
                                <img class="img-preview img-fluid " onload="previewImage()" style="width:95%;" src="{{ asset('storage/'. $key->image) }}" alt="">
                            </th>
                            <th class=" table-secondary">{{ $key->description }}</th>
                            <th class=" table-secondary">{{ tanggal($key->created_at) }}</th>
                            <th class="table-secondary">
                                <a href="/dashboard/portofolio/{{ $key->id }}/edit" class="btn btn-xs bg-info"><span data-feather='edit'></span></a>
                                <form action="{{ route('portofolio.destroy', $key->id) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-xs bg-danger border-0" type="submit" onclick="return confirm('Sure?')"><span data-feather='trash-2' ></span></button>  
                                </form>
                            </th>
                        </tr>
                        @endforeach
                    </tbody> --}}
                    
                </table>
            </div>

        </div>
    </div>
</div>

{{-- @includeIf('portofolio.form') --}}
@endsection

@push('script')
<script>
    var time = document.getElementById("alert");

    setTimeout(function(){
        time.style.display = "none";
    }, 4000);   

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
            table = $('.table-portofolio').DataTable({
            processing: true,
            responsive: true,
            autoWidth: false,
            serverSide: true,
            ajax: {
                url: "{{ route('portofolio.data') }}",
                type: "POST",
                data: {  
                    _token: '{{ csrf_token() }}'
                }
            },
            columns: [
                {data:'DT_RowIndex', searchable: false, sortable: false},
                {data:'title'},
                {data:'image'},
                {data:'description'},
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
