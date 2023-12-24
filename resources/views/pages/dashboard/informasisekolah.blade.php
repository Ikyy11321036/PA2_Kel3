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
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title" style="text-align: center;">Dashboard</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('dashboard') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
        
        <!-- end widget -->
        <!-- Carousel Untuk Slide Konten -->
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="../fotocarousel/welcome.jpg" alt="First slide">
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
        
    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.slim.js" integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


<script>
    $(document).ready(function() {
        $('.carousel').carousel();
    });
</script>

<script>
    $('.deletes').click(function() {
        var informasiid = $(this).attr('data-id');
        swal({
                title: "Apakah Anda Yakin?",
                text: "Anda Akan Menghapus Informasi Tersebut",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/deleteinformasi/" + informasiid;
                    swal("Informasi Berhasil Dihapus", {
                        icon: "success",
                    });
                } else {
                    swal("Informasi Tidak Jadi Dihapus");
                }
            });
    });

    $('.delete').click(function() {
        var strukturid = $(this).attr('data-id');
        swal({
                title: "Apakah Anda Yakin?",
                text: "Anda Akan Menghapus Struktur Tersebut",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/deletestruktur/" + strukturid;
                    swal("Struktur Berhasil Dihapus", {
                        icon: "success",
                    });
                } else {
                    swal("Struktur Tidak Jadi Dihapus");
                }
            });
    });
</script>

@endsection

@push('scripts')
<script>
    function chart1() {
        var options = {
            series: [{
                name: "Jumlah Siswa",
                data: @json($data)
            }],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'],
                    opacity: 0.5
                },
            },
            xaxis: {
                categories: @json($categories)
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart1"), options);
        chart.render();

    }

    chart1();
</script>
@endpush