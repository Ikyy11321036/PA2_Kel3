@extends('template.layout')

@section('content')
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Jadwal Mapel Setiap Kelas</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('dashboard') }}">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
					<li><a class="parent-item" href="{{ route('matapelajaran2') }}">Jadwal Kelas</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Kelas 2</li>
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
						<li class="nav-item"><a href="#tab2" class="nav-link active" data-bs-toggle="tab">Kelas
								2</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active fontawesome-demo" id="tab2">
							<div class="row">
								<div class="col-md-12">
									<div class="card card-box">
										<div class="card-head">
											<header>Kelas 2</header>
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
														<a href="/tambahkelas2" id="addRow" class="btn btn-primary">
															Tambah Jadwal <i class="fa fa-plus"></i>
														</a>
													</div>
													@endif
													<div class="btn-group">
                                                        <a href="/exportpdfjadwal2" id="addRow" class="btn btn-danger">
                                                            Ekspor PDF <i class="fa-solid fa-file-pdf"></i>
                                                        </a>
                                                    </div>
													@endauth
												</div>
											</div>
											<br>
											<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
												<thead>
													<tr>
														<th> Waktu </th>
														<th> Senin </th>
														<th> Selasa </th>
														<th> Rabu </th>
														<th> Kamis </th>
														<th> Jumat </th>
														<th> Sabtu </th>
														@auth
														@if(Auth::user()->role == 'admin')
														<th> Action </th>
														@endif
														@endauth
													</tr>
												</thead>
												<tbody>
													@foreach ($data2 as $row)
													<tr class="odd gradeX">
														<td>{{ $row->waktu_pelajaran }}</td>
														<td>{{ $row->senin }}</td>
														<td>{{ $row->selasa }}</td>
														<td>{{ $row->rabu }}</td>
														<td class="left">{{ $row->kamis }}</td>
														<td>{{ $row->jumat }}</td>
														<td>{{ $row->sabtu }}</td>
														@auth
														@if(Auth::user()->role == 'admin')
														<td>
															<a href="{{ url('edit-murid2', $row->id) }}" class="tblEditBtn">
																<i class="fa fa-pencil"></i>
															</a>
															<a href="#" class="tblDelBtn delete" data-id="{{ $row->id }}">
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.slim.js" integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>

<script>
	$('.delete').click(function() {
		var kelas2id = $(this).attr('data-id');
		swal({
				title: "Apakah Anda Yakin?",
				text: "Anda Akan Menghapus Jadwal Kelas 2",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					window.location = "/delete2/" + kelas2id;
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