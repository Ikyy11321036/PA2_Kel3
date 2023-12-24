@extends('template.layout')

@section('content')
<style>
    .alert-danger {
        margin-top: 10px;
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
        padding: .75rem 1.25rem;
        border-radius: .25rem;
    }
</style>
<form action="" method="post"></form>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Edit Data</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('dashboard') }}">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{ route('profiluser') }}">Profil</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Edit Data</li>
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

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="tab-content">
                            <div class="tab-pane active fontawesome-demo" id="tab1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-box">
                                            <div class="card-head">
                                                <div class="tools">
                                                    <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                                </div>
                                            </div>
                                            <div class="container rounded bg-white mt-5 mb-5">
                                                <div class="row">
                                                    <div class="col-md-3 border-right">
                                                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="{{ asset('fotodata/'.$user->foto) }}"><span class="font-weight-bold"></span><span class="text-black-50"></span><span> </span></div>
                                                    </div>
                                                    <div class="col-md-5 border-right">
                                                        <div class="p-3 py-5">
                                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                                <h4 class="text-right">Ubah Profil</h4>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="col-md-6"><label class="labels" for="username">Nama Lengkap</label><input type="text" class="form-control" placeholder="Nama Lengkap" name="username" value="{{ $user->username }}"></div>
                                                                @error('username')
                                                                <div class="alert alert-danger my-3 col-sm-6" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                                <div class="col-md-6"><label class="labels" for="alamat">Alamat</label><input type="text" class="form-control" value="{{ $user->alamat }}" placeholder="Alamat" name="alamat"></div>
                                                                @error('alamat')
                                                                <div class="alert alert-danger my-3 col-sm-6 " role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="row mt-3">
                                                                <div class="col-md-12">
                                                                    <label class="labels" for="jenis_kelamin">Jenis Kelamin</label>
                                                                    <select class="form-control" name="jenis_kelamin">
                                                                        <option value="Laki-Laki" {{ $user->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                                                        <option value="Perempuan" {{ $user->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                                    </select>
                                                                    @error('jenis_kelamin')
                                                                    <div class="alert alert-danger my-3 col-sm-6 " role="alert">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                                @if(Auth::user()->role == 'admin')
                                                                <div class="col-md-12"><label class="labels" for="nip">NIP</label><input type="text" class="form-control" placeholder="NIP" value="{{ $user->nip }}" name="nip"></div>
                                                                @error('nip')
                                                                <div class="alert alert-danger my-3 col-sm-6 " role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                                @else
                                                                <div class="col-md-12"><label class="labels" for="nisn">NISN</label><input type="text" class="form-control" placeholder="NISN" value="{{ $user->nisn }}" name="nisn"></div>
                                                                @error('nisn')
                                                                <div class="alert alert-danger my-3 col-sm-6 " role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                                @endif
                                                                <div class="col-md-12"><label class="labels" for="no_telepon">Nomor Telepon</label><input type="text" class="form-control" placeholder="Nomor Telepon" value="{{ $user->no_telepon }}" name="no_telepon"></div>
                                                                @error('no_telepon')
                                                                <div class="alert alert-danger my-3 col-sm-6 " role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                                <div class="col-md-12"><label class="labels" for="tpt_lahir">Tempat Lahir</label><input type="text" class="form-control" placeholder="Tempat Lahir" value="{{ $user->tpt_lahir }}" name="tpt_lahir"></div>
                                                                @error('tpt_lahir')
                                                                <div class="alert alert-danger my-3 col-sm-6 " role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                                <div class="col-md-12"><label class="labels" for="tgl_lahir">Tanggal Lahir</label><input type="date" class="form-control" placeholder="Tanggal Lahir" value="{{ $user->tgl_lahir }}" name="tgl_lahir"></div>
                                                                @error('tgl_lahir')
                                                                <div class="alert alert-danger my-3 col-sm-6 " role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                                <div class="col-md-12"><label class="labels" for="agama">Agama</label><input type="text" class="form-control" placeholder="Agama" value="{{ $user->agama }}" name="agama"></div>
                                                                @error('agama')
                                                                <div class="alert alert-danger my-3 col-sm-6 " role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                                <div class="col-md-12"><label class="labels" for="foto">Gambar</label><input type="file" class="form-control" placeholder="Gambar" value="{{ $user->foto }}" name="foto"></div>
                                                                @error('foto')
                                                                <div class="alert alert-danger my-3 col-sm-6 " role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Ubah</button></div>
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
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
</form>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.slim.js" integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('form').submit(function(e) {
            e.preventDefault();
            var form = this;
            swal({
                title: "Berhasil",
                text: "Profil Berhasil Diperbaharui!",
                icon: "success",
            }).then(function() {
                form.submit();
            });
        });
    });
</script>

@endsection