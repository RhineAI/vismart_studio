@extends('admin.main')

@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col">
                    <h4 class="page-title mb-1"><b>List Paket</b></h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item">Paket</li>
                        <li class="breadcrumb-item active"><a href="/dashboard/package">List Paket</a></li>
                        <li class="breadcrumb-item active">Form List Paket</li>
                    </ol>
                </div><!--end col-->
            </div><!--end row-->                                                              
        </div><!--end page-title-box-->
    </div><!--end col-->
</div><!--end row-->
<div class="col-md-12 pt-3 pb-2 mb-3" style="background-color: white;">
    <div class="box">
        <div class="col-lg-8" style="margin: auto">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Form List Paket</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('package.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">Nama Paket</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="feature_id" class="form-label">Fitur</label>
                            <div class="input-group">
                                <select name="feature[]" id="feature" multiple class="chosen-select form-control mb-4">
                                    @foreach ($feature as $item)
                                        <option value="{{ $item->id }}">{{ $item->feature }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('feature')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>   

                    <div class="mb-2">
                        <label for="price" class="form-label">Harga</label>
                        <div class="input-group-prepend"> 
                            <span class="input-group-text">IDR.</span> 
                            <input type="text" class="form-control @error('price') is-invalid @enderror" rows="3" id="price" name="price" value="{{ old('price') }}" required maxlength="16">
                        </div> 
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>    

                    <div class="mb-2">
                        <label for="link" class="form-label">Link WA</label>
                        <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{ old('link') }}" required autofocus>
                        @error('link')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-1 mt-4">
                        <label for="isFirst" class="form-label">Tampilkan Utama</label>
                        <div class="" >
                            <input type="radio" class="btn-check rounded p-2 @error('isFirst') is-invalid @enderror" id="isFirst" name="isFirst" value="1" {{ old('isFirst') == 1 ? 'checked' : ''}} > Iya <span>&nbsp;</span> 
                            <input type="radio" class="btn-check rounded p-2 @error('isFirst') is-invalid @enderror" id="isFirst" name="isFirst" value="0" {{ old('isFirst') == 0 ? 'checked' : ''}} > Tidak <span>&nbsp;</span> 
                        </div>
                        <div class="form-group">
                            <label for="price" class="form-label">Harga</label>
                            <div class="input-group-prepend"> 
                                <span class="input-group-text">IDR.</span> 
                                <input type="text" class="form-control @error('price') is-invalid @enderror" rows="3" id="price" name="price" value="{{ old('price') }}" required maxlength="16">
                            </div> 
                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="noTelp" class="form-label">No.Telepon</label>
                            <div class="input-group-prepend"> 
                                <span class="input-group-text">+62</span> 
                                <input type="text" class="form-control @error('noTelp') is-invalid @enderror" rows="3" id="noTelp" name="noTelp" value="{{ old('noTelp') }}" required minlength="9" maxlength="12">
                            </div> 
                            @error('noTelp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="isFirst" class="form-label">Tampilkan Utama</label>
                            <div class="" >
                                <input type="radio" class="btn-check rounded p-2 @error('isFirst') is-invalid @enderror" id="isFirst" name="isFirst" value="1" {{ old('isFirst') == 1 ? 'checked' : ''}} > Iya <span>&nbsp;</span> 
                                <input type="radio" class="btn-check rounded p-2 @error('isFirst') is-invalid @enderror" id="isFirst" name="isFirst" value="0" {{ old('isFirst') == 0 ? 'checked' : ''}} > Tidak <span>&nbsp;</span> 
                            </div>
    
                            @error('isFirst')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="/dashboard/package" class="btn btn-danger">Kembali</a>
                    </form>                                           
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div>
</div>
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