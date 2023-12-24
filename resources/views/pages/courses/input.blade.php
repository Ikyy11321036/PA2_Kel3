@extends('template.layout')

@section('content')
<form action="" method="post"></form>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Tambah Kursus</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('dashboard') }}">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{ route('matapelajaransiswa') }}">Kursus</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Tambah Kursus</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tabbable-line">
                    
                    <form action="{{ route('insertmatapelajaran') }}" method="post" enctype="multipart/form-data">
                        @csrf
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
                                                                <label class="control-label col-sm-2" for="nama_matapelajaran">Judul</label>
                                                                <div class="col-sm-6">
                                                                    <input type="text" name="nama_matapelajaran" id="nama_matapelajaran" class="form-control @error('nama_matapelajaran') is-invalid @enderror" placeholder="Masukkan Judul Kursus" value="{{ old('nama_matapelajaran') }}">
                                                                    @error('nama_pelajaran')
                                                                    <div class="alert alert-danger my-3 col-sm-6" role="alert">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                <label class="control-label col-sm-2" for="deskripsi">Deskripsi</label>
                                                                <div class="col-sm-6">
                                                                    <input type="text" name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Masukkan Deskripsi Kursus" value="{{ old('deskripsi') }}">
                                                                    @error('deskripsi')
                                                                    <div class="alert alert-danger my-3 col-sm-6" role="alert">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                <label class="control-label col-sm-2" for="durasi">Durasi</label>
                                                                <div class="col-sm-6">
                                                                    <input type="text" name="durasi" id="durasi" class="form-control @error('durasi') is-invalid @enderror" placeholder="Masukkan Durasi Kursus" value="{{ old('durasi') }}">
                                                                    @error('durasi')
                                                                    <div class="alert alert-danger my-3 col-sm-6" role="alert">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-2" for="tingkat_kelas">Tingkat Kelas</label>
                                                                <div class="col-sm-6">
                                                                    <select class="form-control @error('tingkat_kelas') is-invalid @enderror" id="tingkat_kelas" name="tingkat_kelas">
                                                                        <option value="" disabled selected>Pilih Kelas</option>
                                                                        <option value="Kelas 1" {{ old('tingkat_kelas') == 'Kelas 1' ? 'selected' : '' }}>Kelas 1</option>
                                                                        <option value="Kelas 2" {{ old('tingkat_kelas') == 'Kelas 2' ? 'selected' : '' }}>Kelas 2</option>
                                                                        <option value="Kelas 3" {{ old('tingkat_kelas') == 'Kelas 3' ? 'selected' : '' }}>Kelas 3</option>
                                                                        <option value="Kelas 4" {{ old('tingkat_kelas') == 'Kelas 4' ? 'selected' : '' }}>Kelas 4</option>
                                                                        <option value="Kelas 5" {{ old('tingkat_kelas') == 'Kelas 5' ? 'selected' : '' }}>Kelas 5</option>
                                                                        <option value="Kelas 6" {{ old('tingkat_kelas') == 'Kelas 6' ? 'selected' : '' }}>Kelas 6</option>
                                                                    </select>
                                                                    @error('tingkat_kelas')
                                                                    <div class="alert alert-danger my-3 col-sm-6" role="alert">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="form-group">
                                                                <div class="col-sm-offset-2 col-sm-10">
                                                                    <button type="submit" class="btn btn-success">Tambah</button>
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

            // Menghapus pesan error sebelumnya
            $('.alert').remove();

            // Memeriksa setiap input field
            var isValid = true;
            $('input, select').each(function() {
                if ($(this).val() === '') {
                    var fieldName = $(this).attr('name');
                    var errorMsg = 'Field ' + fieldName + ' harus diisi';
                    $(this).after('<div class="alert alert-danger">' + errorMsg + '</div>');
                    isValid = false;
                }
            });

            // Jika validasi berhasil, submit form
            if (isValid) {
                var form = this;
                swal({
                    title: "Berhasil",
                    text: "Mata Pelajaran Berhasil Ditambahkan!",
                    icon: "success",
                }).then(function() {
                    form.submit();
                });
            } else {
                // Menampilkan SweetAlert bahwa validasi gagal
                swal({
                    title: "Validasi Gagal",
                    text: "Harap periksa kembali pengisian form",
                    icon: "error",
                });
            }
        });
    });
</script>

@endsection