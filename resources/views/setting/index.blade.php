@extends('admin.main')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<div class="row">
    <div class="col-md-12 p-2 my-3" style="background-color: white">

        <div class="box">
            <div class="box-header with-border mx-2">
                <h2 class="my-5 text-center">Pengaturan</h2>
            </div>

            <div class="box-body dashboard table-responsive">
                <form action="{{ route('setting.updateDashboard', $setting_dashboard->id) }}" method="post">
                    @csrf
                    @method('put')
                    <table class="table table-bordered rounded">
                        <thead>
                            <tr>
                                <th width="20%" scope="col" class="text-center" style="color:black; background-color:#43e6d8;font-size:22px;"width="6%">Dashboard Settings</th>
                                <th width="8%" scope="col" class="text-center" style="color:black; background-color:#43e6d8;font-size:22px;">Tampilkan</th>
                                <th width="8%" scope="col" class="text-center" style="color:black; background-color:#43e6d8;font-size:22px;">Tidak</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <div class="jam">
                                    <th style="font-size:23px;">Jam</th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-block" name="clock" value="1" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting_dashboard) ? ($setting_dashboard->clock == 1 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-none" name="clock" value="0" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting_dashboard) ? ($setting_dashboard->clock == 0 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                </div>     
                            </tr>
                        </tbody>
                    </table>
            </div>

            <div class="box-footer dashboard-page my-3 mx-4 d-flex justify-content-end">
                <button type="submit" id="submit" class="btn btn-outline-success">Update <i class="fa-solid fa-check"></i></button>
                </form>
            </div>


            <br><br><br><br>  


            <div class="box-body home-page table-responsive">
                <form action="{{ route('setting.updateHome', $setting_home->id) }}" method="post">
                    @csrf
                    @method('put')
                    <table class="table table-bordered rounded table-striped">
                        <thead>
                            <tr>
                                <th width="20%" scope="col" class="text-center" style="color:black; background-color:#43e6d8;font-size:22px;"width="6%">Home Settings</th>
                                <th width="8%" scope="col" class="text-center" style="color:black; background-color:#43e6d8;font-size:22px;">Tampilkan</th>
                                <th width="8%" scope="col" class="text-center" style="color:black; background-color:#43e6d8;font-size:22px;">Tidak</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <div class="landing-page">
                                    <th style="font-size:23px;">Landing Page</th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-block" name="landing_page" value="1" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting_home) ? ($setting_home->landing_page == 1 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-none" name="landing_page" value="0" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting_home) ? ($setting_home->landing_page == 0 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                </div>     
                            </tr>

                            <tr>
                                <div class="info">
                                    <th style="font-size:23px;">Informasi Website</th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-block" name="info" value="1" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting_home) ? ($setting_home->info == 1 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-none" name="info" value="0" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting_home) ? ($setting_home->info == 0 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                </div>     
                            </tr>

                            <tr>
                                <div class="logo-branding">
                                    <th style="font-size:23px;">Informasi Logo Branding</th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-block" name="logo_branding" value="1" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting_home) ? ($setting_home->logo_branding == 1 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-none" name="logo_branding" value="0" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting_home) ? ($setting_home->logo_branding == 0 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                </div>     
                            </tr>

                            <tr>
                                <div class="design-feed">
                                    <th style="font-size:23px;">Informasi Design Feed Instagram</th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-block" name="design_feed" value="1" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting_home) ? ($setting_home->design_feed == 1 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-none" name="design_feed" value="0" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting_home) ? ($setting_home->design_feed == 0 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                </div>     
                            </tr>

                            <tr>
                                <div class="digital-marketing">
                                    <th style="font-size:23px;">Informasi Digital Marketing</th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-block" name="digital_marketing" value="1" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting_home) ? ($setting_home->digital_marketing == 1 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-none" name="digital_marketing" value="0" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting_home) ? ($setting_home->digital_marketing == 0 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                </div>     
                            </tr>

                            <tr>
                                <div class="smm">
                                    <th style="font-size:23px;">Informasi Social Media Management</th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-block" name="smm" value="1" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting_home) ? ($setting_home->smm == 1 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-none" name="smm" value="0" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting_home) ? ($setting_home->smm == 0 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                </div>     
                            </tr>

                            <tr>
                                <div class="marketing-communications">
                                    <th style="font-size:23px;">Informasi Marketing Communications</th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-block" name="marketing_communications" value="1" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting_home) ? ($setting_home->marketing_communications == 1 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-none" name="marketing_communications" value="0" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting_home) ? ($setting_home->marketing_communications == 0 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                </div>     
                            </tr>

                            <tr>
                                <div class="client">
                                    <th style="font-size:23px;">Informasi Client</th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-block" name="client" value="1" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting_home) ? ($setting_home->client == 1 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-none" name="client" value="0" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting_home) ? ($setting_home->client == 0 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                </div>     
                            </tr>

                        </tbody>
                    </table>  
            </div>

            <div class="box-footer detail-page my-3 mx-4 d-flex justify-content-end">
                    <button type="submit" id="submit" class="btn btn-outline-success">Update <i class="fa-solid fa-check"></i></button>
                </form>
            </div>



            <br><br><br><br>  


           
            <div class="box-body detail-page table-responsive">
                <form action="{{ route('setting.update', $setting->id) }}" method="post" id="formAdd">
                    @csrf
                    @method('put')
                    <table class="table table-bordered rounded table-striped">
                        <thead>
                            <tr>
                                <th width="20%" scope="col" class="text-center" style="color:black; background-color:#43e6d8;font-size:22px;"width="6%">Detail Page Settings</th>
                                <th width="8%" scope="col" class="text-center" style="color:black; background-color:#43e6d8;font-size:22px;">Tampilkan</th>
                                <th width="8%" scope="col" class="text-center" style="color:black; background-color:#43e6d8;font-size:22px;">Tidak</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <div class="section-landing-page">
                                    <th style="font-size:23px;">Landing Page</th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-block" name="is_landing_page" value="1" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting) ? ($setting->is_landing_page == 1 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-none" name="is_landing_page" value="0" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting) ? ($setting->is_landing_page == 0 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                </div>     
                            </tr>

                            <tr>
                                <div class="section-info">
                                    <th style="font-size:23px;">Section Info</th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-block" name="is_info" value="1" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting) ? ($setting->is_info == 1 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-none" name="is_info" value="0" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting) ? ($setting->is_info == 0 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                </div>     
                            </tr>

                            <tr>
                                <div class="section-previllege">
                                    <th style="font-size:23px;">Section Keunggulan</th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-block" name="is_previllege" value="1" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting) ? ($setting->is_previllege == 1 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-none" name="is_previllege" value="0" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting) ? ($setting->is_previllege == 0 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                </div>
                            </tr>

                            <tr>
                                <div class="section-jasa">
                                    <th style="font-size:23px;">Section Detail Layanan/Jasa</th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-block" name="is_jasa" value="1" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting) ? ($setting->is_jasa == 1 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-none" name="is_jasa" value="0" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting) ? ($setting->is_jasa == 0 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                </div>
                            </tr>

                            <tr>
                                <div class="section-portofolio">
                                    <th style="font-size:23px;">Section Portofolio</th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-block" name="is_portofolio" value="1" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting) ? ($setting->is_portofolio == 1 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-none" name="is_portofolio" value="0" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting) ? ($setting->is_portofolio == 0 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                </div>
                            </tr>
                            
                            <tr>
                                <div class="section-testimonial">
                                    <th style="font-size:23px;">Section Testimonial</th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-block" name="is_testimonial" value="1" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting) ? ($setting->is_testimonial == 1 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-none" name="is_testimonial" value="0" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting) ? ($setting->is_testimonial == 0 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                </div>
                            </tr>

                            <tr>      
                                <div class="section-package">
                                    <th style="font-size:23px;">Section Paket</th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-block" name="is_package" value="1" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting) ? ($setting->is_package == 1 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-center">    
                                            <input type="radio" class="btn-check" id="d-none" name="is_package" value="0" style="height:28px; width:26px; vertical-align: middle;"
                                            {{ !empty($setting) ? ($setting->is_package == 0 ? 'checked' : '') : '' }}>
                                        </div>
                                    </th>
                                </div>
                            </tr>
                        </tbody>
                    </table>
            </div> 
                
            <div class="box-footer detail-page my-3 mx-4 d-flex justify-content-end" >
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
    }, 2000);

    $('#formAdd').validator().on('submit', function(e){
        if(! e.prevent.default()) {
            $.post($('$formAdd').attr('action'), $('#formAdd form').serialize())
                .done((response) => {
                    $('#modal-form').modal('hide');
                    Swal.fire({
                        title: 'Sukses!',
                        text: response,
                        icon: 'success',
                        confirmButtonText: 'Lanjut',
                        confirmButtonColor: '#28A745'
                    })
                    window.location.href;
                })
                .fail((errors) => {
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Kategori yang diinput sudah ada',
                        icon: 'error',
                        confirmButtonText: 'Kembali',
                        confirmButtonColor: '#DC3545'
                    })
                    window.location.href;
                return;
            });
        }
    })

    $.ajax({
        type: 'POST',
        url: '{{ route('setting.index') }}',
        data: data,
        success::function (data) {
            alert('The setting has been updated '+ data.name);
        },
        error: function () {
            alert(data.err);
        }
    });

</script>    
@endpush