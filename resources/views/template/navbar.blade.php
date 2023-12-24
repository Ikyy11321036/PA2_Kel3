<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <!-- logo start -->
        @auth
        <div class="page-logo">
            <a href="{{ ('dashboard') }}">
                <span class="logo-icon material-icons fa-rotate-45">school</span>
                <span class="logo-default">Kursus</span> </a>
        </div>
        @else
        <div class="page-logo">
            <a href="{{ ('guest') }}">
                <span class="logo-icon material-icons fa-rotate-45">school</span>
                <span class="logo-default">Kursus</span> </a>
        </div>
        @endauth
        <!-- logo end -->
        <ul class="nav navbar-nav navbar-left in">
            <li><a href="#" class="menu-toggler sidebar-toggler"><i data-feather="menu"></i></a></li>
        </ul>
       
        <!-- start mobile menu -->
        <a class="menu-toggler responsive-toggler" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
            <span></span>
        </a>

        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <li><a class="fullscreen-btn"><i data-feather="maximize"></i></a></li>
                <!-- start language menu -->
                <li class="dropdown language-switch">
                    
                </li>
                
                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-bs-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        @auth
                        @if(Auth::user()->role == 'admin')
                        <img alt="" class="img-circle " src="{{ asset('fotodata/' . Auth::user()->foto) }}" />
                        @else
                        <img alt="" class="img-circle " src="{{ asset('fotodata/' . Auth::user()->foto) }}" />
                        @endif
                        @else
                        <img alt="" class="img-circle " src="../slash/slash.png" />
                        @endauth
                        @auth
                        <span class="username username-hide-on-mobile"> {{ Auth::user()->username }}
                            @endauth
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        @auth
                        <li>
                            <a href="{{ route('profiluser') }}">
                                <i class="icon-user"></i> Profil </a>
                        </li>
                        @else
                        <li>
                            <a href="{{ route('guestaccess') }}">
                                <i class="icon-user"></i> Profil </a>
                        </li>
                        @endauth
                        @auth
                        <li>
                            <a href="{{ route('password.change') }}">
                                <i class="icon-settings"></i> Ubah Sandi
                            </a>
                        </li>
                        @else
                        <li>
                            <a href="{{ route('guestaccess') }}">
                                <i class="icon-settings"></i> Ubah Sandi
                            </a>
                        </li>
                        @endauth
                        @auth
                        <li class="divider"> </li>
                        <li>
                            <a href="{{ route('logout') }}">
                                <i class="icon-logout"></i> Log Out </a>
                        </li>
                        @else
                        <li class="divider"> </li>
                        <li>
                            <a href="{{ route('login') }}">
                                <i class="icon-login"></i> Login </a>
                        </li>
                        @endauth
                    </ul>
                </li>
                
            </ul>
        </div>
    </div>
</div>