<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- BEGIN HEAD -->

<head>
	@include('template.header')
</head>
<!-- END HEAD -->

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
	<div class="page-wrapper">
		<!-- start header -->
		@include('template.navbar')
		<!-- end header -->
		<!-- start color quick setting -->

		<!-- end color quick setting -->
		<!-- start page container -->
		<div class="page-container">
			<!-- start sidebar menu -->
			@include('template.sidebar')
			<!-- end sidebar menu -->
			<!-- start page content -->

			@yield('content')


			<!-- end chat sidebar -->
		</div>

		<!-- end page container -->
		<!-- start footer -->
		@include('template.footer')
		<!-- end footer -->
	</div>
	<!-- start js include path -->
	@include('template.script')
	<!-- end js include path -->
</body>

</html>