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
			<form>
				<span><img src = "{{url('public/login/images/user.png')}}" /></span><input type = "text" name = "username" placeholder = "Tài khoản" required /><br />
				<span><img src = "{{url('public/login/images/lock.png')}}" /></span><input type = "password" name = "password" placeholder = "Mật khẩu" required /><br />
				<div class = "mirror mirror-child">
					<input type = "submit" name = "submit" value = "Đăng nhập" onclick = "window.location.href='../Admin/index.html'">
				</div>
				<div class = "box">
					<input type = "checkbox" id = "remember" />
					<label for = "remember"><span></span>Ghi nhớ</label>
					<a href = "#">Về trang chủ</a>
				</div>
			</form>
		</div>
		<footer>
			Bản quyền &copy; 2016. Thiết kế bởi <a href = "#" target = "_blank">RST-Shop</a>
		</footer>
	</body>
</html>