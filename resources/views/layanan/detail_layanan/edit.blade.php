@extends('admin.dashboard')

@section('content')
<div class="col-md-12 p-2 my-3" style="background-color: white;">
    <div class="box">
        <div class="box-header" style="margin-bottom: 50px;">
            <h2 class="ml-3">Form Detail Layanan</h2>
        </div>

        <div class="box-body">
            <div class="col-lg-5">
                <form action="/layanan/detail_layanan/{{ $id }}" method="post">
                    @method('put')
                    @csrf

                    <div class="mb-2">
                        <label for="service" class="form-label">Ganti Layanan</label>
                        <div class="input-group">
                            <select name="service" id="service" class="form-control mb-4">
                                <option value="">-- Pilih Layanan --</option>
                                @foreach ($serv as $item )
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('service')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>   

                    <div class="mb-2">
                        <label for="jasa" class="form-label">Detail Layanan</label>
                        <div class="input-group">
                            <select name="jasa[]" id="feature" multiple class="chosen-select form-control mb-4">
                                @foreach ($jas as $key => item)
                                <option value="{{ $item->id }}">
                                @if(!empty($detail))
                                    @foreach(@$detail->jasa as $j)
                                        @if($j->id == $item->id)
                                            selected
                                        @endif
                                    @endforeach
                                @endif
                                >{{ ++$key }}. {{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('jasa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>   

                    <div class="mb-2">
                        <label for="advantage" class="form-label">Keunggulan</label>
                        <div class="input-group">
                            <select name="advantage[]" id="feature" multiple class="chosen-select form-control mb-4">
                                @foreach ($advant as $key => item)
                                <option value="{{ $item->id }}">
                                @if(!empty($detail))
                                    @foreach(@$detail->advantage as $a)
                                        @if($a->id == $item->id)
                                            selected
                                        @endif
                                    @endforeach
                                @endif
                                >{{ ++$key }}. {{ $item->advantage }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('advantage')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>   

                    <div class="mb-2">
                        <label for="package" class="form-label">Paket</label>
                        <div class="input-group">
                            <select name="package[]" id="feature" multiple class="chosen-select form-control mb-4">
                                @foreach ($pack as $key => item)
                                <option value="{{ $item->id }}">
                                @if(!empty($detail))
                                    @foreach(@$detail->package as $p)
                                        @if($p->id == $item->id)
                                            selected
                                        @endif
                                    @endforeach
                                @endif
                                >{{ ++$key }}. {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('package')
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