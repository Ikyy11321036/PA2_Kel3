@extends('template.layout')

@section('content')

<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Siswa</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('dashboard') }}">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Siswa</li>
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
						<li class="nav-item"><a href="#tab2" class="nav-link" data-bs-toggle="tab">Grid
								View</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active fontawesome-demo" id="tab1">
							<div class="row">
								<div class="col-md-12">
									<div class="card card-box">
										<div class="card-head">
											<header>Semua Siswa</header>
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
														<a href="{{  route('siswatambah') }}" id="addRow" class="btn btn-primary">
															Tambah Siswa <i class="fa fa-plus"></i>
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
														<th> Foto Profil </th>
														<th> Nama </th>
														<th> NISN </th>
														<th> Jenis Kelamin </th>
														<th> Tempat/Tanggal Lahir </th>
														<th> Kelas </th>
                                                        <th> Agama </th>
                                                        <th> Alamat </th>
                                                        <th> Nomor Telepon </th>
                                                        <th> Dibuat </th>
														@auth
														@if(Auth::user()->role == 'admin')
														<th> Action </th>
														@endif
														@endauth
													</tr>
												</thead>
												<tbody>
													@php
													$no=1;
													@endphp
													@foreach ($siswa as $row)
													<tr class="odd gradeX">
														<td>{{ $no++ }}</td>
														<td>
															<img src="{{ asset('fotodata/'.$row->foto) }}" style="width: 60px;" alt="">
														</td>
														<td>{{ $row->username }}</td>
														<td>{{ $row->nisn }}</td>
														<td class="left">{{ $row->jenis_kelamin }}</td>
														<td>{{ $row->tpt_lahir }}, {{ $row->tgl_lahir }}</td>
                                                        <td>{{ $row->kelas }}</td>
                                                        <td>{{ $row->agama }}</td>
                                                        <td>{{ $row->alamat }}</td>
                                                        <td>{{ $row->no_telepon }}</td>
														<td>{{ $row->created_at->diffForHumans() }}</td>
														@auth
														@if(Auth::user()->role == 'admin')
														<td>
															<a href="{{ route('editstudents', $row->id) }}" class="tblEditBtn">
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
						<div class="tab-pane" id="tab2">
							<div class="row">
								@foreach ($siswa as $row)
								<div class="col-md-4">
									<div class="card card-box">
										<div class="card-body no-padding ">
											<div class="doctor-profile">
												<img src="{{ asset('fotodata/'.$row->foto) }}" style="width: 90px; border-radius: 50%;" class="doctor-pic" alt="">
												<div class="profile-usertitle">
													<div class="doctor-name">{{ $row->username }}</div>
													<div class="name-center"> {{ $row->kelas }} </div>
												</div>
												<p>{{ $row->alamat }}</p>
												<div>
													<p><i class="fa fa-phone"></i><a
													href="{{ $row->telpon }}"> {{ $row->no_telepon }}</a></p>
												</div>
											</div>
										</div>
									</div>
								</div>
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.slim.js" integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>

<script>
	$('.delete').click(function() {
		var studentid = $(this).attr('data-id');
		swal({
				title: "Apakah Anda Yakin?",
				text: "Anda Akan Menghapus Data Siswa Tersebut",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					window.location = "/deletestudent/" + studentid;
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