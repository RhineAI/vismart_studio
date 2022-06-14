@extends('admin.main')

@section('content')
<div class="col-md-12 p-2 my-3" style="background-color: white;">
    <div class="box">
        <div class="box-header" style="margin-bottom: 50px;">
            <h2 class="ml-3">Form Edit </h2>
        </div>

        <div class="box-body">
            <div class="col-lg-5">
                <form action="{{ route('detail_layanan.update', $detail->id) }}" method="post" enctype="multipart/form-data">
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


                    <div class="mb-4 p-3" style="border: 1px dotted black;">
                        <p class="text-center">Form untuk bagian depan halaman</p>
                    
                        <div class="mb-2">
                            <label for="question" class="form-label">Pertanyaan Mengenai Layanan</label>
                            <input type="text" class="form-control mb-3 @error('question') is-invalid @enderror" id="question" name="question" value="{{ old('question', $detail->question) }}" required maxlength="255">
                            @error('question')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="mb-2">
                                <label for="image" class="form-label">Gambar</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                    name="image" onchange="previewImage()" value="{{ old('image', $detail->image) }}">
                                <input type="hidden" name="oldImage" id="oldImage" value="{{ $detail->image }}">
                                @if($detail->image)
                                    <img src="{{ asset('storage/'. $detail->image) }}" class="img-preview img-fluid my-3 col-sm-5 d-block">
                                @else
                                    <img class="img-preview img-fluid my-3 col-sm-5">
                                @endif
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-2">
                                <div class="col-lg-12 mb-2">
                                    <label for="answer" class="form-label">Jawaban</label>
                                    @error('answer')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <input type="hidden" class="form-control" id="answer" name="answer" value="{{ old('answer', $detail->answer) }}" required maxlength="255">
                                <trix-editor input="answer"></trix-editor>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label for="reason" class="form-label">Custom title (Mengapa) harus menggunakan layanan ini</label>
                            <input class="form-control @error('reason') is-invalid @enderror" id="reason" name="reason" value="{{ old('reason', $detail->reason) }}" required maxlength="255">
                            @error('reason')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
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

</script>
@endpush