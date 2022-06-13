@extends('admin.dashboard')

@section('content')
<div class="col-md-12 p-2 my-3" style="background-color: white;">
    <div class="box">
        <div class="box-header" style="margin-bottom: 50px;">
            <h2 class="ml-3">Form Edit </h2>
        </div>

        <div class="box-body">
            <div class="col-lg-5">
                <form action="{{ route('detail_layanan.update', $detail->id) }}" method="post">
                    @method('put')
                    @csrf

                    <div class="mb-2">
                        <label for="service" class="form-label">Ganti Layanan</label>
                        <div class="input-group">
                            <select name="service" id="service" class="form-control mb-4">
                                <option value="">-- Pilih Layanan --</option>
                                @foreach ($services as $service)
                                    @if(old('service', $detail->service_id) == $service->id)
                                        <option value="{{ $service->id }}" selected>{{ $service->title }}</option>
                                    @else
                                        <option value="{{ $service->id }}">{{ $service->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        @error('service')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>   

                    <div class="form-group">
                        <label for="name">Jasa</label>
                        <select name="jasa[]" id="jasa" class="form-control chosen-select" multiple>
                            @foreach($jasa as $key => $j)
                                <option value="{{ $j->id }}" 
                                    @if(!empty($detail)) 
                                        @foreach($detail->jasa as $jasa)
                                            @if($jasa->id == $j->id)
                                                selected
                                            @endif
                                        @endforeach
                                    @endif
                                    >{{ ++$key }}. {{ $j->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('jasa')
                        <b class="text-danger">{{ $message }}</b>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="advantage" class="form-label">Keunggulan</label>
                        <div class="input-group">
                            <select name="advantage[]" id="feature" multiple class="chosen-select form-control mb-4">
                                @foreach ($advantage as $key => $item)
                                <option value="{{ $item->id }}"
                                @if(!empty($detail))
                                    @foreach($detail->advantage as $a)
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
                                @foreach ($package as $key => $item)
                                <option value="{{ $item->id }}"
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

    $(document).ready(function () {
        $(".chosen-select").chosen();
    });

</script>
@endpush