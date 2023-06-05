@extends('template.layout')

@section('content')

<style>
    .button-grup {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    .button-grup input[type="radio"] {
        display: none;
    }

    .button-grup label {
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        color: #333;
        font-size: 20px;
        cursor: pointer;
    }

    .button-grup label:hover {
        background-color: #ccc;
    }

    .button-grup input[type="radio"]:checked+label {
        background-color: #333;
        color: #fff;
        border-color: #333;
    }

    #radio:checked~label[for="button-h"] {
        background-color: blue;
    }

    #radio:checked~label[for="button-i"] {
        background-color: green;
    }

    #radio:checked~label[for="button-a"] {
        background-color: red;
    }

    #radio:checked~label[for="button-s"] {
        background-color: yellow;
    }

    .keterangan {
        display: none;
    }
</style>

<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Absensi Siswa</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    @auth
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('dashboard') }}">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
                    @else
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('guest') }}">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
                    @endauth
                    </li>
                    <li><a class="parent-item" href="{{ route('absensisiswa') }}">Siswa/i</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Absensi Siswa</li>
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
                        <li class="nav-item"><a href="#tab1" class="nav-link active" data-bs-toggle="tab">Absensi
                                Siswa</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active fontawesome-demo" id="tab1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-box">
                                        <div class="card-head">
                                            <header>Absensi</header>
                                            <div class="tools">
                                                <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                                <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                                <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                            </div>
                                        </div>
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-6">
                                                <!-- @auth
                                                @if(Auth::user()->role == 'admin')
                                                    <div class="btn-group">
                                                        <a href="{{ route('tambahabsen') }}" id="addRow" class="btn btn-primary">
                                                            Tambah Murid <i class="fa fa-plus"></i>
                                                        </a>
                                                    </div>
                                                    @endif
                                                    @endauth -->
                                                    <div class="btn-group">
                                                        <a href="/exportpdfabsen" id="addRow" class="btn btn-danger">
                                                            Ekspor PDF <i class="fa-solid fa-file-pdf"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align:center"> No </th>
                                                        <th style="text-align:center"> Nama Lengkap </th>
                                                        <th style="text-align:center"> Kelas </th>
                                                        <th style="text-align:center"> Tanggal </th>
                                                        <th style="text-align:center"> Absensi </th>
                                                        <th style="text-align:center"> Keterangan </th>
                                                        <th style="text-align:center"> Action Keterangan </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $no = 1;
                                                    @endphp
                                                    @foreach ($data as $row)
                                                    <tr class="odd gradeX">
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $row->name }}</td>
                                                        <td>{{ $row->kelas }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($row->date)->format('d F Y') }}</td>
                                                        <td class="left">{{ $row->absensi }}</td>
                                                        <td>{{ $row->keterangan }}</td>
                                                        <td>
                                                        @auth
                                                            @if(Auth::user()->role == 'admin')
                                                            <a href="{{ route('edit-absensi', $row->id) }}" id="addRow" class="btn btn-primary">
                                                                Tambah/Edit Keterangan <i class="fa fa-plus"></i>
                                                            </a>
                                                            <a href="#" id="addRow" class="btn btn-danger delete" data-id="{{ $row->id }}">
                                                                Hapus <i class="fa fa-plus"></i>
                                                            </a>
                                                            @endif
                                                            @endauth
                                                        </td>
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
<script src="https://code.jquery.com/jquery-3.6.4.slim.js" integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>

<script>
	$('.delete').click(function() {
		var absenid = $(this).attr('data-id');
		swal({
				title: "Apakah Anda Yakin?",
				text: "Anda Akan Menghapus Absensi Tersebut",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					window.location = "/deleteabsen/" + absenid;
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