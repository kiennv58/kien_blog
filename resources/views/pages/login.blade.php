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
				<div class="col-sm-4 col-sm-offset-4">
					<div class="box-login">
						<div class="panel panel-success">
							<div class="panel-heading">Đăng nhập</div>
							<div class="panel-body">
								@foreach ($errors as $er)
									<div class="alert alert-danger">
									{{ $er }}<br>
									</div>
								@endforeach
								@if (session('note'))
								<div class="alert alert-danger">
									{{ session('note') }}
								</div>
								@endif
									<form action="dangnhap" method="post" accept-charset="utf-8">
										{{ csrf_field() }}
										<div class="form-group">
									    <label for="exampleInputEmail1">Email address</label>
									    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email">
									  	</div>
									  	<div class="form-group">
									    <label for="exampleInputPassword1">Password</label>
									    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
									  	</div>
									  	<div class="checkbox">
									    <label>
									      <input type="checkbox" name="remember"> Nhớ đăng nhập
									    </label>
									  	</div>
									  	<button type="submit" class="btn btn-success">Đăng nhập</button>
									</form>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
@include('front.layouts.footer')

@yield('script')

</body>
</html>