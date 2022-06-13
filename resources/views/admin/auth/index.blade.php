

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Vismart Studio | Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="icon" type="image/png" href="../img/icon vismart.png"/>

        <!-- App css -->
        <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

        <style> 
            body {
                text-align: left;
            }
        </style>

    </head>

    <body class="account-body accountbg">

        <!-- Log In page -->
        <div class="container">
            <div class="row vh-100 d-flex justify-content-center">
                <div class="col-12 align-self-center">
                    <div class="row my-3">
                        <div class="col-lg-5 mx-auto">
                            <!-- @if(isset($error))
                            {{ $error }}
                            @endif -->
                            <div class="card">
                                <div class="card-body p-0 auth-header-box">
                                    <div class="text-center p-3">
                                        <h4 class="mt-3 mb-1 font-weight-semibold text-white font-18">Admin | Vismart Studio</h4>   
                                        <p class="text-muted  mb-0">Login untuk ke halaman Admin</p>  
                                    </div>
                                </div>
                                <div class="card-body">
                                    <ul class="nav-border nav nav-pills" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active font-weight-semibold" data-toggle="tab" href="#LogIn_Tab" role="tab">Log In</a>
                                        </li>
                                    </ul>
                                     <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active p-3 pt-3" id="LogIn_Tab" role="tabpanel">                                        
                                            <form class="form-horizontal auth-form my-4" method="POST" action="{{ route('auth.process') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <div class="input-group mb-3">                                                                                         
                                                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                                                    </div>                                    
                                                </div><!--end form-group--> 
                    
                                                <div class="form-group">
                                                    <label for="userpassword">Password</label>                                            
                                                    <div class="input-group mb-3">                                  
                                                        <input type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password">
                                                    </div>                               
                                                </div><!--end form-group-->  
                    
                                                <div class="form-group mb-0 row">
                                                    <div class="col-12 mt-2">
                                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Login <i class="fas fa-sign-in-alt ml-1"></i></button>
                                                    </div><!--end col--> 
                                                </div> <!--end form-group-->                           

                                                <div class="form-group mb-0 row">
                                                    <div class="col-12 mt-2">
                                                        <a href="/" class="btn btn-info btn-block waves-effect waves-light" type="button">Back <i class="fas fa-arrow-left ml-1"></i></a>
                                                    </div><!--end col--> 
                                                </div>

                                            </form><!--end form-->
                                        </div>
                                    </div>
                                </div><!--end card-body-->
                                <div class="card-body bg-light-alt text-center">
                                    <span class="text-muted d-none d-sm-inline-block">Vismart Studio © 2022</span>                                            
                                </div>
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
        <!-- End Log In page -->

        


        <!-- jQuery  -->
        <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/waves.js') }}"></script>
        <script src="{{ asset('admin/assets/js/feather.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/simplebar.min.js') }}"></script>

        
    </body>

</html>