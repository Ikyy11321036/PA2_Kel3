@extends('template.layout')

@section('content')
<<<<<<< HEAD
<style>
    body {
        background-color: #f8f9fa;
    }

    .container {
        margin-top: 100px;
    }

    .form-container {
        background-color: #ffffff;
        border-radius: 5px;
        padding: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .form-title {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 5px;
    }

    .form-group input:focus {
        outline: none;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
    }

    .btn-submit {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-submit:hover {
        background-color: #0056b3;
    }

    .alert {
        margin-top: 20px;
    }
</style>
=======
>>>>>>> origin/master
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Ubah Password</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('dashboard') }}">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Ubah Password</li>
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
                    <div class="row">
<<<<<<< HEAD
                        <form method="POST" action="{{ route('password.change') }}">
                            @csrf
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <div class="form-container">
                                            <h2 class="form-title">Ganti Password</h2>
                                            <div class="form-group">
                                                <label for="current_password">Kata Sandi Lama</label>
                                                <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" placeholder="Masukkan Kata Sandi Anda Yang Lama" name="current_password" autofocus>
=======
                        <div class="card-head">
                            <div class="card">
                                <div class="card-header">{{ __('Change Password') }}</div>

                                <div class="card-body">
                                    <form method="POST" action="{{ route('password.change') }}">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="current_password" class="col-md-4 col-form-label text-md-right">Kata Sandi Lama</label>

                                            <div class="col-md-6">
                                                <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" autofocus>
>>>>>>> origin/master

                                                @error('current_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
<<<<<<< HEAD

                                            <div class="form-group">
                                                <label for="password">Kata Sandi Baru</label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Kata Sandi Yang Baru" name="password">
=======
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">Kata Sandi Baru</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
>>>>>>> origin/master

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
<<<<<<< HEAD

                                            <div class="form-group">
                                                <label for="password_confirmation">Ulangi Kata Sandi</label>
                                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Kata Sandi Yang Baru">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-submit" onclick="changePassword()">Simpan</button>
                                        <div class="alert" id="alert-container" style="display: none;"></div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </form>
=======
                                        </div>

                                        <div class="form-group row">
                                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Ulangi Kata Sandi</label>

                                            <div class="col-md-6">
                                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Konfirmasi
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
>>>>>>> origin/master
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
<<<<<<< HEAD
</div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.slim.js" integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>
<!-- Load Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Load Custom JavaScript -->
<script>
    function changePassword() {
        var currentPassword = document.getElementById('current-password').value;
        var newPassword = document.getElementById('new-password').value;
        var confirmNewPassword = document.getElementById('confirm-new-password').value;

        // Validasi password baru
        if (newPassword !== confirmNewPassword) {
            showErrorAlert('Konfirmasi password baru tidak sesuai.');
            return;
        }

        // Kirim data ke server untuk mengganti password
        // Implementasikan logika server-side untuk memproses ganti password

        // Menampilkan pesan sukses jika berhasil
        showSuccessAlert('Password berhasil diubah.');
    }

    function showSuccessAlert(message) {
        var alertContainer = document.getElementById('alert-container');
        alertContainer.innerHTML = '<div class="alert alert-success" role="alert">' + message + '</div>';
        alertContainer.style.display = 'block';
    }

    function showErrorAlert(message) {
        var alertContainer = document.getElementById('alert-container');
        alertContainer.innerHTML = '<div class="alert alert-danger" role="alert">' + message + '</div>';
        alertContainer.style.display = 'block';
    }
</script>
=======

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.slim.js" integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>
>>>>>>> origin/master

<script>
    $(document).ready(function() {
        $('form').submit(function(e) {
            e.preventDefault();
            var form = this;
            swal({
                title: "Berhasil",
                text: "Password Berhasil Diubah!",
                icon: "success",
            }).then(function() {
                form.submit();
            });
        });
    });
</script>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> origin/master
