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
		<title>Quản trị hệ thống RST Shop</title>
		
		<link rel="shortcut icon" type="image/x-icon" href="{{url('public/admin/images/icon-logo.png')}}" />
		<link href="{{url('public/admin/css/bootstrap.min.css')}}" rel="stylesheet" />
		<link href="{{url('public/admin/css/layout.css')}}" rel="stylesheet" />

		<script src="{{url('public/admin/js/jquery.min.js')}}"></script>
		<script src="{{url('public/admin/js/bootstrap.min.js')}}"></script>
		<script src="{{url('public/admin/js/chart.min.js')}}"></script>		
		
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class = "container-fluid padding0">
			<header>
				<div class = "nav-side-menu">
					<div class = "brand"><a href = "#"><img class = "img-responsive margin0auto" src = "{{url('public/admin/images/logo.png')}}" alt = "" /></a></div>
					<div class = "toggle-btn" data-toggle = "collapse" data-target = "#menu-content"></div>
					<div class = "menu-list">
						<ul id = "menu-content" class = "menu-content collapse">
							<li class = "active"><a href = "{!! URL('admin') !!}"><span class = "glyphicon glyphicon-globe" aria-hidden = "true">&nbsp;</span>Tổng quan</a></li>
							<li data-toggle = "collapse" data-target = "#category" class = "collapsed">
								<a href = "#"><span class = "glyphicon glyphicon-pencil" aria-hidden = "true">&nbsp;</span>Bài viết<span class = "caret"></span></a>
							</li>
							<ul class = "sub-menu collapse" id = "category">
								<li><a href = "{!! URL('admin/bai-viet') !!}"><span class = "glyphicon glyphicon-paperclip" aria-hidden = "true">&nbsp;</span>Tất cả bài viết</a></li>
								<li><a href = "{!! URL('admin/bai-viet/danh-muc-bai-viet') !!}"><span class = "glyphicon glyphicon-folder-open" aria-hidden = "true">&nbsp;</span>Danh mục bài viết</a></li>		
							</ul>
							<li data-toggle = "collapse" data-target = "#product" class = "collapsed">
								<a href = "#"><span class = "glyphicon glyphicon-gift" aria-hidden = "true">&nbsp;</span>Sản phẩm<span class = "caret"></span></a>
							</li>
							<ul class = "sub-menu collapse" id = "product">
								<li><a href = "{!! URL('admin/san-pham') !!}"><span class = "glyphicon glyphicon-paperclip" aria-hidden = "true">&nbsp;</span>Tất cả sản phẩm</a></li>
								<li><a href = "{!! URL('admin/san-pham/danh-muc-san-pham') !!}"><span class = "glyphicon glyphicon-folder-open" aria-hidden = "true">&nbsp;</span>Danh mục sản phẩm</a></li>
							</ul>
							<li data-toggle = "collapse" data-target = "#customer" class = "collapsed">
								<a href = "#"><span class = "glyphicon glyphicon-heart" aria-hidden = "true">&nbsp;</span>Khách hàng<span class = "caret"></span></a>
							</li>
							<ul class = "sub-menu collapse" id = "customer">
								<li><a href = "{!! URL('admin/khach-hang') !!}"><span class = "glyphicon glyphicon-user" aria-hidden = "true">&nbsp;</span>Tất cả khách hàng</a></li>
								<li><a href = "{!! URL('admin/khach-hang/hom-thu-gop-y') !!}"><span class = "glyphicon glyphicon-envelope" aria-hidden = "true">&nbsp;</span>Phản hồi</a></li>
							</ul>
							<li data-toggle = "collapse" data-target = "#extend" class = "collapsed">
								<a href = "#"><span class = "glyphicon glyphicon-random" aria-hidden = "true">&nbsp;</span>Mở rộng<span class = "caret"></span></a>
							</li>
							<ul class = "sub-menu collapse" id = "extend">
								<li><a href = "{!! URL('admin/mo-rong/gioi-thieu') !!}"><span class = "	glyphicon glyphicon-flag" aria-hidden = "true">&nbsp;</span>Giới thiệu website</a></li>
								<li><a href = "{!! URL('admin/mo-rong/lien-he') !!}"><span class = "glyphicon glyphicon-bullhorn" aria-hidden = "true">&nbsp;</span>Thông tin hê hệ</a></li>
								<li><a href = "{!! URL('admin/mo-rong/chan-trang') !!}"><span class = "glyphicon glyphicon-pushpin" aria-hidden = "true">&nbsp;</span>Footer website</a></li>
								<li><a href = "{!! URL('admin/mo-rong/slide-anh') !!}"><span class = "glyphicon glyphicon-facetime-video" aria-hidden = "true">&nbsp;</span>Slide ảnh</a></li>
								<li><a href = "{!! URL('admin/mo-rong/the-tag') !!}"><span class = "glyphicon glyphicon-tag" aria-hidden = "true">&nbsp;</span>Thẻ tag</a></li>
							</ul>
							<li data-toggle = "collapse" data-target = "#user" class = "collapsed">
								<a href = "#"><span class = "glyphicon glyphicon-user" aria-hidden = "true">&nbsp;</span>Người dùng<span class = "caret"></span></a>
							</li>
							<ul class = "sub-menu collapse" id = "user">
								<li><a href = "{!! URL('admin/nguoi-dung') !!}"><span class = "	glyphicon glyphicon-paperclip" aria-hidden = "true">&nbsp;</span>Tất cả người dùng</a></li>
								<li><a href = "{!! URL('admin/nguoi-dung/nhom-nguoi-dung') !!}"><span class = "	glyphicon glyphicon-paperclip" aria-hidden = "true">&nbsp;</span>Nhóm người dùng</a></li>
								<li data-toggle = "collapse" data-target = "#role" class = "collapsed">
									<a href = "#"><span class = "glyphicon glyphicon-lock" aria-hidden = "true">&nbsp;</span>Phân quyền<span class = "caret"></span></a>
								</li>
									<ul class = "sub-menu collapse" id = "role">
										<li><a href = "{!! URL('admin/nguoi-dung/phan-quyen') !!}"><span class = "	glyphicon glyphicon-compressed" aria-hidden = "true">&nbsp;</span>Danh sách quyền</a></li>
										<li><a href = "{!! URL('admin/nguoi-dung/phan-quyen/phan-quyen') !!}"><span class = "	glyphicon glyphicon-duplicate" aria-hidden = "true">&nbsp;</span>Phân quyền</a></li>
									</ul>
							</ul>
						</ul>
					</div>
				</div>
			</header>
			<div id = "main">
				<nav class = "navbar navbar-default">
					<ul class = "nav navbar-nav navbar-right">
						<li class = "active-child"><a href = "#">www.zeptain.vn</a></li>
						<li class = "dropdown active">
							<a href = "#" class = "dropdown-toggle" data-toggle = "dropdown" role = "button" aria-haspopup = "true" aria-expanded = "false">Zeptain Linh<span class = "caret caret-fix"></span></a>
							<ul class = "dropdown-menu">
								<li><a href = "doimatkhau.html"><span class = "glyphicon glyphicon-wrench" aria-hidden = "true">&nbsp;</span>Đổi mật khẩu</a></li>
								<li role = "separator" class = "divider"></li>
								<li><a href = "../Login/Login.html"><span class = "glyphicon glyphicon-off" aria-hidden = "true">&nbsp;</span>Thoát</a></li>
							</ul>
						</li>
					</ul>
				</nav>

                @yield('content')

				<script type = "text/javascript">
					$('.count').each(function () {
						$(this).prop('Counter',0).animate({
							Counter: $(this).text()
						}, {
							duration: 10000,
							easing: 'swing',
							step: function (now) {
								$(this).text(Math.ceil(now));
							}
						});
					});
				</script>
			</div>
			<footer>
				Bản quyền &copy; 2016. Thiết kế bởi <a href = "#" target = "_blank">RST Shop</a>
			</footer>
		</div>
	</body>
</html>