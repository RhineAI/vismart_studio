@extends('admin.main')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col">
                    <h4 class="page-title">Dashboard</h4>
                </div><!--end col-->
            </div><!--end row-->                                                              
        </div><!--end page-title-box-->
    </div><!--end col-->
</div><!--end row-->
<!-- end page title end breadcrumb -->
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-3">
        <div class="card report-card">
            <div class="card-body">
                <div class="row d-flex justify-content-center">
                    <div class="col">
                        <p class="text-dark mb-1 font-weight-semibold">Layanan</p>
                        <h3 class="my-2">{{ $layanan }}</h3>
                    </div>
                    <div class="col-auto align-self-center">
                        <div class="report-main-icon bg-light-alt">
                            <i data-feather="inbox" class="align-self-center text-muted icon-md"></i>  
                        </div>
                    </div>
                </div>
            </div><!--end card-body--> 
        </div><!--end card--> 
    </div> <!--end col--> 
    <div class="col-md-6 col-lg-3">
        <div class="card report-card">
            <div class="card-body">
                <div class="row d-flex justify-content-center">
                    <div class="col">  
                        <p class="text-dark mb-1 font-weight-semibold">Paket</p>                                         
                        <h3 class="my-2">{{ $paket }}</h3>
                    </div>
                    <div class="col-auto align-self-center">
                        <div class="report-main-icon bg-light-alt">
                            <i data-feather="shopping-bag" class="align-self-center text-muted icon-md"></i>  
                        </div>
                    </div> 
                </div>
            </div><!--end card-body--> 
        </div><!--end card--> 
    </div> <!--end col-->       
    <div class="col-md-6 col-lg-3">
        <div class="card report-card">
            <div class="card-body">
                <div class="row d-flex justify-content-center">                                                
                    <div class="col">
                        <p class="text-dark mb-1 font-weight-semibold">Portofolio</p>
                        <h3 class="my-2">{{ $portofolio }}</h3>
                    </div>
                    <div class="col-auto align-self-center">
                        <div class="report-main-icon bg-light-alt">
                            <i data-feather="grid" class="align-self-center text-muted icon-md"></i>  
                        </div>
                    </div> 
                </div>
            </div><!--end card-body--> 
        </div><!--end card--> 
    </div> <!--end col--> 
    <div class="col-md-6 col-lg-3">
        <div class="card report-card">
            <div class="card-body">
                <div class="row d-flex justify-content-center">                                                
                    <div class="col">
                        <p class="text-dark mb-1 font-weight-semibold">Testimonial</p>
                        <h3 class="my-2">{{ $testimonial }}</h3>
                    </div>
                    <div class="col-auto align-self-center">
                        <div class="report-main-icon bg-light-alt">
                            <i data-feather="message-circle" class="align-self-center text-muted icon-md"></i>  
                        </div>
                    </div> 
                </div>
            </div><!--end card-body--> 
        </div><!--end card--> 
    </div> <!--end col-->                         
</div><!--end row-->
@endsection