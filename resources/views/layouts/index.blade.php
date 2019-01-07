<!DOCTYPE html>
<html>
<head>
	<title>March Fashion</title>
	<meta charset=utf-8>
	<meta name=description content="">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="{{ asset('uploads/icons/favicon1.png') }}"/>
	<!-- Font -->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/ai-telesale-font/styles.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/fontawesome/css/all.min.css') }}">
	<!-- CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>
	<!-- Header -->
	@include('layouts.header')
	<!-- End Header -->

	<!-- Content -->
	@yield('content')
	<!-- End Content -->

	<!-- Footer -->
	@include('layouts.footer')
	<!-- End Footer -->

	<!-- JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://unpkg.com/jquery-aniview/dist/jquery.aniview.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

	<script src="{{ asset('js/bootstrap.min.js') }}"></script>

	<script src="{{ asset('vendor/slick/slick.min.js') }}"></script>

	<script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>

	<script src="{{ asset('js/vue.js') }}"></script>

	<script src="{{ asset('js/main.js') }}"></script>

	<!-- <script src="js/header-sidebar.js"></script> -->

</body>
</html>