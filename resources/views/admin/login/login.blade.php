<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="format-detection" content="telephone=no">
		<base href="" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="copyright" content="" />
		<title>Quản trị hệ thống RST-Shop</title>
		
		<link rel="shortcut icon" type="image/x-icon" href = "{{url('public/login/images/icon-logo.png')}}" />
		<link href="{{url('public/login/css/layout.css')}}" rel="stylesheet" />

		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class = "Zeptain">
			<h2>Đăng nhập</h2>
				@if(count($errors)>0)
					<div class="alert alert-danger" style="margin-left:10%;margin-top:3%">
						<ul style="color:white">
							@foreach($errors->all() as $error)
								<li style="">{!! $error !!}</li>
							@endforeach
						</ul>
					</div>
				@endif
			<form role="form" action="{!! url('admin/login') !!}" method="POST">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
				<span>
					<img src = "{{url('public/login/images/user.png')}}" />
				</span>
				<input type = "text" name = "username" id="username" placeholder = "Tài khoản"  autofocus/><br />

				<span>
					<img src = "{{url('public/login/images/lock.png')}}" />
				</span>
				<input type = "password" name = "password" id="password" placeholder = "Mật khẩu" /><br />

				<div class = "mirror mirror-child">
					<input type = "submit" name = "submit" value = "Đăng nhập">
				</div>
			</form>
		</div>
		<footer>
			Bản quyền &copy; 2016. Thiết kế bởi <a href = "#" target = "_blank">RST-Shop</a>
		</footer>
	</body>
</html>