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
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-6">
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                                                <div class="container">
                                                    <form class="form-horizontal">
                                                        <fieldset>
                                                            <legend>Masukkan Data</legend>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-2" for="username">Nama Lengkap</label>
                                                                <div class="col-sm-6">
                                                                    <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}" placeholder="Nama Lengkap" class="form-control @error('username') is-invalid @enderror">
                                                                </div>
                                                                @error('username')
                                                                <div class="alert alert-danger my-3 col-sm-6" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-2" for="alamat">Alamat</label>
                                                                <div class="col-sm-6">
                                                                    <input type="text" name="alamat" id="alamat" value="{{ old('alamat', $user->alamat) }}" placeholder="Alamat" class="form-control @error('alamat') is-invalid @enderror">
                                                                </div>
                                                                @error('alamat')
                                                                <div class="alert alert-danger my-3 col-sm-6 " role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
																<label class="control-label col-sm-2" for="jenis_kelamin">Jenis Kelamin</label>
																<div class="col-sm-6">
																<select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin">
																	<option value="" disabled selected>Pilih Jenis Kelamin</option>
																	<option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
																	<option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
																</select>
																</div>
																@error('jenis_kelamin')
                                                                <div class="alert alert-danger my-3 col-sm-6" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
															</div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-2" for="telpon">Nomor Telepon</label>
                                                                <div class="col-sm-6">
                                                                    <input type="number" name="telpon" id="telpon" value="{{ old('telpon', $user->telpon) }}" placeholder="+62" class="form-control @error('telpon') is-invalid @enderror">
                                                                </div>
                                                                @error('telpon')
                                                                <div class="alert alert-danger my-3 col-sm-6" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            @if(Auth::user()->role == 'admin')
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-2" for="nip">NIP</label>
                                                                <div class="col-sm-6">
                                                                    <input type="number" name="nip" id="nip" value="{{ old('nip', $user->nip) }}" placeholder="NIP" class="form-control @error('nip') is-invalid @enderror">
                                                                </div>
                                                                @error('nip')
                                                                <div class="alert alert-danger my-3 col-sm-6" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            @endif
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-2" for="tempat_lahir">Tempat Kelahiran</label>
                                                                <div class="col-sm-6">
                                                                    <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir', $user->tempat_lahir) }}" placeholder="Tempat Lahir" class="form-control @error('tempat_lahir') is-invalid @enderror">
                                                                </div>
                                                                @error('tempat_lahir')
                                                                <div class="alert alert-danger my-3 col-sm-6" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-2" for="kelahiran">Tanggal Lahir</label>
                                                                <div class="col-sm-6">
                                                                    <input type="date" name="kelahiran" id="kelahiran" value="{{ old('kelahiran', $user->kelahiran) }}" placeholder="Tanggal Lahir" class="form-control @error('kelahiran') is-invalid @enderror">
                                                                </div>
                                                                @error('kelahiran')
                                                                <div class="alert alert-danger my-3 col-sm-6" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            @if(Auth::user()->role == 'admin')
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-2" for="pangkat">Pangkat/Golongan</label>
                                                                <div class="col-sm-6">
                                                                    <input type="text" name="pangkat" id="pangkat" value="{{ old('pangkat', $user->pangkat) }}" placeholder="Pangkat/Golongan" class="form-control @error('pangkat') is-invalid @enderror">
                                                                </div>
                                                                @error('pangkat')
                                                                <div class="alert alert-danger my-3 col-sm-6" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-2" for="jabatan">Jabatan</label>
                                                                <div class="col-sm-6">
                                                                    <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan', $user->jabatan) }}" placeholder="Jabatan" class="form-control @error('jabatan') is-invalid @enderror">
                                                                </div>
                                                                @error('jabatan')
                                                                <div class="alert alert-danger my-3 col-sm-6" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            @endif
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-2" for="agama">Agama</label>
                                                                <div class="col-sm-6">
                                                                    <input type="text" name="agama" id="agama" value="{{ old('agama', $user->agama) }}" placeholder="Agama" class="form-control @error('agama') is-invalid @enderror">
                                                                </div>
                                                                @error('agama')
                                                                <div class="alert alert-danger my-3 col-sm-6" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            @if(Auth::user()->role == 'admin')
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-2" for="menjabat">TMT Menjabat</label>
                                                                <div class="col-sm-6">
                                                                    <input type="date" name="menjabat" id="menjabat" value="{{ old('menjabat', $user->menjabat) }}" placeholder="TMT Menjabat" class="form-control @error('menjabat') is-invalid @enderror">
                                                                </div>
                                                                @error('menjabat')
                                                                <div class="alert alert-danger my-3 col-sm-6" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-2" for="lulus_sertifikasi">Lulus Sertifikasi</label>
                                                                <div class="col-sm-6">
                                                                    <input type="text" name="lulus_sertifikasi" id="lulus_sertifikasi" value="{{ old('lulus_sertifikasi', $user->lulus_sertifikasi) }}" placeholder="Lulus Sertifikasi" class="form-control @error('lulus_sertifikasi') is-invalid @enderror">
                                                                </div>
                                                                @error('lulus_sertifikasi')
                                                                <div class="alert alert-danger my-3 col-sm-6" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            @endif
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-2" for="motto">Motto</label>
                                                                <div class="col-sm-6">
                                                                    <input type="text" name="motto" id="motto" value="{{ old('motto', $user->motto) }}" placeholder="Motto" class="form-control @error('motto') is-invalid @enderror">
                                                                </div>
                                                                @error('motto')
                                                                <div class="alert alert-danger my-3 col-sm-6" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-2" for="photo">Photo</label>
                                                                <div class="col-sm-6">
                                                                    <input type="file" name="photo" id="photo" class="form-control-file @error('photo') is-invalid @enderror">
                                                                </div>
                                                                @error('photo')
                                                                <div class="alert alert-danger my-3 col-sm-6" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-offset-2 col-sm-10">
                                                                    <button type="submit" class="btn btn-success">Update Profil</button>
                                                                    <button type="reset" class="btn btn-danger">Reset</button>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </form>
                                                </div>
                                            </table>
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