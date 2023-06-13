@extends('template.layout')

@section('content')

<style>
  table {
    border-collapse: collapse;
    width: 100%;
	float: right;
	display: inline-block;
  }
</style>

<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Pengumuman</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('dashboard') }}">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="{{ route('pengumuman') }}">Info Sekolah</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Pengumuman</li>
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
					<div class="tab-content">
						<div class="tab-pane active fontawesome-demo" id="tab1">
							<div class="row">
								<div class="col-md-12">
									<div class="card card-box">
										<div class="card-head">
											<header><i class="fa fa-info-circle"></i> Pengumuman</header>
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
													@if(Auth::check() && Auth::user()->role == 'admin')
													<div class="btn-group">
														<a href="{{  route('tambahpengumuman') }}" id="addRow" class="btn btn-primary">
															Tambah Pengumuman <i class="fa fa-plus"></i>
														</a>
													</div>
													@endif
													@endauth
												</div>
											</div>
											<br>
											@foreach ($data as $pengumuman)
											<table>
												<tbody>
													<tr>
														<td>
															<h4><i class="fa fa-thumb-tack"></i><a href="{{  route('isipengumuman', $pengumuman->id) }}"> {{ $pengumuman->judul }} </a></h4>
														</td>
														@auth
														@if(Auth::user()->role == 'admin')
														<td>															
															<a href="{{ route('edit-pengumuman', $pengumuman->id) }}" class="tblEditBtn">
																<i class="fa fa-pencil"></i>
															</a>
															<a href="#" class="tblDelBtn delete" data-id="{{ $pengumuman->id }}">
																<i class="fa fa-trash-o"></i>
															</a>
														</td>
														@endif
														@endauth
													</tr>
												</tbody>
											</table>
											@endforeach
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
		var pengumumanid = $(this).attr('data-id');
		swal({
				title: "Apakah Anda Yakin?",
				text: "Anda Akan Menghapus Data pengumuman Tersebut",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					window.location = "/deletepengumuman/" + pengumumanid;
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