@extends('admin.main')

@section('content')

<div class="row">
    <div class="col-md-12 p-2 my-3" style="background-color: white">

        @if (Session::has('success'))
            <div class="p-3 alert-success text-dark" role="alert" id="alert">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="box">
            <div class="box-header with-border mx-2">
                <h2 class="mb-5">Pengaturan</h2>
            </div>
           
            <div class="box-body table-responsive">
                <form action="{{ route('setting.update', $setting->id) }}" method="post" id="formAdd">
                    @csrf
                    @method('put')
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th width="20%" scope="col" class="text-center table-dark" style="color:white;"width="6%">&nbsp;</th>
                                <th width="20%" scope="col" class="text-center table-dark" style="color:white;">Tampilkan</th>
                                <th width="20%" scope="col" class="text-center table-dark" style="color:white;">Tidak</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <div class="section-info">
                                    <th style="font-size:23px;">Section Info</th>
                                    <th>
                                        <input type="radio" class="btn-check mx-1" id="d-block" name="is_info" value="1" style="height:28px; width:26px; vertical-align: middle;"
                                        {{ !empty($setting) ? ($setting->is_info == 1 ? 'checked' : '') : '' }}>
                                    </th>
                                    <th>
                                        <input type="radio" class="btn-check mx-1" id="d-none" name="is_info" value="0" style="height:28px; width:26px; vertical-align: middle;"
                                        {{ !empty($setting) ? ($setting->is_info == 0 ? 'checked' : '') : '' }}>
                                    </th>
                                </div>     
                            </tr>

                            <tr>
                                <div class="section-previllege">
                                    <th style="font-size:23px;">Section Keunggulan</th>
                                    <th>
                                        <input type="radio" class="btn-check mx-1" id="d-block" name="is_previllege" value="1" style="height:28px; width:26px; vertical-align: middle;"
                                        {{ !empty($setting) ? ($setting->is_previllege == 1 ? 'checked' : '') : '' }}>
                                    </th>
                                    <th>
                                        <input type="radio" class="btn-check mx-1" id="d-none" name="is_previllege" value="0" style="height:28px; width:26px; vertical-align: middle;"
                                        {{ !empty($setting) ? ($setting->is_previllege == 0 ? 'checked' : '') : '' }}>
                                    </th>
                                </div>
                            </tr>

                            <tr>
                                <div class="section-jasa">
                                    <th style="font-size:23px;">Section Detail Layanan/Jasa</th>
                                    <th>
                                        <input type="radio" class="btn-check mx-1" id="d-block" name="is_jasa" value="1" style="height:28px; width:26px; vertical-align: middle;"
                                        {{ !empty($setting) ? ($setting->is_jasa == 1 ? 'checked' : '') : '' }}>
                                    </th>
                                    <th>
                                        <input type="radio" class="btn-check mx-1" id="d-none" name="is_jasa" value="0" style="height:28px; width:26px; vertical-align: middle;"
                                        {{ !empty($setting) ? ($setting->is_jasa == 0 ? 'checked' : '') : '' }}>
                                    </th>
                                </div>
                            </tr>

                            <tr>
                                <div class="section-portofolio">
                                    <th style="font-size:23px;">Section Portofolio</th>
                                    <th>
                                        <input type="radio" class="btn-check mx-1" id="d-block" name="is_portofolio" value="1" style="height:28px; width:26px; vertical-align: middle;"
                                        {{ !empty($setting) ? ($setting->is_portofolio == 1 ? 'checked' : '') : '' }}>
                                    </th>
                                    <th>
                                        <input type="radio" class="btn-check mx-1" id="d-none" name="is_portofolio" value="0" style="height:28px; width:26px; vertical-align: middle;"
                                        {{ !empty($setting) ? ($setting->is_portofolio == 0 ? 'checked' : '') : '' }}>
                                    </th>
                                </div>
                            </tr>
                            
                            <tr>
                                <div class="section-testimonial">
                                    <th style="font-size:23px;">Section Testimonial</th>
                                    <th>
                                        <input type="radio" class="btn-check mx-1" id="d-block" name="is_testimonial" value="1" style="height:28px; width:26px; vertical-align: middle;"
                                        {{ !empty($setting) ? ($setting->is_testimonial == 1 ? 'checked' : '') : '' }}>
                                    </th>
                                    <th>
                                        <input type="radio" class="btn-check mx-1" id="d-none" name="is_testimonial" value="0" style="height:28px; width:26px; vertical-align: middle;"
                                        {{ !empty($setting) ? ($setting->is_testimonial == 0 ? 'checked' : '') : '' }}>
                                    </th>
                                </div>
                            </tr>

                            <tr>      
                                <div class="section-package">
                                    <th style="font-size:23px;">Section Paket</th>
                                    <th>
                                        <input type="radio" class="btn-check mx-1" id="d-block" name="is_package" value="1" style="height:28px; width:26px; vertical-align: middle;"
                                        {{ !empty($setting) ? ($setting->is_package == 1 ? 'checked' : '') : '' }}>
                                    </th>
                                    <th>
                                        <input type="radio" class="btn-check mx-1" id="d-none" name="is_package" value="0" style="height:28px; width:26px; vertical-align: middle;"
                                        {{ !empty($setting) ? ($setting->is_package == 0 ? 'checked' : '') : '' }}>
                                    </th>
                                </div>
                            </tr>
                        </tbody>
                    </table>
            </div> 
                
                <div class="box-footer my-3 mx-4 d-flex justify-content-end" >
                    <button type="submit" id="submit" class="btn btn-outline-success">Update <i class="fa-solid fa-check"></i></button>
                </form>
            </div>

        </div>

    </div>
</div>    

@endsection

@push('script')
<script>
      var time = document.getElementById("alert");
        setTimeout(function(){
            time.style.display = "none";
        }, 3000); 

    $(document).ready(function() {
        var $form = $('#formAdd');
        $form.submit(function() {
            $post.($form.attr('action'), $(this).serialize(), function(response == true){
                alert('Success');
            }, 'json');
            return false;
        });
    });

</script>    
@endpush
@if (Session::has('success'))
        <script>
            toastr.success("{!! Session::get('success') !!}"); 
        </script>
@endif