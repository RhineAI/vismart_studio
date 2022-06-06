@extends('admin.dashboard')

@section('content')
<div class="row mx-3">
    <div class="col-md-12 p-2 mb-3" style="background-color: white">

        @if(session()->has('success'))
            <div class="p-3 bg-success text-white" id="alert">{{ session()->get('success') }}</div>
        @endif

        <div class="box">
            <div class="box-header with-border mx-2">
                <h2 class="mb-5">Package</h2>
                <a href="/dashboard/package/create" class="btn btn-outline-dark mb-3 p-2">
                    Create new Package 
                    <span data-feather="plus-circle"></span> 
                </a>

                {{-- <button onclick="add()">Add</button> --}}
            </div>

            <div class="box-body table-responsive">
                <table class="table table-bordered table-package">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center table-danger" style="color:black;" width="6%">No</th>
                            <th scope="col" class="text-center table-danger" style="color:black;">Name</th>
                            <th scope="col" class="text-center table-danger" style="color:black;">Price</th>
                            <th width="13%" scope="col" class="text-center table-danger" style="color:black;"> <i class="fas fa-regular fa-gears"></i> </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($package as $item => $key)
                        <tr>
                            <th class=" table-secondary">{{ $item+1 }}</th>
                            <th class=" table-secondary">{{ $key->name }}</th>
                            <th class=" table-secondary">{{ 'IDR'. ' '. format_uang($key->price) .',00' }}</th>
                            <th class="table-secondary">
                                <a href="/dashboard/package/{{ $key->id }}/edit" class="btn btn-xs bg-info"><span data-feather='edit'></span></a>
                                
                                <form action="{{ route('package.destroy', $key->id) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-xs bg-danger border-0" type="submit" onclick="return confirm('Surely?')"><span data-feather='trash-2' ></span></button>  
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

@includeIf('package.form')

<script>
    var time = document.getElementById("alert");

    setTimeout(function(){
        time.style.display = "none";
    }, 2000);

</script>

@endsection

@push('script')
<script>
    function add() {
        $('#modal-form').modal('show');
    }

    let table;
        table = $('.table').DataTable({
            processing: true,
            responsive: true,
            autoWidth: false,
            serverSide: true,
            ajax: {
                url: '{{ route('package.data') }}'',
            },
            columns: [
                {data:'DT_RowIndex', searchable: false, sortable: false},
                {data:'name'},
                {data:'description'},
                {data:'action', searchable: false, sortable: false},
            ]
        });

        


</script> 
@endpush
