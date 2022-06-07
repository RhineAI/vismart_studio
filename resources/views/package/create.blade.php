@extends('admin.dashboard')

@section('content')

<div class="col-md-12 p-2 mb-3" style="background-color: white;">
    <div class="box">
        <div class="box-header" style="margin-bottom: 50px;">
            <h2>Create New Package</h2>
        </div>

        <div class="box-body">
           <div class="col-lg-5">
               <form action="{{ route('package.store') }}" method="post">
                @csrf
                    <div class="mb-2">
                        <label for="feature_id" class="form-label">Feature</label>
                        <div class="input-group">
                            {{-- <input type="text" class="form-control col-xs-1" readonly> --}}
                            <button type="button" class="btn btn-info btn-md" onclick="addFeature()"><i class="fa-solid fa-circle-plus"></i>Add Features</button>
                        </div>
                        @error('feature_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>   

                    <div class="mb-2">
                        <label for="name" class="form-label">Package Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="price" class="form-label">Price</label>
                        <div class="input-group-prepend"> 
                            <span class="input-group-text">IDR.</span> 
                            <input type="text" class="form-control @error('price') is-invalid @enderror" rows="3" id="price" name="price" value="{{ old('price') }}" required maxlength="16"></input>
                        </div> 
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>    
           </div>
        </div>

        <div class="box-footer mt-5 mb-4 mx-2">
            <button type="submit" class="btn btn-primary">Create Testimonial</button>
            </form>
        </div>

    </div>
</div>


@includeIf('package.feature')  
@endsection

@push('script')
<script>
    function formatRupiah(angka, prefix){
        var number_string   = angka.replace(/[^,\d]/g, '').toString(),
        split               = number_string.split(','),
        sisa                = split[0].length % 3,
        rupiah              = split[0].substr(0, sisa),
        ribuan              = split[0].substr(sisa).match(/\d{3}/gi);

        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
    }

    function generateRupiah(elemValue) {
        return $(elemValue).val(formatRupiah($(elemValue).val(), 'Rp. '))
    }
        $(document).on('keyup', '#price', function(e){
            generateRupiah(this);
        })

    function addFeature() {
        $('#modal-feature').modal('show');
    }
</script>
@endpush