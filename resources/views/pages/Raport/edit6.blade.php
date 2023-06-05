@extends('template.layout')

@section('content')
<form action="" method="post"></form>
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Tambah Raport Kelas 6</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('dashboard') }}">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="{{ route('raport6') }}">Raport Siswa</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Tambah Raport</li>
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
					<form action="{{ url('update-raport6', $edit6->id) }}" method="post" enctype="multipart/form-data">
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
																<label class="control-label col-sm-2" for="tugas">Tugas</label>
																<div class="col-sm-6">
																	<input type="text" name="tugas" id="tugas" class="form-control" placeholder="Masukkan Nilai Tugas" value="{{ $edit6->tugas }}">
																	@error('tugas')
																	<div class="alert alert-danger my-3 col-sm-6" role="alert">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-sm-2" for="ujian">Ujian</label>
																<div class="col-sm-6">
																	<input type="text" name="ujian" id="ujian" class="form-control" placeholder="Masukkan Nilai Ujian" value="{{ $edit6->ujian }}">
																	@error('ujian')
																	<div class="alert alert-danger my-3 col-sm-6" role="alert">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-sm-2" for="kkm">KKM</label>
																<div class="col-sm-6">
																	<input type="text" name="kkm" id="kkm" class="form-control" placeholder="Masukkan KKM" value="{{ $edit6->kkm }}">
																	@error('kkm')
																	<div class="alert alert-danger my-3 col-sm-6" role="alert">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-sm-2" for="uts">UTS</label>
																<div class="col-sm-6">
																	<input type="text" name="uts" id="uts" class="form-control" placeholder="Masukkan Nilai UTS" value="{{ $edit6->uts }}">
																	@error('uts')
																	<div class="alert alert-danger my-3 col-sm-6" role="alert">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
                                                            <div class="form-group">
																<label class="control-label col-sm-2" for="uas">UAS</label>
																<div class="col-sm-6">
																	<input type="text" name="uas" id="uas" class="form-control" placeholder="Masukkan Nilai UAS" value="{{ $edit6->uas }}">
																	@error('uas')
																	<div class="alert alert-danger my-3 col-sm-6" role="alert">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-sm-2" for="jumlah_nilai">Nilai Raport</label>
																<div class="col-sm-6">
																	<input type="text" name="jumlah_nilai" id="jumlah_nilai" class="form-control" placeholder="Masukkan Nilai Raport" value="{{ $edit6->jumlah_nilai }}">
																	@error('jumlah_nilai')
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
				text: "Raport Kelas 1 Berhasil Ditambah!",
				icon: "success",
			}).then(function() {
				form.submit();
			});
		});
	});
</script>
@endsection