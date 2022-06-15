<style>
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
</style>

<nav class="navbar-custom"> 
    

    {{-- <ul class="list-unstyled topbar-nav float-right mb-0">     
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu open">
            <a href="#" class="" data-toggle="dropdown">
                <img src="/img/icon.png" id="img" class="user-image images-profile"
                    alt="User Image">
            </a>
            <span id="username" class="hidden-xs mt-2">{{ auth()->user()->name }}</span>
            <ul class="dropdown-menu"> --}}
                <!-- User image -->
                {{-- <li class="user-header">
                    <img src="/img/icon.png" id="img2" class="img-circle images-profile"
                        alt="User Image">
                    <p>
                        <b>Username</b> : {{ auth()->user()->username }}
                    </p>
                </li> --}}
                <!-- Menu Footer-->
                {{-- <li class="user-footer">
                    <div class=""> --}}
                        {{-- <a href="{{ route('user.profile') }}" class="btn btn-success btn-flat btn-sm"><i class="fa fa-pen-to-square"></i> Update Profile</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}
                        {{-- <a href="{{ route('auth.logout') }}" class="btn btn-danger btn-flat btn-sm"
                            onclick="$('#logout-form').submit()"><i class="fa fa-arrow-right-from-bracket"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </li> --}}

        <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
    </ul>        

</nav>