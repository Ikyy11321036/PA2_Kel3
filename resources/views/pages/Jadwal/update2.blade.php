@extends('template.layout')

@section('content')
<form action="" method="post"></form>
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Ubah Mata Pelajaran</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('dashboard') }}">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
					<li><a class="parent-item" href="{{ route('matapelajaran2') }}">Jadwal Kelas</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="{{ route('matapelajaran2') }}">Kelas 2</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Ubah Mapel</li>
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
					<form action="{{ url('update-murid2', $murid2->id) }}" method="post" enctype="multipart/form-data">
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
															<legend>Masukkan Mata Pelajaran</legend>
															<div class="form-group">
																<label class="control-label col-sm-2" for="senin">Mata Pelajaran Senin</label>
																<div class="col-sm-6">
																	<select class="form-control @error('senin') is-invalid @enderror" id="senin" name="senin">
																		<option value="" disabled selected>Pilih Pelajaran</option>
																		@foreach ($jadwaledit2 as $rowsenin)
																		<option value="{{ $rowsenin->nama_matapelajaran }}" {{ $murid2->senin == $rowsenin->nama_matapelajaran ? 'selected' : '' }}>{{ $rowsenin->nama_matapelajaran }}</option>
																		@endforeach
																	</select>
																	@error('senin')
																	<div class="alert alert-danger my-3 col-sm-6" role="alert">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-sm-2" for="selasa">Mata Pelajaran Selasa</label>
																<div class="col-sm-6">
																	<select class="form-control @error('selasa') is-invalid @enderror" id="selasa" name="selasa">
																		<option value="" disabled selected>Pilih Pelajaran</option>
																		@foreach ($jadwaledit2 as $rowselasa)
																		<option value="{{ $rowselasa->nama_matapelajaran }}" {{ $murid2->selasa == $rowselasa->nama_matapelajaran ? 'selected' : '' }}>{{ $rowselasa->nama_matapelajaran }}</option>
																		@endforeach
																	</select>
																	@error('selasa')
																	<div class="alert alert-danger my-3 col-sm-6" role="alert">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-sm-2" for="rabu">Mata Pelajaran Rabu</label>
																<div class="col-sm-6">
																	<select class="form-control @error('rabu') is-invalid @enderror" id="rabu" name="rabu">
																		<option value="" disabled selected>Pilih Pelajaran</option>
																		@foreach ($jadwaledit2 as $rowrabu)
																		<option value="{{ $rowrabu->nama_matapelajaran }}" {{ $murid2->rabu == $rowrabu->nama_matapelajaran ? 'selected' : '' }}>{{ $rowrabu->nama_matapelajaran }}</option>
																		@endforeach
																	</select>
																	@error('rabu')
																	<div class="alert alert-danger my-3 col-sm-6" role="alert">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-sm-2" for="kamis">Mata Pelajaran Kamis</label>
																<div class="col-sm-6">
																	<select class="form-control @error('kamis') is-invalid @enderror" id="kamis" name="kamis">
																		<option value="" disabled selected>Pilih Pelajaran</option>
																		@foreach ($jadwaledit2 as $rowkamis)
																		<option value="{{ $rowkamis->nama_matapelajaran }}" {{ $murid2->kamis == $rowkamis->nama_matapelajaran ? 'selected' : '' }}>{{ $rowkamis->nama_matapelajaran }}</option>
																		@endforeach
																	</select>
																	@error('kamis')
																	<div class="alert alert-danger my-3 col-sm-6" role="alert">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-sm-2" for="jumat">Mata Pelajaran Jumat</label>
																<div class="col-sm-6">
																	<select class="form-control @error('jumat') is-invalid @enderror" id="jumat" name="jumat">
																		<option value="" disabled selected>Pilih Pelajaran</option>
																		@foreach ($jadwaledit2 as $rowjumat)
																		<option value="{{ $rowjumat->nama_matapelajaran }}" {{ $murid2->jumat == $rowjumat->nama_matapelajaran ? 'selected' : '' }}>{{ $rowjumat->nama_matapelajaran }}</option>
																		@endforeach
																	</select>
																	@error('jumat')
																	<div class="alert alert-danger my-3 col-sm-6" role="alert">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-sm-2" for="sabtu">Mata Pelajaran Sabtu</label>
																<div class="col-sm-6">
																	<select class="form-control @error('sabtu') is-invalid @enderror" id="sabtu" name="sabtu">
																		<option value="" disabled selected>Pilih Pelajaran</option>
																		@foreach ($jadwaledit2 as $rowsabtu)
																		<option value="{{ $rowsabtu->nama_matapelajaran }}" {{ $murid2->sabtu == $rowsabtu->nama_matapelajaran ? 'selected' : '' }}>{{ $rowsabtu->nama_matapelajaran }}</option>
																		@endforeach
																	</select>
																	@error('sabtu')
																	<div class="alert alert-danger my-3 col-sm-6" role="alert">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-sm-2" for="waktu_pelajaran">Waktu Mata Pelajaran</label>
																<div class="col-sm-6">
																	<input type="time" name="waktu_pelajaran" id="waktu_pelajaran" class="form-control" placeholder="Masukkan Waktu" value="{{ $murid2->waktu_pelajaran }}">
																	@error('waktu_pelajaran')
																	<div class="alert alert-danger my-3 col-sm-6" role="alert">
																		{{ $message }}
																	</div>
																	@enderror
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.slim.js" integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>

<script>
	$(document).ready(function() {
		$('form').submit(function(e) {
			e.preventDefault();
			var form = this;
			swal({
				title: "Berhasil",
				text: "Jadwal Kelas 2 Berhasil Diperbaharui!",
				icon: "success",
			}).then(function() {
				form.submit();
			});
		});
	});
</script>
@endsection