@extends('admin.main')

@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col">
                    <h4 class="page-title mb-1"><b>Layanan</b></h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Layanan</li>
                        <li class="breadcrumb-item active"><a href="/dashboard/layanan/detail_layanan">Detail Layanan</a></li>
                        <li class="breadcrumb-item active">Form Detail Layanan</li>
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
                    <h2 class="text-center">Form Detail Layanan</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('detail_layanan.update', $detail->id) }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="form-group">
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
                                        <input type="hidden" class="form-control" id="answer" name="answer" value="{{ old('answer', $detail->answer) }}" maxlength="255">
                                    <trix-editor input="answer"></trix-editor>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-4">
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
                        <div class="form-group">
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
                        <div class="form-group">
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
                                <span class="placeholder col-12 bg-light">MAX 3 Select : Kiri | Tengah | Kanan</span>
                            </div>
                            @error('package')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="/dashboard/layanan/detail_layanan" class="btn btn-danger">Kembali</a>
                    </form>                                           
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div>
</div>
@endsection

@push('script')
<script>

    $(document).ready(function () {
        $(".chosen-select-deselect").chosen({allow_single_deselect:true});
        $(".chosen-select").chosen({ max_selected_options:3});
        $(".chosen-select").bind("chosen:maxselected", function () { 
            let timerInterval
            Swal.fire({
                title: 'Max Selected is 3!',
                html: '<b></b>',
                timer: 1650,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
                }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
            })
         });
        // $(".chosen-select").chosen().change( function () { alert("change"); } );
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