@extends('admin.templates.header')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col">
                    <h4 class="page-title">Dashboard</h4>
                </div><!--end col-->
                {{-- <div class="col-auto align-self-center">
                    <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                        <span class="ay-name" id="Day_Name">Today:</span>&nbsp;
                        <span class="" id="Select_date">Jan 11</span>
                        <i data-feather="calendar" class="align-self-center icon-xs ml-1"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-outline-primary">
                        <i data-feather="download" class="align-self-center icon-xs"></i>
                    </a>
                </div><!--end col-->   --}}
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
                        <h3 class="my-2">0</h3>
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
                        <p class="text-dark mb-1 font-weight-semibold">Portofolio</p>
                        <h3 class="my-2">0</h3>
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
                        <p class="text-dark mb-1 font-weight-semibold">Klien</p>
                        <h3 class="my-2">0</h3>
                    </div>
                    <div class="col-auto align-self-center">
                        <div class="report-main-icon bg-light-alt">
                            <i data-feather="user" class="align-self-center text-muted icon-md"></i>  
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
                        <h3 class="my-2">0</h3>
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
</div><!--end row-->
@endsection