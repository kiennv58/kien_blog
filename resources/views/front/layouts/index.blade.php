<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<base href="{{ asset('') }}">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!-- 	<link rel="stylesheet" href="css/owl.carousel.min.css">
  	<link rel="stylesheet" href="css/owl.theme.default.min.css"> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- <script src="js/owl.carousel.min.js"></script> -->
	<script>
	</script>
</head>
<body>
	<header>
		@include('front.layouts.header')
	</header><!-- /header -->
	<section>
		<div class="container-fluid">
			<div class="container">
				<div class="col-md-9">
					@yield('content')
				</div>
				<div class="col-md-3">
					@include('front.layouts.right_cate')
				</div>
			</div>
		</div>
	</section>
	
@include('front.layouts.footer')

@yield('script')

</body>
</html>