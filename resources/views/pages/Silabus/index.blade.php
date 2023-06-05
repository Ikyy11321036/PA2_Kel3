@extends('template.layout')

@section('content')

<style>
		body {
			margin: 0;
			padding: 0;
		}
		
		h4 {
			margin: 10px 0;
		}
		
		.kotak {
			display: grid;
			grid-template-columns: repeat(4, 1fr);
			gap: 10px;
		}
		
		.kotak div {
			width: 170px;
			height: 50px;
			border: 1px solid #ccc;
			display: flex;
			justify-content: center;
			align-items: center;
			font-size: 24px;
			transition: background-color 0.3s ease-in-out;
			cursor: pointer;
		}
		
		.kotak div:hover {
			background-color: #6673fc;
		}
		
		.bawah {
			display: grid;
			grid-template-columns: repeat(4, 1fr);
			gap: 10px;
			margin-top: 20px;
		}

        a {
            color: black;
            text-decoration: none;
          }

          .kotak a {
    color: black;
    text-decoration: none;
  }

  .kotak a:hover {
    color: white;
  }
	</style>

<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Silabus Mata Pelajaran</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('dashboard') }}">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="{{ route('indexsilabus') }}">Mata Pelajaran</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Silabus</li>
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
											<header>Silabus</header>
											<div class="tools">
												<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
												<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
												<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
											</div>
										</div>
										<div class="card-body ">
											<div class="row">
												<div class="col-md-6 col-sm-6 col-6">
                                                <h4>Pilih Silabus:</h4>
                                                    <div class="kotak">
                                                    <h5><a href="{{ route('indexagamasilabus') }}"><div>Agama</div></a></h5>
                                                    <h5><a href="{{ route('indexppknsilabus') }}"><div>PPKN</div></a></h5>
                                                    <h5><a href="{{ route('indexindosilabus') }}"><div>B.Indo</div></a></h5>
                                                    <h5><a href="{{ route('indexmtksilabus') }}"><div>Matematika</div></a></h5>
                                                    <h5><a href="{{ route('indexipasilabus') }}"><div>IPA</div></a></h5>
                                                    <h5><a href="{{ route('indexipssilabus') }}"><div>IPS</div></a></h5>
                                                    <h5><a href="{{ route('indexsbksilabus') }}"><div>SBK</div></a></h5>
                                                    <h5><a href="{{ route('indexpenjassilabus') }}"><div>Penjas</div></a></h5>
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