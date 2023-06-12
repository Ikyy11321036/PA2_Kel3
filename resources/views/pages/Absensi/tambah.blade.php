@extends('template.layout')

@section('content')
<form action="" method="post"></form>
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Absensi Murid</div>
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
					<li><a class="parent-item" href="{{ route('absensisiswa') }}">Absensi Siswa</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Tambah Keterangan</li>
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
					<form action="{{ route('tambah-keterangan', $absens->id) }}" method="post" enctype="multipart/form-data">
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
																<label class="control-label col-sm-2" for="keterangan">Keterangan</label>
																<div class="col-sm-6">
																	<input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan Keterangan" value="{{ $absens->keterangan }}">
																</div>
															</div>
                                                            <div class="form-group">
																<label class="control-label col-sm-2" for="absensi">Absensi Siswa</label>
																<div class="col-sm-6">
																	<select class="form-select" name="absensi" id="absensi" value="{{ $absens->absensi }}" aria-label="Default select example">
																		<option selected>Pilih Keterangan Murid</option>
																		<option value="Hadir">Hadir (H)</option>
																		<option value="Izin">Izin (I)</option>
                                                                        <option value="Sakit">Sakit (S)</option>
																		<option value="Alpha">Alpha (A)</option>
																	</select>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-sm-2" for="kelas">Kelas Siswa</label>
																<div class="col-sm-6">
																	<select class="form-select" name="kelas" id="kelas" value="{{ $absens->kelas }}" aria-label="Default select example">
																		<option selected>Pilih Keterangan Murid</option>
																		<option value="Kelas 1">Kelas 1</option>
																		<option value="Kelas 2">Kelas 2</option>
                                                                        <option value="Kelas 3">Kelas 3</option>
																		<option value="Kelas 4">Kelas 4</option>
																		<option value="Kelas 5">Kelas 5</option>
																		<option value="Kelas 6">Kelas 6</option>
																	</select>
																</div>
															</div>
                                                            <div class="form-group">
																<div class="col-sm-offset-2 col-sm-10">
																	<button type="submit" class="btn btn-success">Simpan</button>
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

<script src="https://code.jquery.com/jquery-3.6.4.slim.js" integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


@endsection