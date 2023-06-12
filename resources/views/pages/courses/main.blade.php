@extends('template.layout')

@section('content')
<<<<<<< HEAD
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Mata Pelajaran</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                href="{{ route('dashboard') }}">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Mata Pelajaran</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tabbable-line">
                        <ul class="nav customtab nav-tabs" role="tablist">
                            <li class="nav-item"><a href="#tab1" class="nav-link active" data-bs-toggle="tab">List
                                    View</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active fontawesome-demo" id="tab1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-box">
                                            <div class="card-head">
                                                <header>Semua Mata Pelajaran</header>
                                                <div class="tools">
                                                    <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                                    <a class="t-collapse btn-color fa fa-chevron-down"
                                                        href="javascript:;"></a>
                                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                                </div>
                                            </div>
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-6">
                                                        @auth
                                                        @if(Auth::check() && Auth::user()->role == 'admin')
                                                                <div class="btn-group">
                                                                    <a href="{{ route('tambahmapels') }}" id="addRow"
                                                                        class="btn btn-primary">
                                                                        Tambah Mata Pelajaran <i class="fa fa-plus"></i>
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        @endauth
                                                    </div>
                                                </div>
                                                <br>
                                                <table
                                                    class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                                                    id="example4">
                                                    <thead>
                                                        <tr>
                                                            <th> No </th>
                                                            <th> Nama Mata Pelajaran </th>
                                                            <th> Kelas </th>
                                                            @if (Auth::check() && Auth::user()->role == 'admin')
                                                                <th> Action </th>
                                                            @endif
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $no = 1;
                                                        @endphp
                                                        @foreach ($courses as $rowmapel)
                                                            <tr class="odd gradeX">
                                                                <td>{{ $no++ }}</td>
                                                                <td class="left">{{ $rowmapel->nama_matapelajaran }}</td>
                                                                <td>{{ $rowmapel->tingkat_kelas }}</td>
                                                                @auth
                                                                    @if (Auth::user()->role == 'admin')
                                                                        <td>
                                                                            <a href="{{ route('gantimapel', $rowmapel->id) }}"
                                                                                class="tblEditBtn">
                                                                                <i class="fa fa-pencil"></i>
                                                                            </a>
                                                                            <a href="#" class="tblDelBtn delete"
                                                                                data-id="{{ $rowmapel->id }}">
                                                                                <i class="fa fa-trash-o"></i>
                                                                            </a>
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
    <script src="https://code.jquery.com/jquery-3.6.4.slim.js"
        integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>

    <script>
        $('.delete').click(function() {
            var mapelsiswaid = $(this).attr('data-id');
            swal({
                    title: "Apakah Anda Yakin?",
                    text: "Anda Akan Menghapus Mata Pelajaran Tersebut",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/deletemapelsiswa/" + mapelsiswaid;
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
=======

<div class="page-content-wrapper">
  <div class="page-content">
    <div class="page-bar">
      <div class="page-title-breadcrumb">
        <div class=" pull-left">
          <div class="page-title">Mata Pelajaran</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
          <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('dashboard') }}">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
          </li>
          <li class="active">Mata Pelajaran</li>
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
            <li class="nav-item"><a href="#tab1" class="nav-link active" data-bs-toggle="tab">List
                View</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active fontawesome-demo" id="tab1">
              <div class="row">
                <div class="col-md-12">
                  <div class="card card-box">
                    <div class="card-head">
                      <header>Semua Mata Pelajaran</header>
                      <div class="tools">
                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                        <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                      </div>
                    </div>
                    <div class="card-body ">
                      <div class="row">
                        <div class="col-md-6 col-sm-6 col-6">
                          @auth
                          @if(Auth::user()->role == 'admin')
                          <div class="btn-group">
                            <a href="{{ route('tambahmapels') }}" id="addRow" class="btn btn-primary">
                              Tambah Mata Pelajaran <i class="fa fa-plus"></i>
                            </a>
                          </div>
                          @endif
                          @endauth
                        </div>
                      </div>
                      <br>
                      <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                        <thead>
                          <tr>
                            <th> No </th>
                            <th> Nama Mata Pelajaran </th>
                            <th> Kelas </th>
                            <!-- <th> Waktu Mulai </th>
                            <th> Waktu Selesai </th>
                            <th> File </th> -->
                            @if(Auth::user()->role == 'admin')
                            <th> Action </th>
                            @endif
                          </tr>
                        </thead>
                        <tbody>
                          @php
                          $no=1;
                          @endphp
                          @foreach($courses as $rowmapel)
                          <tr class="odd gradeX">
                            <td>{{ $no++ }}</td>
                            <td class="left">{{ $rowmapel->nama_matapelajaran }}</td>
                            <td>{{ $rowmapel->tingkat_kelas }}</td>
                            @auth
                            @if(Auth::user()->role == 'admin')
                            <td>
                              <a href="{{ route('gantimapel', $rowmapel->id) }}" class="tblEditBtn">
                                <i class="fa fa-pencil"></i>
                              </a>
                              <a href="#" class="tblDelBtn delete" data-id="{{ $rowmapel->id }}">
                                <i class="fa fa-trash-o"></i>
                              </a>
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
<script src="https://code.jquery.com/jquery-3.6.4.slim.js" integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>

<script>
  $('.delete').click(function() {
    var mapelsiswaid = $(this).attr('data-id');
    swal({
        title: "Apakah Anda Yakin?",
        text: "Anda Akan Menghapus Mata Pelajaran Tersebut",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = "/deletemapelsiswa/" + mapelsiswaid;
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
>>>>>>> origin/master
