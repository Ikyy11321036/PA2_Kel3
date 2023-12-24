<div class="settingSidebar">
    <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
    </a>
    <div class="settingSidebar-body ps-container ps-theme-default">
        <div class=" fade show active">
            <div class="setting-panel-header">Setting Panel
            </div>
            <div class="quick-setting slimscroll-style">
                <ul id="themecolors">
                    <li>
                        <p class="sidebarSettingTitle">Sidebar Color</p>
                    </li>
                    <li class="complete">
                        <div class="theme-color sidebar-theme">
                            <a href="#" data-theme="white"><span class="head"></span><span class="cont"></span></a>
                            <a href="#" data-theme="dark"><span class="head"></span><span class="cont"></span></a>
                            <a href="#" data-theme="blue"><span class="head"></span><span class="cont"></span></a>
                            <a href="#" data-theme="indigo"><span class="head"></span><span class="cont"></span></a>
                            <a href="#" data-theme="cyan"><span class="head"></span><span class="cont"></span></a>
                            <a href="#" data-theme="green"><span class="head"></span><span class="cont"></span></a>
                            <a href="#" data-theme="red"><span class="head"></span><span class="cont"></span></a>
                        </div>
                    </li>
                    <li>
                        <p class="sidebarSettingTitle">Header Brand color</p>
                    </li>
                    <li class="theme-option">
                        <div class="theme-color logo-theme">
                            <a href="#" data-theme="logo-white"><span class="head"></span><span class="cont"></span></a>
                            <a href="#" data-theme="logo-dark"><span class="head"></span><span class="cont"></span></a>
                            <a href="#" data-theme="logo-blue"><span class="head"></span><span class="cont"></span></a>
                            <a href="#" data-theme="logo-indigo"><span class="head"></span><span class="cont"></span></a>
                            <a href="#" data-theme="logo-cyan"><span class="head"></span><span class="cont"></span></a>
                            <a href="#" data-theme="logo-green"><span class="head"></span><span class="cont"></span></a>
                            <a href="#" data-theme="logo-red"><span class="head"></span><span class="cont"></span></a>
                        </div>
                    </li>
                    <li>
                        <p class="sidebarSettingTitle">Header color</p>
                    </li>
                    <li class="theme-option">
                        <div class="theme-color header-theme">
                            <a href="#" data-theme="header-white"><span class="head"></span><span class="cont"></span></a>
                            <a href="#" data-theme="header-dark"><span class="head"></span><span class="cont"></span></a>
                            <a href="#" data-theme="header-blue"><span class="head"></span><span class="cont"></span></a>
                            <a href="#" data-theme="header-indigo"><span class="head"></span><span class="cont"></span></a>
                            <a href="#" data-theme="header-cyan"><span class="head"></span><span class="cont"></span></a>
                            <a href="#" data-theme="header-green"><span class="head"></span><span class="cont"></span></a>
                            <a href="#" data-theme="header-red"><span class="head"></span><span class="cont"></span></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="sidebar-container">
    <div class="sidemenu-container navbar-collapse collapse fixed-menu">
        <div id="remove-scroll" class="left-sidemenu">
            <ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                </li>
                <li class="sidebar-user-panel">
                    <div class="sidebar-user">
                        <div class="sidebar-user-picture">
                            @auth
                            @if(Auth::user()->role == 'admin')
                            <img alt="" class="img-circle " src="{{ asset('fotodata/' . Auth::user()->foto) }}" />
                            @else
                            <img alt="" class="img-circle " src="{{ asset('fotodata/' . Auth::user()->foto) }}" />
                            @endif
                            @else
                            <img alt="" class="img-circle " src="../slash/slash.png" />
                            @endauth
                        </div>
                        <div class="sidebar-user-details">
                            @auth
                            <div class="user-name">{{ Auth::user()->username }}</div>
                            @if(Auth::user()->role === 'admin')
                            @if(Auth::user()->jabatan === 'Kepala Sekolah')
                            <div class="user-jabatan">Kepala Sekolah</div>
                            @elseif(Auth::user()->jabatan === 'Guru')
                            <div class="user-jabatan">Guru</div>
                            @else
                            <div>Siswa</div>
                            @endif
                            @elseif(Auth::user()->role === 'guru')
                            <div class="user-jabatan">Guru</div>
                            @else
                            <div>Siswa</div>
                            @endif
                            @endif
                        </div>
                    </div>
                </li>
                <li class="nav-item start active open">
                    <a href="#" class="nav-link nav-toggle">
                        <i data-feather="airplay"></i>
                        <span class="title">Home</span>
                        <span class="selected"></span>
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            @auth
                            <a href="{{  route('dashboard') }}" class="nav-link "> <i data-feather="home"></i>
                                <span class="title">Dashboard</span>
                                @else
                                <a href="{{  route('guest') }}" class="nav-link "> <i data-feather="home"></i>
                                    <span class="title">Informasi Sekolah</span>
                                    @endauth
                                    <span class="selected"></span>
                                </a>
                        </li>
                        @auth
                        
                        @if(Auth::user()->role == 'admin')
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle"> <i data-feather="user"></i>
                                <span class="title">Pengguna Kursus</span> <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                
                                <li class="nav-item">
                                    <a href="{{ route('murid') }}" class="nav-link "> <span class="title">Pengguna</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endauth
                        
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle"> <i data-feather="book"></i>
                                <span class="title">Kursus</span> <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{ route('matapelajaransiswa') }}" class="nav-link "> <span class="title">Kursus</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('indexsilabus') }}" class="nav-link "> <span class="title">Materi</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                </li>
                
                @else
                <ul class="sub-menu">
                    
                    
                    <li class="nav-item">
                        <a href="#" class="nav-link nav-toggle"> <i data-feather="book"></i>
                            <span class="title">Mata Pelajaran</span> <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('guestaccess') }}" class="nav-link "> <span class="title">Mata Pelajaran</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('guestaccess') }}" class="nav-link "> <span class="title">Silabus</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </li>
                    
                </ul>
                </li>
            </ul>
            </li>
            </ul>
            @endauth
            </ul>
            </li>
            </ul>
            </li>
            </ul>
        </div>
    </div>
</div>