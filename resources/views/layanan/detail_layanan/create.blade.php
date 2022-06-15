@extends('admin.main')

@section('content')
<div class="col-md-12 p-2 my-3" style="background-color: white;">
    <div class="box">
        <div class="box-header" style="margin-bottom: 50px;">
            <h2 class="ml-3">Form Detail Layanan</h2>
        </div>

        <div class="box-body">
            <div class="col-lg-6">
                <form action="{{ route('detail_layanan.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="service" class="form-label">Pilih Layanan</label>
                        <div class="input-group">
                            <select name="service" id="service" class="form-control mb-4">
                                <option value="">-- Pilih Layanan --</option>
                                @foreach ($service as $item )
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

                    <div class="mb-4 p-3" style="border: 1px dotted black;">
                        <p class="text-center " style="font-size:25px;">Form untuk bagian info halaman</p>
                        <br>
                        <div class="mb-2">
                            <label for="question" class="form-label">Custom title untuk Pertanyaan Mengenai Layanan</label>
                            <input type="text" class="form-control mb-3 @error('question') is-invalid @enderror" id="question" name="question" value="{{ old('question') }}" required maxlength="255">
                            @error('question')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="mb-2">
                                <label for="image" class="form-label">Gambar</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                    name="image" value="{{ old('image') }}" required onchange="previewImage()">
                                <img class="img-preview img-fluid my-3 col-sm-5">
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
                                        <input type="hidden" class="form-control" id="answer" name="answer" value="{{ old('answer') }}" required maxlength="255">
                                    <trix-editor input="answer"></trix-editor>
                                </div>
                            
                        </div>

                        {{-- <div class="mb-2">
                            <label for="reason" class="form-label">Custom title (Mengapa?) harus menggunakan layanan ini</label>
                            <input class="form-control @error('reason') is-invalid @enderror" id="reason" name="reason" value="{{ old('reason') }}" required maxlength="255">
                            @error('reason')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div> --}}
                    </div>
                </div>


                    <div class="mb-2">
                        <label for="jasa" class="form-label">Detail Layanan</label>
                        <div class="input-group">
                            <select name="jasa[]" id="feature" multiple class="chosen-select form-control mb-4">
                                @foreach ($jasa as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
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
                                @foreach ($advantage as $item)
                                    <option value="{{ $item->id }}">{{ $item->advantage }}</option>
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
                                @foreach ($package as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
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