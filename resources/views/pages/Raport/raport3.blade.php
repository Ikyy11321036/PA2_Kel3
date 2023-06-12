@extends('template.layout')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Raport Siswa Kelas 3</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('dashboard') }}">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Raport Siswa</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-13">
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
                        <li class="nav-item"><a href="#tab1" class="nav-link active" data-bs-toggle="tab">Raport Kelas 3</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active fontawesome-demo" id="tab1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-box">
                                        <div class="card-head">
                                            <header>Nilai Keseluruhan</header>
                                            <div class="tools">
                                                <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                                <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                                <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                            </div>
                                        </div>
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-6">
<<<<<<< HEAD
                                                    @if(Auth::check() && Auth::user()->role == 'admin')
                                                    <div class="btn-group">
                                                        <a href="{{ route('tambah3') }}" id="addRow" class="btn btn-primary">
                                                            Tambah Nilai <i class="fa fa-plus"></i>
                                                        </a>
                                                    </div>
                                                    @endif
                                                    <div class="btn-group">
                                                        <a href="/exportpdf3" id="addRow" class="btn btn-danger">
=======
                                                @if(Auth::user()->role == 'admin')
                                                <div class="btn-group">
                                                    <a href="{{  route('tambah3') }}" id="addRow" class="btn btn-primary">
                                                        Tambah Nilai <i class="fa fa-plus"></i>
                                                    </a>
												</div>
												@endif
                                                    <div class="btn-group">
                                                        <a href="/exportpdfraport3" id="addRow" class="btn btn-danger">
>>>>>>> origin/master
                                                            Ekspor PDF <i class="fa-solid fa-file-pdf"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2" style="text-align:center">
                                                            No</th>
                                                        <th rowspan="2" style="text-align:center">
                                                            Nama</th>
                                                        <th rowspan="2" style="text-align:center">
                                                            Kelas</th>
                                                        <th colspan="3" style="text-align:center">
                                                            Nilai Tugas & Ujian</th>
                                                        <th rowspan="2" style="text-align:center">
                                                            Nilai UTS</th>
                                                        <th rowspan="2" style="text-align:center">
                                                            Nilai UAS</th>
                                                        <th rowspan="2" style="text-align:center">
                                                            Nilai Raport</th>
                                                        <th rowspan="2" style="text-align:center">
                                                            Grade</th>
                                                        @auth
                                                        @if(Auth::user()->role == 'admin')
                                                        <th rowspan="2" style="text-align: center;">
                                                            Action</th>
                                                        @endif
                                                        @endauth
                                                    </tr>
                                                    <tr>
                                                        <th style="text-align:center">Tugas</th>
                                                        <th style="text-align:center">Ujian</th>
                                                        <th style="text-align:center">KKM</th>
                                                    </tr>
                                                    <tr>
                                                        @foreach($raport3 as $key => $row)
                                                        <td style="text-align:center">{{ $key + 1 }}</td>
                                                        <td style="text-align:center">{{ $row->username }}</td>
                                                        <td style="text-align:center">{{ $row->kelas }}</td>
                                                        <td style="text-align:center">{{ $row->tugas }}</td>
                                                        <td style="text-align:center">{{ $row->ujian }}</td>
                                                        <td style="text-align:center">{{ $row->kkm }}</td>
                                                        <td style="text-align:center">{{ $row->uts }}</td>
                                                        <td style="text-align:center">{{ $row->uas }}</td>
                                                        <td style="text-align:center">{{ $row->jumlah_nilai }}</td>
                                                        <td style="text-align:center">{{ $row->grade }}</td>
                                                        @auth
                                                        @if(Auth::user()->role == 'admin')
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="{{ route('editraport3', ['id' => $row->id]) }}" id="addRow" class="btn btn-success">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                            </div>
                                                            <div class="btn-group">
                                                                <a href="#" id="addRow" class="btn btn-danger delete" data-id="{{ $row->id }}">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                        @endif
                                                        @endauth
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
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
</div>
</div>
</div>
</div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.slim.js" integrity="sha356-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>

<script>
    $('.delete').click(function() {
        var raport3id = $(this).attr('data-id');
        swal({
                title: "Apakah Anda Yakin?",
                text: "Anda Akan Menghapus Raport Kelas 3 Tersebut",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/deleteraport3/" + raport3id;
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