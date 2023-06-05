@extends('template.layout')

@section('content')
<style>
    /* Styling untuk gambar dengan kalimat */
    .image-with-caption {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        margin: 20px;
    }

    .image-with-caption img {
        max-width: 100%;
        height: auto;
        object-fit: cover;
        margin-bottom: 10px;
    }

    .image-caption {
        font-size: 14px;
        color: #666;
    }

    .carousel-button-prev:before,
    .carousel-button-next:before {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 12px;
        height: 12px;
        border-top: 2px solid white;
        border-right: 2px solid white;
    }

    .carousel-button-next:before {
        transform: translate(-50%, -50%) rotate(45deg);
    }

    .carousel-button-prev:before {
        transform: translate(-50%, -50%) rotate(-135deg);
    }

    h3 {
        text-align: center;
        font-size: 36px;
        font-weight: bold;
    }

    .grid-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .grid-item {
        border: 1px solid #ccc;
        padding: 10px;
    }

    .description {
        grid-column: 1 / span 1;
    }

    .image-with-caption {
        text-align: center;
        margin-top: 20px;
    }

    .image-with-caption img {
        max-width: 100%;
        height: auto;
    }

    .image-caption {
        margin-top: 10px;
        font-style: italic;
    }

    .btn-group {
        margin-top: 10px;
    }
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstraps/4.2.1/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title" style="text-align: center;">Informasi Sekolah</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('guest') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Informasi Sekolah</li>
                </ol>
            </div>
        </div>
        <!-- Carousel Untuk Slide Konten -->
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="../fotocarousel/welcome.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../fotocarousel/gambar1.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../fotocarousel/gambar2.jpg" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../fotocarousel/gambar3.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../fotocarousel/gambar4.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../fotocarousel/gambar5.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../fotocarousel/gambar6.jpg" alt="Second slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="grid-container">
            <div class="grid-item description">
        <!-- Penjelasan -->
        <div class="description">
            <h2 style="font-weight: bold;">SD Negeri 1234567 Sitorus Godang</h2>
            <p>Sekolah Dasar (SD) adalah sebuah lembaga pendidikan yang berfungsi untuk melaksanakan kegiatan belajar mengajar.
                Sekolah Dasar (SD) 175807 merupakan satu-satunya sekolah dasar yang ada di Sitorus Godang, Sigodang Tua, Kecamatan Silaen,
                Kabupaten Toba, Provinsi Sumatera Utara. Sekolah ini merupakan sekolah negeri yang didirikan pada tanggal 01 Januari 1977
                dengan akreditasi B. Luas sekolah sekitar 3.200m2 dengan kondisi jalan yang rusak sehingga menyulitkan akses menuju sekolah.
                Sekolah ini difasilitasi dengan tegangan listrik sebesar 900KwH yang dapat digunakan oleh sekolah untuk keperluan penting seperti
                lampu, internet, stop kontak untuk keperluan elektronik dan lain-lain. Akses internet dapat dilakukan dengan menggunakan data
                seluler (provider IM3) di SD Sitorus Godang.
                Program pengajaran dimulai pukul 08.00 sampai 12.00 dari hari Senin sampai Sabtu, dengan menggunakan kurikulum pendidikan nasional 2013.
                Kepala sekolah adalah Ibu Kasta Nadeak dan terdapat tujuh orang guru dengan satu orang staf administrasi.
                Sekolah ini difasilitasi dengan 6 ruang kelas, satu kantor guru, satu perpustakaan dan satu toilet.
                Adapun jumlah siswa di SD ini tergolong sedikit, hanya 51 siswa dengan 22 siswa laki-laki dan 29 siswa perempuan.
                Siswa di SD ini juga mayoritas beragama Kristen. Siswa di SD ini juga memiliki usia yang ideal untuk ukuran siswa SD,
                hanya ada 3 orang siswa yang berusia di atas 12 tahun.
                Sebagai sekolah dasar yang sudah dibangun lebih dari empat puluh tahun, jumlah siswa di sekolah ini hanya ada 54 siswa atau
                rata-rata hanya ada 9 sampai 10 siswa di setiap kelasnya. Oleh karena itu, dengan penelitian ini kami mencoba untuk membangun
                sistem informasi untuk SD Sitorus Godang, sehingga mereka dapat menggunakannya sebagai alat bantu untuk proses belajar dan mengajar
                menjadi lebih mudah. Sistem informasi ini juga dapat menarik minat lebih banyak orang untuk belajar di SD 175807 Sitorus Godang.
            </p>
        </div>
            </div>

            <div class="grid-item image-with-caption">
        <!-- Gambar dengan kalimat -->
        @if(Auth::check() && Auth::user()->role == 'admin')
        <div class="btn-group">
            <a href="{{  route('tambahstruktur') }}" id="addRow" class="btn btn-primary">
                Tambah Struktur <i class="fa fa-plus"></i>
            </a>
        </div>
        @endif
        @foreach($organisasi as $row)
        <div class="image-with-caption">
            <img src="{{ asset('fotostruktur/'.$row->gambar) }}">
            <p class="image-caption">Struktur Organisasi</p>
        </div>
        @if(Auth::check() && Auth::user()->role == 'admin')
        <div class="btn-group">
            <a href="{{ route('editstruktur', $row->id) }}" id="addRow" class="btn btn-success">
                Edit Struktur <i class="fa fa-pencil"></i>
            </a>
        </div>
        <div class="btn-group">
            <a href="#" id="addRow" class="btn btn-danger delete" data-id="{{ $row->id }}">
                Hapus Struktur <i class="fa fa-trash"></i>
            </a>
        </div>
        @endif
        @endforeach
            </div>
        </div>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.slim.js" integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        <script>
            $('.delete').click(function() {
                var strukturid = $(this).attr('data-id');
                swal({
                        title: "Apakah Anda Yakin?",
                        text: "Anda Akan Menghapus Gambar Struktur Organisasi Tersebut",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location = "/deletestruktur/" + strukturid;
                            swal("Data Berhasil Dihapus", {
                                icon: "success",
                            });
                        } else {
                            swal("Data Tidak Jadi Dihapus");
                        }
                    });
            });
        </script>

        <script>
            $(document).ready(function() {
                $('.carousel').carousel();
            });
        </script>
        @endsection