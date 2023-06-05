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
                            <div class="user-role">{{ Auth::user()->role }}</div>
                            @endauth
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
                            <a href="{{  route('dashboard') }}" class="nav-link ">
                                <span class="title">Dashboard</span>
                                @else
                                <a href="{{  route('guest') }}" class="nav-link ">
                                    <span class="title">Informasi Sekolah</span>
                                    @endauth
                                    <span class="selected"></span>
                                </a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a href="{{ route('event') }}" class="nav-link nav-toggle"> <i data-feather="calendar"></i>
                                <span class="title">Event Management</span>
                            </a>
                        </li>
                        @if(Auth::user()->role == 'admin')
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle"> <i data-feather="user"></i>
                                <span class="title">Data Pengguna</span> <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{ route('kepalasekolah') }}" class="nav-link "> <span class="title">Kepala Sekolah</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('teacher') }}" class="nav-link "> <span class="title">Guru</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('murid') }}" class="nav-link "> <span class="title">Siswa</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endauth
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle"><i data-feather="users"></i>
                                <span class="title">Siswa/i</span><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{  route('siswa') }}" class="nav-link "> <span class="title">Semua
                                            Siswa/i</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('absensisiswa') }}" class="nav-link "> <span class="title">Absensi
                                            Siswa</span>
                                    </a>
                                </li>
                            </ul>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle"> <i data-feather="book"></i>Mata Pelajaran</a>
                            </a> -->
                            <!-- <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="mapel" class="nav-link "> <span class="title">Mata Pelajaran</span>
                            </a>
                        </li>
                    </ul> -->
                    <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle"> <i data-feather="book"></i>
                                <span class="title">Mata Pelajaran</span> <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{ route('matapelajaransiswa') }}" class="nav-link "> <span class="title">Mata Pelajaran</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('indexsilabus') }}" class="nav-link "> <span class="title">Silabus</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle"> <i data-feather="book-open"></i>
                                <span class="title">Jadwal Kelas</span> <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{ route('matapelajaran') }}" class="nav-link "> <span class="title">Kelas 1</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('matapelajaran2') }}" class="nav-link "> <span class="title">Kelas 2</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('matapelajaran3') }}" class="nav-link "> <span class="title">Kelas 3</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('matapelajaran4') }}" class="nav-link "> <span class="title">Kelas 4</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('matapelajaran5') }}" class="nav-link "> <span class="title">Kelas 5</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('matapelajaran6') }}" class="nav-link "> <span class="title">Kelas 6</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle"> <i data-feather="briefcase"></i>
                                <span class="title">Info Sekolah</span> <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{ route('pengumuman') }}" class="nav-link "> <span class="title">Pengumuman</span>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="edit_department.html" class="nav-link "> <span class="title">Edit
                                            Department</span>
                                    </a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle">
                                <i data-feather="mail"></i>
                                <span class="title">Raport Siswa</span>
                                <span class="arrow"></span>
                                <!-- <span class="label label-rouded label-menu label-danger">new</span> -->
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{ route('raport') }}" class="nav-link ">
                                        <span class="title">Kelas 1</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('raport2') }}" class="nav-link ">
                                        <span class="title">Kelas 2</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('raport3') }}" class="nav-link ">
                                        <span class="title">Kelas 3</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('raport4') }}" class="nav-link ">
                                        <span class="title">Kelas 4</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('raport5') }}" class="nav-link ">
                                        <span class="title">Kelas 5</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('raport6') }}" class="nav-link ">
                                        <span class="title">Kelas 6</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li class="nav-item">
                            <a href="{{ route('guestaccess') }}" class="nav-link nav-toggle"> <i data-feather="calendar"></i>
                                <span class="title">Event Management</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle"> <i data-feather="user"></i>
                                <span class="title">Guru</span> <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{ route('guestaccess') }}" class="nav-link "> <span class="title">Organisasi
                                            Struktur</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('guestaccess') }}" class="nav-link "> <span class="title">Semua
                                            Guru</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle"><i data-feather="users"></i>
                                <span class="title">Siswa/i</span><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{ route('guestaccess') }}" class="nav-link "> <span class="title">Semua
                                            Siswa/i</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('guestaccess') }}" class="nav-link "> <span class="title">Absensi
                                            Siswa</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('guestaccess') }}" class="nav-link nav-toggle"> <i data-feather="book"></i>Mata Pelajaran</a>
                            </a>
                            <!-- <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="mapel" class="nav-link "> <span class="title">Mata Pelajaran</span>
                            </a>
                        </li>
                    </ul> -->
                        </li>
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
                                    <a href="{{ route('guestaccess') }}" class="nav-link "> <span class="title">Silabus Semua Mata Pelajaran</span>
                                    </a>
                                </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle"> <i data-feather="book-open"></i>
                                <span class="title">Jadwal Kelas</span> <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{ route('guestaccess') }}" class="nav-link "> <span class="title">Kelas 1</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('guestaccess') }}" class="nav-link "> <span class="title">Kelas 2</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('guestaccess') }}" class="nav-link "> <span class="title">Kelas 3</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('guestaccess') }}" class="nav-link "> <span class="title">Kelas 4</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('guestaccess') }}" class="nav-link "> <span class="title">Kelas 5</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('guestaccess') }}" class="nav-link "> <span class="title">Kelas 6</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle"> <i data-feather="briefcase"></i>
                                <span class="title">Info Sekolah</span> <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{ route('guestaccess') }}" class="nav-link "> <span class="title">Pengumuman</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('guestaccess') }}" class="nav-link "> <span class="title">Informasi Sekolah</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('guestaccess') }}" class="nav-link "> <span class="title">Edit
                                            Department</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle">
                                <i data-feather="mail"></i>
                                <span class="title">Nilai Siswa</span>
                                <span class="arrow"></span>
                                <!-- <span class="label label-rouded label-menu label-danger">new</span> -->
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{ route('guestaccess') }}" class="nav-link ">
                                        <span class="title">Kelas 1</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('guestaccess') }}" class="nav-link ">
                                        <span class="title">Kelas 2</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('guestaccess') }}" class="nav-link ">
                                        <span class="title">Kelas 3</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('guestaccess') }}" class="nav-link ">
                                        <span class="title">Kelas 4</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('guestaccess') }}" class="nav-link ">
                                        <span class="title">Kelas 5</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('guestaccess') }}" class="nav-link ">
                                        <span class="title">Kelas 6</span>
                                    </a>
                                </li>
                                @endauth
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>