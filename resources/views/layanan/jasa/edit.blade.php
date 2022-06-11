@extends('admin.dashboard')

@section('content')

<div class="col-md-12 p-2 my-3" style="background-color: white;">
    <div class="box">
        <div class="box-header" style="margin-bottom: 50px;">
            <h2>Edit</h2>
        </div>

        <div class="box-body">
            <div class="col-lg-5">
                <form action="{{ route('package.update', $pack->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="mb-2">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" rows="3" id="title"
                            name="title" value="{{ old('title', $service->title) }}" required minlength="9"
                            maxlength="50">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="image" class="form-label">Gambar</label>
                        <input type="hidden" name="oldImage" id="oldImage" value="{{ $service->image }}">
                        @if($service->image)
                        <img src="{{ asset('storage/' . $service->image) }}"
                            class="img-preview img-fluid my-3 col-sm-5 d-block">
                        @else
                        <img class="img-preview img-fluid my-3 col-sm-5">
                        @endif
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                            name="image" onchange="previewImage()" value="{{ old('image', $service->image) }}">

                        @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="title" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('title') is-invalid @enderror" id="title" rows="3"
                            name="title" value="{{ old('title') }}" required></textarea>
                        @error('title')
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
    
    function editFeature() {
        $('#modal-feature').modal('show');
    }

    $(document).ready(function () {
        $(".chosen-select").chosen();
    });

</script>
@endpush