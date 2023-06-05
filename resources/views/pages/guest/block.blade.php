@extends('template.layout')

@section('content')

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f7f7f7;
    }

    .container {
        background-color: #fff;
        padding: 30px;
        margin: 50px auto;
        width: 500px;
        text-align: center;
        border-radius: 5px;
        box-shadow: 0px 0px 10px #aaa;
    }

    h1 {
        color: #333;
        font-size: 36px;
        margin-bottom: 20px;
    }

    p {
        color: #666;
        font-size: 18px;
        margin-bottom: 20px;
    }

    .btn-success {
        background-color: #4CAF50;
        color: #fff;
        font-size: 16px;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #3e8e41;
    }
</style>

<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Akses Ditolak</div>
                </div>
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
                    <div class="tab-content">
                        <div class="tab-pane active fontawesome-demo" id="tab1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-box">

                                        <head>
                                            <title>Harap Melakukan Login Terlebih Dahulu Untuk Mengakses Halaman Ini</title>
                                            <link rel="stylesheet" type="text/css" href="style.css">
                                        </head>

                                        <body>
                                            <div class="container">
                                                <h1>Halaman Terlarang</h1>
                                                <p>Maaf, Anda tidak diizinkan untuk mengakses halaman ini.</p>
                                                <p>Silakan melakukan login terlebih dahulu untuk dapat mengakses halaman ini.</p>
                                                <div class="btn-group">
                                                    <a href="{{  route('login') }}" id="addRow" class="btn btn-success">
                                                        Login
                                                    </a>
                                                </div>
                                            </div>
                                        </body>

                                        </html>
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.slim.js" integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>

<script>
    $('.delete').click(function() {
        var pengumumanid = $(this).attr('data-id');
        swal({
                title: "Apakah Anda Yakin?",
                text: "Anda Akan Menghapus Data pengumuman Tersebut",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/deletepengumuman/" + pengumumanid;
                    swal("Data Berhasil Dihapus", {
                        icon: "success",
                    });
                } else {
                    swal("Data Tidak Jadi Dihapus");
                }
            });
    });
</script>

@endsection