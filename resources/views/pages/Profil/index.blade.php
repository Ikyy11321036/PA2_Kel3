@extends('template.layout')

@section('content')
<style>
    .card {
        background-color: #fff;
        border-radius: 5px;
        border: none;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .card-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .card-body {
        padding: 20px;
    }

    .float-end {
        float: right;
    }

    .img-fluid {
        max-width: 100%;
        height: auto;
    }

    .text-secondary {
        padding-top: 9px;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 15px;
    }

    .col-sm-3 {
        width: 25%;
        padding-right: 15px;
        padding-left: 15px;
        float: left;
    }
</style>

<div class="page-content-wrapper">

    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Profil</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('dashboard') }}">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Profil</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tabbable-line">
                    <!-- <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab1" data-bs-toggle="tab"> List View </a>
                                    </li>
                                    <li>
                                        <a href="#tab2" data-bs-toggle="tab"> Grid View </a>
                                    </li>
                                </ul> -->
                    <ul class="nav customtab nav-tabs" role="tablist">
                        <li class="nav-item"><a href="#tab1" class="nav-link active" data-bs-toggle="tab">Data
                                Pengguna</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active fontawesome-demo" id="tab1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-box">
                                        <div class="card-head">
                                            <header>Profil Pengguna</header>
                                            <div class="tools">
                                                <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                                <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                                <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                            </div>
                                        </div>
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-6">

                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Foto Profil</h5>
                                                                        @auth
                                                                        @if(Auth::user()->foto)
                                                                        <img src="{{ asset('fotodata/'.$pengguna->foto) }}" alt="Foto Profil" class="img-fluid">
                                                                        @else
                                                                        <img alt="" class="img-circle " style="width:150px;" src="{{ asset('user/user.png' . Auth::user()->photo) }}" />
                                                                        @endif
                                                                        @endauth
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Informasi Profil</h5>
                                                                        <div class="row mb-3">
                                                                            <div class="col-sm-4">
                                                                                <h6 class="mb-0">Nama Lengkap:</h6>
                                                                            </div>
                                                                            <div class="col-sm-8 text-secondary">
                                                                                @if(Auth::user()->role == 'admin')
                                                                                @if(empty($pengguna->username))
                                                                                -
                                                                                @else
                                                                                {{ $pengguna->username }}
                                                                                @endif
                                                                                @else
                                                                                @if(empty($pengguna->username))
                                                                                -
                                                                                @else
                                                                                {{ $pengguna->username }}
                                                                                @endif
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        @if($pengguna->role == 'admin')
                                                                        <div class="row mb-3">
                                                                            <div class="col-sm-4">
                                                                                <h6 class="mb-0">NIP:</h6>
                                                                            </div>
                                                                            <div class="col-sm-8 text-secondary">
                                                                                @if(empty($pengguna->nip))
                                                                                -
                                                                                @else
                                                                                {{ $pengguna->nip }}
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                        <div class="row mb-3">
                                                                            <div class="col-sm-4">
                                                                                <h6 class="mb-0">NISN:</h6>
                                                                            </div>
                                                                            <div class="col-sm-8 text-secondary">
                                                                                @if(empty($pengguna->nisn))
                                                                                -
                                                                                @else
                                                                                {{ $pengguna->nisn }}
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        <div class="row mb-3">
                                                                            <div class="col-sm-4">
                                                                                <h6 class="mb-0">Tempat/Tanggal Lahir:</h6>
                                                                            </div>
                                                                            <div class="col-sm-8 text-secondary">
                                                                                {{ $pengguna->tempat_lahir }}, {{ date('d F Y', strtotime($pengguna->kelahiran)) }}
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <div class="col-sm-4">
                                                                                <h6 class="mb-0">Jenis Kelamin:</h6>
                                                                            </div>
                                                                            <div class="col-sm-8 text-secondary">
                                                                                @if(empty($pengguna->jenis_kelamin))
                                                                                -
                                                                                @else
                                                                                {{ $pengguna->jenis_kelamin }}
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        @if($pengguna->role == 'admin')
                                                                        <div class="row mb-3">
                                                                            <div class="col-sm-4">
                                                                                <h6 class="mb-0">Pangkat/Golongan:</h6>
                                                                            </div>
                                                                            <div class="col-sm-8 text-secondary">
                                                                                @if(empty($pengguna->pangkat))
                                                                                -
                                                                                @else
                                                                                {{ $pengguna->pangkat }}
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <div class="col-sm-4">
                                                                                <h6 class="mb-0">Jabatan:</h6>
                                                                            </div>
                                                                            <div class="col-sm-8 text-secondary">
                                                                                @if(empty($pengguna->jabatan))
                                                                                -
                                                                                @else
                                                                                {{ $pengguna->jabatan }}
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        <div class="row mb-3">
                                                                            <div class="col-sm-4">
                                                                                <h6 class="mb-0">Agama:</h6>
                                                                            </div>
                                                                            <div class="col-sm-8 text-secondary">
                                                                                @if(empty($pengguna->agama))
                                                                                -
                                                                                @else
                                                                                {{ $pengguna->agama }}
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <div class="col-sm-4">
                                                                                <h6 class="mb-0">Alamat:</h6>
                                                                            </div>
                                                                            <div class="col-sm-8 text-secondary">
                                                                                @if(empty($pengguna->alamat))
                                                                                -
                                                                                @else
                                                                                {{ $pengguna->alamat }}
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        @if($pengguna->role == 'admin')
                                                                        <div class="row mb-3">
                                                                            <div class="col-sm-4">
                                                                                <h6 class="mb-0">TMT Menjabat:</h6>
                                                                            </div>
                                                                            <div class="col-sm-8 text-secondary">
                                                                                @if(empty($pengguna->menjabat))
                                                                                -
                                                                                @else
                                                                                {{ date('d F Y', strtotime($pengguna->menjabat)) }}
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <div class="col-sm-4">
                                                                                <h6 class="mb-0">Lulus Sertifikasi:</h6>
                                                                            </div>
                                                                            <div class="col-sm-8 text-secondary">
                                                                                @if(empty($pengguna->lulus_sertifikasi))
                                                                                -
                                                                                @else
                                                                                {{ $pengguna->lulus_sertifikasi }}
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        <div class="row mb-3">
                                                                            <div class="col-sm-4">
                                                                                <h6 class="mb-0">Motto:</h6>
                                                                            </div>
                                                                            <div class="col-sm-8 text-secondary">
                                                                                @if(empty($pengguna->motto))
                                                                                -
                                                                                @else
                                                                                {{ $pengguna->motto }}
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <div class="col-sm-4">
                                                                                <h6 class="mb-0">Email:</h6>
                                                                            </div>
                                                                            <div class="col-sm-8 text-secondary">
                                                                                @if(empty($pengguna->email))
                                                                                -
                                                                                @else
                                                                                {{ $pengguna->email }}
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <div class="col-sm-4">
                                                                                <h6 class="mb-0">Nomor Telepon: </h6>
                                                                            </div>
                                                                            <div class="col-sm-8 text-secondary">
                                                                                @if(empty($pengguna->telpon))
                                                                                -
                                                                                @else
                                                                                {{ $pengguna->telpon }}
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <a class="btn btn-success float-end" href="{{ route('profile.edit') }}">Edit Profil<i class="fa fa-gear"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

@endsection