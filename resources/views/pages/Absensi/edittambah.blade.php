@extends('template.layout')

@section('content')

<style>
	label {
		display: block;
		margin-bottom: 10px;
		/* menambahkan jarak antar radio */
	}
</style>

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
					<li class="active">Edit Murid</li>
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
					<form action="{{ route('update-absensi', $absens->id) }}" method="post" enctype="multipart/form-data">
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
															@if(Auth::user()->role == 'admin')
															<div class="form-group">
																<label class="control-label col-sm-2" for="name">Nama</label>
																<div class="col-sm-6">
																	<input type="text" name="name" id="name" class="form-control" placeholder="Masukkan Nama" value="{{ $absens->name }}">
																	@error('name')
                                                                <div class="alert alert-danger my-3 col-sm-6" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
																</div>
															</div>
															@endif
															<div class="form-group">
																<label class="control-label col-sm-2" for="absensi" name="absensi">Absensi Siswa</label>
																<div class="col-sm-6">
																	<div id="absensi" name="absensi" value="{{ $absens->absensi }}">
																		<label><input type="radio" name="absensi" value="Hadir" {{ $absens->absensi == 'Hadir' ? 'checked' : '' }}>Hadir</label>
																		@if(Auth::user()->role == 'admin')
																		<label><input type="radio" name="absensi" value="Izin" {{ $absens->absensi == 'Izin' ? 'checked' : '' }}>Izin</label>
																		<label><input type="radio" name="absensi" value="Alpha" {{ $absens->absensi == 'Alpha' ? 'checked' : '' }}>Alpha</label>
																		<label><input type="radio" name="absensi" value="Sakit" {{ $absens->absensi == 'Sakit' ? 'checked' : '' }}>Sakit</label>
																		@endif
																		@error('absensi')
                                                                <div class="alert alert-danger my-3 col-sm-6" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
																	</div>
																</div>
															</div>
															@if(Auth::user()->role == 'admin')
															<div class="form-group">
																<label class="control-label col-sm-2" for="keterangan">Keterangan</label>
																<div class="col-sm-6">
																	<input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan Keterangan" value="{{ $absens->keterangan }}">
																	@error('keterangan')
                                                                <div class="alert alert-danger my-3 col-sm-6" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-sm-2" for="date">Tanggal</label>
																<div class="col-sm-6">
																<input type="date" name="date" id="date" class="form-control" placeholder="Masukkan Tanggal" value="{{ $absens->date }}">
																@error('date')
                                                                <div class="alert alert-danger my-3 col-sm-6" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
																</div>
															</div>
															<!-- <div class="form-group">
																<label class="control-label col-sm-2" for="kelas">Kelas Siswa</label>
																<div class="col-sm-6">
																	<select class="form-select" name="kelas" id="kelas" value="{{ $absens->kelas }}" aria-label="Default select example">
																		<option selected>Pilih Kelas Murid</option>
																		<option value="Kelas 1">Kelas 1</option>
																		<option value="Kelas 2">Kelas 2</option>
                                                                        <option value="Kelas 3">Kelas 3</option>
																		<option value="Kelas 4">Kelas 4</option>
																		<option value="Kelas 5">Kelas 5</option>
																		<option value="Kelas 6">Kelas 6</option>
																	</select>
																	@error('kelas')
                                                                <div class="alert alert-danger my-3 col-sm-7" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
																</div>
															</div> -->
															@endif
															<div class="form-group">
																<div class="col-sm-offset-2 col-sm-10">
																	<button type="submit" class="btn btn-success">Simpan</button>
																	@if(Auth::user()->role == 'admin')
																	<button type="reset" class="btn btn-danger">Reset</button>
																	@endif
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.slim.js" integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>

<script>
	$(document).ready(function() {
		$('form').submit(function(e) {
			e.preventDefault();
			var form = this;
			swal({
				title: "Berhasil",
				text: "Absensi Siswa Berhasil Diperbaharui!",
				icon: "success",
			}).then(function() {
				form.submit();
			});
		});
	});
</script>

@endsection