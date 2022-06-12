@extends('admin.dashboard')

@section('content')
<div class="col-md-12 p-2 my-3" style="background-color: white;">
    <div class="box">
        <div class="box-header" style="margin-bottom: 50px;">
            <h2 class="ml-3">Form List Paket</h2>
        </div>

        <div class="box-body">
           <div class="col-lg-5">
               <form action="{{ route('package.store') }}" method="post">
                @csrf
                    <div class="mb-2">
                        <label for="name" class="form-label">Nama Paket</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="feature_id" class="form-label">Fitur</label>
                        <div class="input-group">
                            <select name="feature[]" id="feature" multiple class="chosen-select form-control mb-4">
                                @foreach ($feature as $item)
                                    <option value="{{ $item->id }}">{{ $item->feature }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('feature_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>   

                    <div class="mb-2">
                        <label for="price" class="form-label">Harga</label>
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

                    <div class="mb-2">
                        <label for="noTelp" class="form-label">No.Telepon</label>
                        <div class="input-group-prepend"> 
                            <span class="input-group-text">+62</span> 
                            <input type="text" class="form-control @error('noTelp') is-invalid @enderror" rows="3" id="noTelp" name="noTelp" value="{{ old('noTelp') }}" required minlength="9" maxlength="12"></input>
                        </div> 
                        @error('noTelp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> 

                    <div class="mb-1 mt-4">
                        <label for="isFirst" class="form-label">Tampilkan Utama</label>
                        <div class="" >
                            <input type="radio" class="btn-check rounded p-2 @error('isFirst') is-invalid @enderror" id="isFirst" name="isFirst" value="1" {{ old('isFirst') == 1 ? 'checked' : ''}} > Iya <span>&nbsp;</span> </input>
                            <input type="radio" class="btn-check rounded p-2 @error('isFirst') is-invalid @enderror" id="isFirst" name="isFirst" value="0" {{ old('isFirst') == 0 ? 'checked' : ''}} > Tidak <span>&nbsp;</span> </input>
                        </div>

                        @error('isFirst')
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

    $(document).ready(function () {
        $(".chosen-select").chosen();
    });

</script>
@endpush