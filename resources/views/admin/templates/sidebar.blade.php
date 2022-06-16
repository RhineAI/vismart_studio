        <!-- Left Sidenav -->
        <div class="left-sidenav">
            <!-- LOGO -->
            <div class="brand">
                <a href="http://127.0.0.1:8000/" class="logo text-white" style="font-size: 2em;">
                    <b>Vismart Studio</b>
                </a>
            </div>
            <!--end logo-->
            <div class="menu-content h-100" data-simplebar>
                <ul class="metismenu left-sidenav-menu">
                    <li class="menu-label mt-0">Menu</li>
                    
                    {{-- Dashboard --}}
                    <li>
                        <a class="nav-link {{ Request::is('/dashboard*') ? 'active' : '' }}" href="/dashboard"> 
                            <i data-feather="home" class="align-self-center menu-icon"></i>
                            <span>Dashboard</span>
                            <span class="menu-arrow"></span>
                        </a>
                    </li>

                    {{-- Service --}}
                    <li>
                        <a class="nav-link {{ Request::is('dashboard/layanan*') ? 'active' : '' }}" href="#">
                            <i data-feather="inbox" class="align-self-center menu-icon"></i>
                            <span>Layanan</span>
                            <span class="menu-arrow">
                                <i class="mdi mdi-chevron-right"></i>
                            </span>
                        </a>

                        <ul class="nav-second-level" aria-expanded="false">
                            <li class="nav-item">
                                <a href="{{ route('service.index') }}">
                                    <i class="ti-control-record"></i>
                                    Utama
                                </a>
                            </li>

                            <li class="nav-item">
                                <a  href="{{ route('jasa.index') }}">
                                    <i class="ti-control-record"></i>
                                    Jasa 
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="{{ route('advantage.index') }}">
                                    <i class="ti-control-record"></i>
                                    Keunggulan
                                </a>
                            </li> 
                            
                            <li class="nav-item">
                                <a href="{{ route('detail_layanan.index') }}">
                                    <i class="ti-control-record"></i>
                                    Detail Layanan
                                </a>
                            </li>
                            

                        </ul>
                    </li> 

                    {{-- Article --}}
                    <li>
                        <a class="nav-link {{ Request::is('dashboard/article*') ? 'active' : '' }}" href="#">
                            <i data-feather="book-open" class="align-self-center menu-icon"></i>
                            <span>Artikel</span>
                            <span class="menu-arrow">
                                <i class="mdi mdi-chevron-right"></i>
                            </span>
                        </a>

                        <ul class="nav-second-level" aria-expanded="false">
                            <li class="nav-item">
                                <a href="{{ route('article.index') }}">
                                    <i class="ti-control-record"></i>
                                    Buat Artikel
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('categories.index') }}">
                                    <i class="ti-control-record"></i>
                                    Kategori
                                </a>
                            </li>

                        </ul>
                    </li>

                    {{-- Testimonial --}}
                    <li>
                        <a class="nav-link {{ Request::is('dashboard/testimonial*') ? 'active' : '' }}" href="{{ route('testimonial.index') }}">
                            <i data-feather="message-circle" class="align-self-center menu-icon"></i>
                            <span>Testimoni</span>
                            <span class="menu-arrow"></span>
                        </a>
                    </li>

                    {{-- Portofolio --}}
                    <li>
                        <a class="nav-link {{ Request::is('dashboard/portofolio*') ? 'active' : '' }}" href="{{ route('portofolio.index') }}">
                            <i data-feather="grid" class="align-self-center menu-icon"></i>
                            <span>Portofolio</span>
                            <span class="menu-arrow"></span>
                        </a>
                    </li>

                    {{-- Client --}}
                    <li>
                        <a class="nav-link {{ Request::is('dashboard/client*') ? 'active' : '' }}" href="/dashboard/client">
                            <i data-feather="user" class="align-self-center menu-icon"></i>
                            <span>Klien</span>
                            <span class="menu-arrow"></span>
                        </a>
                    </li>

                    {{-- Package --}}
                    <li>
                        <a class="  nav-link {{ Request::is('dashboard/package*') ? 'active' : '' }}
                                    nav-link {{ Request::is('dashboard/feature*') ? 'active' : '' }}" 
                            class="nav-link" href="#">
                            <i data-feather="package" class="align-self-center menu-icon"></i>
                            <span>Paket</span>
                            <span class="menu-arrow">
                                <i class="mdi mdi-chevron-right"></i>
                            </span>
                        </a>

                        <ul class="nav-second-level" aria-expanded="false">
                            <li class="nav-item">
                                <a href="{{ route('package.index') }}">
                                    <i class="ti-control-record"></i>
                                    List Paket
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('feature.index') }}">
                                    <i class="ti-control-record"></i>
                                    List Fitur
                                </a>
                            </li>

                        </ul>
                    </li> 

                    {{-- Advantage --}}
                    <li>
                        <a class="nav-link {{ Request::is('dashboard/advantage*') ? 'active' : '' }}" href="{{ route('advantage.index') }}">
                            <i data-feather="award" class="align-self-center menu-icon"></i>
                            <span>Keuntungan</span>
                            <span class="menu-arrow"></span>
                        </a>
                    </li>

                    {{-- Categories --}}
                    {{-- <li>
                        <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
                            <i data-feather="layers" class="align-self-center menu-icon"></i>
                            <span>Kategori</span>
                            <span class="menu-arrow"></span>
                        </a>
                    </li> --}}


                    {{--    Lainnya    --}}
    
                    <hr class="hr-dashed hr-menu">
                    <li class="menu-label my-2">Lainnya</li>

                    {{-- Users --}}
                    <li>
                        <a href="{{ route('user.index') }}">
                            <i data-feather="users" class="align-self-center menu-icon"></i>
                            <span>Pengguna</span>
                            <span class="menu-arrow"></span>
                        </a>
                    </li>

                    {{-- Setting --}}
                    <li>
                        <a href="{{ route('setting.index') }}">
                            <i data-feather="settings" class="align-self-center menu-icon"></i>
                            <span>Pengaturan</span>
                            <span class="menu-arrow"></span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('auth.logout') }}">
                            <i data-feather="log-out" class="align-self-center menu-icon"></i>
                            <span>Logout</span>
                            <span class="menu-arrow"></span>
                        </a>
                    </li>
            </div>
        </div>
        <!-- end left-sidenav-->
