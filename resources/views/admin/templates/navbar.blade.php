{{-- <style>
    #img {
        height: 51px;
        width: 51px;
        margin-top: 9px;
        position: relative;
        right: 20%;
    }

    #img2 {
        height: 21px;
        width: 21px;
    }

    #username {
        position: relative;
        font-size: 18px;
        right:15%;
        padding-top:20px;
        /* padding-left: 20px; */
    }
</style> --}}

<nav class="navbar-custom"> 
<<<<<<< HEAD
    <button class="nav-link button-menu-mobile">
        <i data-feather="menu" class="align-self-center topbar-icon"></i>
    </button>
=======
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
                <img src="/img/icon.png" alt="profile-user" class="mx-1 rounded-circle"></img>                                 
                <span class="ml-1 nav-user-name hidden-sm">{{ auth()->user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#"><i data-feather="user" class="align-self-center icon-xs icon-dual mr-1"></i> Profile</a>
                {{-- <a class="dropdown-item" href=""><i data-feather="settings" class="align-self-center icon-xs icon-dual mr-1"></i> Settings</a> --}}
                <div class="dropdown-divider mb-0"></div>
                <a class="dropdown-item" href="{{ route('auth.logout') }}"><i data-feather="power" class="align-self-center icon-xs icon-dual mr-1"></i> Logout</a>
            </div>
        </li>
    @php
        use App\Models\SettingDashboard;

        $setting = SettingDashboard::first();

        // $conn = mysqli_connect("localhost", "root", "", "vismartstudio");

        // $setting = "SELECT clock FROM setting_dashboard ";
    @endphp

    @if ($setting->clock == true)
        <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
    @endif
    </ul>        

>>>>>>> 361ba68d107eae5bd7eff509a4579bfee1cf4e40
</nav>