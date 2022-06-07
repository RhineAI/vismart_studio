
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Dastyle - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">

        <!-- jvectormap -->
        <link href="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet">

        <!-- App css -->
        <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/css/jquery-ui.min.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Font Awesome -->  
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

        <!-- Bootstrap Icons -->  
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/js/bootstrap.min.js">

        <!-- Feather Icons -->  
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js">

        <!-- DataTables -->
        <link href="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{ asset('admin/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body class="dark-sidenav">
        <!-- Left Sidenav -->
        <div class="left-sidenav">
            <!-- LOGO -->
            <div class="brand">
                <a href="dashboard/crm-index.html" class="logo text-white" style="font-size: 2em;">
                    <b>Vismart Studio</b>
                </a>
            </div>
            <!--end logo-->
            <div class="menu-content h-100" data-simplebar>
                <ul class="metismenu left-sidenav-menu">
                    <li class="menu-label mt-0">Menu</li>
                    
                    {{-- Dashboard --}}
                    <li>
                        <a href=""> 
                            <i data-feather="home" class="align-self-center menu-icon"></i>
                            <span>Dashboard</span>
                            <span class="menu-arrow"></span>
                        </a>
                    </li>

                    {{-- Service --}}
                    <li>
                        <a href="javascript: void(0);">
                            <i data-feather="inbox" class="align-self-center menu-icon"></i>
                            <span>Layanan</span>
                            <span class="menu-arrow"></span>
                        </a>
                    </li>

                    {{-- Testimonial --}}
                    <li>
                        <a href="{{ route('testimonial.index') }}">
                            <i data-feather="user-plus" class="align-self-center menu-icon"></i>
                            <span>Testimoni</span>
                            <span class="menu-arrow"></span>
                        </a>
                    </li>

                    {{-- Portofolio --}}
                    <li>
                        <a href="{{ route('portofolio.index') }}">
                            <i data-feather="grid" class="align-self-center menu-icon"></i>
                            <span>Portofolio</span>
                            <span class="menu-arrow"></span>
                        </a>
                    </li>

                    {{-- Client --}}
                    <li>
                        <a href="javascript: void(0);">
                            <i data-feather="user" class="align-self-center menu-icon"></i>
                            <span>Klien</span>
                            <span class="menu-arrow"></span>
                        </a>
                    </li>

                    {{-- Package --}}
                    <li>
                        <a href="javascript: void(0);">
                            <i data-feather="shopping-bag" class="align-self-center menu-icon"></i>
                            <span>Paket</span>
                            <span class="menu-arrow">
                                <i class="mdi mdi-chevron-right"></i>
                            </span>
                        </a>

                        <ul class="nav-second-level" aria-expanded="false">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('package.index') }}">
                                    <i class="ti-control-record"></i>
                                    List Paket
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('package-feature.index') }}">
                                    <i class="ti-control-record"></i>
                                    List Fitur
                                </a>
                            </li>

                        </ul>
                    </li> 

                    {{-- Advantage --}}
                    <li>
                        <a href="{{ route('advantage.index') }}">
                            <i data-feather="award" class="align-self-center menu-icon"></i>
                            <span>Keunggulan</span>
                            <span class="menu-arrow"></span>
                        </a>
                    </li>

                    {{-- Module --}}
                    <li>
                        <a href="javascript: void(0);">
                            <i data-feather="list" class="align-self-center menu-icon"></i>
                            <span>List Module</span>
                            <span class="menu-arrow"></span>
                        </a>
                    </li>

            {{--    Lainnya    --}}
    
                    <hr class="hr-dashed hr-menu">
                    <li class="menu-label my-2">Lainnya</li>

                    {{-- User --}}
                    <li>
                        <a href="javascript: void(0);">
                            <i data-feather="users" class="align-self-center menu-icon"></i>
                            <span>Pengguna</span>
                            <span class="menu-arrow"></span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i data-feather="edit" class="align-self-center menu-icon"></i>
                            <span>Edit Profile</span>
                            <span class="menu-arrow"></span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i data-feather="log-out" class="align-self-center menu-icon"></i>
                            <span>Logout</span>
                            <span class="menu-arrow"></span>
                        </a>
                    </li>
            </div>
        </div>
        <!-- end left-sidenav-->
        

        <div class="page-wrapper">
            <!-- Top Bar Start -->
            <div class="topbar">            
                <!-- Navbar -->
                <nav class="navbar-custom">    
                    <ul class="list-unstyled topbar-nav float-right mb-0">         
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <i data-feather="bell" class="align-self-center topbar-icon"></i>
                                <span class="badge badge-danger badge-pill noti-icon-badge">2</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-lg pt-0">
                            
                                <h6 class="dropdown-item-text font-15 m-0 py-3 border-bottom d-flex justify-content-between align-items-center">
                                    Notifications <span class="badge badge-primary badge-pill">2</span>
                                </h6> 
                                <div class="notification-menu" data-simplebar>
                                    <!-- item-->
                                    <a href="#" class="dropdown-item py-3">
                                        <small class="float-right text-muted pl-2">2 min ago</small>
                                        <div class="media">
                                            <div class="avatar-md bg-soft-primary">
                                                <i data-feather="shopping-cart" class="align-self-center icon-xs"></i>
                                            </div>
                                            <div class="media-body align-self-center ml-2 text-truncate">
                                                <h6 class="my-0 font-weight-normal text-dark">Your order is placed</h6>
                                                <small class="text-muted mb-0">Dummy text of the printing and industry.</small>
                                            </div><!--end media-body-->
                                        </div><!--end media-->
                                    </a><!--end-item-->
                                    <!-- item-->
                                    <a href="#" class="dropdown-item py-3">
                                        <small class="float-right text-muted pl-2">10 min ago</small>
                                        <div class="media">
                                            <div class="avatar-md bg-soft-primary">
                                                <img src="{{ asset('admin/assets/images/users/user-4.jpg') }}" alt="" class="thumb-sm rounded-circle">
                                            </div>
                                            <div class="media-body align-self-center ml-2 text-truncate">
                                                <h6 class="my-0 font-weight-normal text-dark">Meeting with designers</h6>
                                                <small class="text-muted mb-0">It is a long established fact that a reader.</small>
                                            </div><!--end media-body-->
                                        </div><!--end media-->
                                    </a><!--end-item-->
                                    <!-- item-->
                                    <a href="#" class="dropdown-item py-3">
                                        <small class="float-right text-muted pl-2">40 min ago</small>
                                        <div class="media">
                                            <div class="avatar-md bg-soft-primary">                                                    
                                                <i data-feather="users" class="align-self-center icon-xs"></i>
                                            </div>
                                            <div class="media-body align-self-center ml-2 text-truncate">
                                                <h6 class="my-0 font-weight-normal text-dark">UX 3 Task complete.</h6>
                                                <small class="text-muted mb-0">Dummy text of the printing.</small>
                                            </div><!--end media-body-->
                                        </div><!--end media-->
                                    </a><!--end-item-->
                                    <!-- item-->
                                    <a href="#" class="dropdown-item py-3">
                                        <small class="float-right text-muted pl-2">1 hr ago</small>
                                        <div class="media">
                                            <div class="avatar-md bg-soft-primary">
                                                <img src="{{ asset('admin/assets/images/users/user-5.jpg') }}" alt="" class="thumb-sm rounded-circle">
                                            </div>
                                            <div class="media-body align-self-center ml-2 text-truncate">
                                                <h6 class="my-0 font-weight-normal text-dark">Your order is placed</h6>
                                                <small class="text-muted mb-0">It is a long established fact that a reader.</small>
                                            </div><!--end media-body-->
                                        </div><!--end media-->
                                    </a><!--end-item-->
                                    <!-- item-->
                                    <a href="#" class="dropdown-item py-3">
                                        <small class="float-right text-muted pl-2">2 hrs ago</small>
                                        <div class="media">
                                            <div class="avatar-md bg-soft-primary">
                                                <i data-feather="check-circle" class="align-self-center icon-xs"></i>
                                            </div>
                                            <div class="media-body align-self-center ml-2 text-truncate">
                                                <h6 class="my-0 font-weight-normal text-dark">Payment Successfull</h6>
                                                <small class="text-muted mb-0">Dummy text of the printing.</small>
                                            </div><!--end media-body-->
                                        </div><!--end media-->
                                    </a><!--end-item-->
                                </div>
                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                                    View all <i class="fi-arrow-right"></i>
                                </a>
                            </div>
                        </li>

                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <span class="ml-1 nav-user-name hidden-sm">Nick</span>
                                <img src="{{ asset('admin/assets/images/users/user-5.jpg') }}" alt="profile-user" class="rounded-circle" />                                 
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i data-feather="user" class="align-self-center icon-xs icon-dual mr-1"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings" class="align-self-center icon-xs icon-dual mr-1"></i> Settings</a>
                                <div class="dropdown-divider mb-0"></div>
                                <a class="dropdown-item" href="#"><i data-feather="power" class="align-self-center icon-xs icon-dual mr-1"></i> Logout</a>
                            </div>
                        </li>
                    </ul><!--end topbar-nav-->        
                </nav>
                <!-- end navbar-->
            </div>
            <!-- Top Bar End -->

            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                    <!-- Page-Title -->
                    
                    @yield('content')

                </div><!-- container -->

                @include('admin.templates.footer')