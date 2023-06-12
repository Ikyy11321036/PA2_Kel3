@extends('template.layout')

@section('content')
<form action="" method="post"></form>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Isi Pengumuman</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('dashboard') }}">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{ route('pengumuman') }}">Info Sekolah</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{ route('pengumuman') }}">Pengumuman</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Isi Pengumuman</li>
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

                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="tab-content">
                            <div class="tab-pane active fontawesome-demo" id="tab1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-box">
                                            <div class="card-head">
                                                <header>{{ $data->judul }}</header>
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
                                                            <div class="form-group">
<<<<<<< HEAD
                                                                <h4>{!! nl2br(e($data->deskripsi)) !!}</h4>
                                                            </div>
                                                            @if($data->file)
                                                            <h4>Download File Pengumuman: <a href="{{ asset('filepengumuman/'.$data->file) }}">{{ $data->file }}</a></h4>
                                                            @endif
                                                            <hr style="border:5px;">
                                                            <div class="form-group">
                                                                <h5>Tanggal Dikirim: {{ \Carbon\Carbon::parse($data->created_at)->locale('id')->isoFormat('DD-MMMM-YYYY') }}</h5>
=======
                                                                <h4>{{ $data->deskripsi }}</h4>
                                                            </div>
                                                            <hr style="border:5px;">
                                                            <div class="form-group">
                                                                <h5>Tanggal Dikirim: {{ $data->hari_tanggal }}</h5>
>>>>>>> origin/master
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
@endsection