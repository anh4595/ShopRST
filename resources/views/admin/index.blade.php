@extends('admin.shared')
@section('content')
	<h1><span class = "glyphicon glyphicon-globe addtop" aria-hidden = "true"></span>&nbsp;&nbsp;Tổng quan</h1>	
				<div id = "sub-main">
					<div class = "row">
						<div class = "col-xs-12 col-sm-7 col-md-8 col-lg-9">
							<ol class = "breadcrumb">
								<li>Hệ thống</li>
								<li class="active">Tổng quan</li>
							</ol>
						</div>
						<div class = "hidden-xs col-sm-5 col-md-4 col-lg-3 text-right">
							<div class = "timecount" style="text-align:center">
							<?php 
								$timezone = +7;
								echo gmdate("H:i:s | d-m-Y ", time() + 3600*($timezone+date("I"))).'';
							?>
							</div>
						</div>
					</div>
					<div class = "row space-top">
						<div class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
							<div class = "box-main">
								<div class = "circle">
									<div class = "glyphicon glyphicon-signal"></div>
								</div>
								<h4><span class="count">3452</span></h4>
								<h5>Đang truy cập</h5>
							</div>
						</div>
						<div class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
							<div class = "box-main">
								<div class = "circle">
									<div class = "glyphicon glyphicon-user"></div>
								</div>
								<h4><span class="count">2139</span></h4>
								<h5>Số thành viên</h5>
							</div>
						</div>
						<div class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
							<div class = "box-main">
								<div class = "circle">
									<div class = "glyphicon glyphicon-duplicate"></div>
								</div>
								<h4><span class="count">7890</span></h4>
								<h5>Số bài viết</h5>
							</div>
						</div>
						<div class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
							<div class = "box-main">
								<div class = "circle">
									<div class = "glyphicon glyphicon-gift"></div>
								</div>
								<h4><span class="count">6092</span></h4>
								<h5>Số sản phẩm</h5>
							</div>
						</div>
					</div>
					<div class = "row space-top">
						<div class = "col-xs-12 col-sm-12 col-md-7 col-lg-8">
							<div class = "panel panel-default">
								<div class = "panel-heading">
									<span class = "glyphicon glyphicon-signal" aria-hidden = "true">&nbsp;</span>Biểu đồ lượng truy cập
								</div>
								<div class = "panel-body">
									<div class = "box-fix">
										<canvas id = "daily-activity"></canvas>
									</div>
									<script type = "text/javascript">
										var ctx = document.getElementById("daily-activity").getContext("2d");
										Chart.defaults.global.responsive = true;
										var data = {
										  labels: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "CN"],
										  datasets: [{
											label: "MyChart-Daily",
											fillColor: "rgba(243, 81, 72, 0.05)",
											strokeColor: "#F35148",
											pointColor: "#F35148",
											pointStrokeColor: "#F35148",
											pointHighlightFill: "#F5BB69",
											pointHighlightStroke: "F35148",
											data: [28, 48, 40, 19, 86, 27, 90]
										  }]
										};
										var MyNewChart = new Chart(ctx).Line(data);
									</script>
								</div>
								<div class = "panel-footer text-center">
									<em>Biểu đồ lượng người dùng truy cập hàng tuần</em>
								</div>
							</div>
						</div>
						<div class = "col-xs-12 col-sm-12 col-md-5 col-lg-4">
							<div class = "panel panel-default">
								<div class = "panel-heading">
									<span class = "glyphicon glyphicon-road" aria-hidden = "true">&nbsp;</span>Hoạt động gần đây
								</div>
								<div class = "panel-body">
									<ul class = "list-group">
										<li class = "list-group-item"><span class = "badge">3 phút trước</span> Zeptain đăng nhập </li>
										<li class = "list-group-item"><span class = "badge">20 phút trước</span> Phạm Trung Bắc đăng xuất </li>
										<li class = "list-group-item"><span class = "badge">8 tiếng trước</span> Zeptain đăng xuất </li>
										<li class = "list-group-item"><span class = "badge">17 ngày trước</span> Phạm Trung Bắc đăng nhập </li>
										<li class = "list-group-item"><span class = "badge">1 tháng trước</span> Zeptain đăng xuất </li>
										<li class = "list-group-item"><span class = "badge">1 tháng trước</span> Phạm Trung Bắc đăng xuất </li>
										<li class = "list-group-item"><span class = "badge">1 tháng trước</span> Phạm Trung Bắc đăng nhập </li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class = "row">
						<div class = "col-xs-12 col-sm-12 col-md-5 col-lg-5">
							<div class = "panel panel-default">
								<div class = "panel-heading">
									<span class = "glyphicon glyphicon-globe" aria-hidden = "true">&nbsp;</span>Biểu đồ trình duyệt
								</div>
								<div class = "panel-body">
									<div class = "box-fix">
										<canvas id = "browser"></canvas>
									</div>
									<script type = "text/javascript">
										var ctx = document.getElementById("browser").getContext("2d");
										Chart.defaults.global.responsive = true;
										var data = [
											{
												value: 500,
												color:"#F35148",
												highlight: "#FF5A5E",
												label: "Chrome"
											},
											{
												value: 380,
												color: "#F5BB69",
												highlight: "#FCC87E",
												label: "FireFox"
											},
											{
												value: 430,
												color: "#5CB85C",
												highlight: "#6DD16D",
												label: "Cốc Cốc"
											},
											{
												value: 220,
												color:"#BF8755",
												highlight: "#D29B6A",
												label: "IE"
											},
											{
												value: 320,
												color: "#A74E9E",
												highlight: "#BF63B5",
												label: "Safari"
											},
											{
												value: 185,
												color: "#03A9F4",
												highlight: "#35C0FF",
												label: "Opera"
											}
										]

										var MyNewChart = new Chart(ctx).Doughnut(data);
									</script>
								</div>
								<div class = "panel-footer label-browser">
									<div class = "row margin0 ">
										<div class = "col-xs-6 col-sm-4 col-md-4 col-lg-4 img-label">
											<span>linh</span> Chrome
										</div>
										<div class = "col-xs-6 col-sm-4 col-md-4 col-lg-4 img-label">
											<span>linh</span> FireFox
										</div>
										<div class = "col-xs-6 col-sm-4 col-md-4 col-lg-4 img-label">
											<span>linh</span> Cốc cốc
										</div>
										<div class = "col-xs-6 col-sm-4 col-md-4 col-lg-4 img-label">
											<span>linh</span> IE
										</div>
										<div class = "col-xs-6 col-sm-4 col-md-4 col-lg-4 img-label">
											<span>linh</span> Safari
										</div>
										<div class = "col-xs-6 col-sm-4 col-md-4 col-lg-4 img-label">
											<span>linh</span> Opera
										</div>
									</div>
								</div>
							</div>
							<div class = "well well-sm">
								<i>"Hãy sống và khát vọng, để thấy cuộc đời rộng lớn bao la, để ta có thể thoả sức bay cao bay xa"</i> - <strong>Zeptain</strong> 
							</div>
						</div>
						<div class = "col-xs-12 col-sm-12 col-md-7 col-lg-7">
							<div class = "panel panel-default">
								<div class = "panel-heading">
									<span class = "glyphicon glyphicon-stats" aria-hidden = "true">&nbsp;</span>Biểu đồ ngân sách
								</div>
								<div class = "panel-body">
									<div class = "box-fix">
										<canvas id = "balance"></canvas>
									</div>
									<script type = "text/javascript">
										var ctx = document.getElementById("balance").getContext("2d");
										Chart.defaults.global.responsive = true;
										var data = {
										  labels: ["Th.1", "Th.2", "Th.3", "Th.4", "Th.5", "Th.6", "Th.7", "Th.8", "Th.9", "Th.10", "Th.11", "Th.12" ],
										  datasets: [{
											label: "First-Column",
											fillColor: "#F5BB69",
											strokeColor: "#F5BB69",
											pointColor: "#F5BB69",
											pointStrokeColor: "#fff",
											pointHighlightFill: "#fff",
											pointHighlightStroke: "#F5BB69",
											data: [65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56]
										  }, {
											label: "Second-Column",
											fillColor: "#F35148",
											strokeColor: "#F35148",
											pointColor: "#F35148",
											pointStrokeColor: "#fff",
											pointHighlightFill: "#fff",
											pointHighlightStroke: "#F35148",
											data: [28, 48, 40, 19, 86, 27, 90, 74, 39, 67, 57, 81]
										  }]
										};
										var MyNewChart = new Chart(ctx).Bar(data, {barValueSpacing : 8 });
									</script>
								</div>
								<div class = "panel-footer text-center ">
									<em>Biểu đồ lượng thu - chi trong năm</em>
									<div class = "row margin0 thu-chi">
										<div class = "col-xs-12 col-sm-6 col-md-6 col-lg-6 bg-thuchi">
											<h6><span>linh</span> Thu nhập trong tháng</h6>
										</div>
										<div class = "col-xs-12 col-sm-6 col-md-6 col-lg-6 bg-thuchi">
											<h6><span>linh</span> Chi tiêu trong tháng</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class = "row">
						<div class = "col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class = "panel panel-default">
								<div class = "panel-heading">
									<span class = "glyphicon glyphicon-pencil" aria-hidden = "true">&nbsp;</span>Bài viết mới nhất
								</div>
								<div class = "panel-body">
									<ul class = "list-group">
										<li class = "list-group-item"><span class = "badge">3 phút trước</span> Sự kiện khuyến mại lớn nhất trong năm 2016 </li>
										<li class = "list-group-item"><span class = "badge">20 phút trước</span> Giảm giá thả ga, nhà nhà mua sắm </li>
										<li class = "list-group-item"><span class = "badge">8 tiếng trước</span> Đợt hạ giá nóng nhất từ trước đến nay </li>
										<li class = "list-group-item"><span class = "badge">17 ngày trước</span> Bạn là người thắng cuộc, nhận giải không? </li>
										<li class = "list-group-item"><span class = "badge">1 tháng trước</span> Sắp diễn ra sự kiện khuyến mại tại Hà Nội </li>
										<li class = "list-group-item"><span class = "badge">1 năm trước</span> Chào mừng ngày mua sắm "tẹt bô" 2015 </li>
									</ul>
								</div>
								<div class = "panel-footer text-right readmore">
									<a href = "#"><span class = "glyphicon glyphicon-triangle-right" aria-hidden = "true"></span> Xem thêm</a>
								</div>
							</div>
						</div>
						<div class = "col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class = "panel panel-default">
								<div class = "panel-heading">
									<span class = "glyphicon glyphicon-gift" aria-hidden = "true">&nbsp;</span>Sản phẩm mới nhất
								</div>
								<div class = "panel-body">
									<ul class = "list-group">
										<li class = "list-group-item"><span class = "badge">3 phút trước</span> Xperia Z5 Compact mới ra mắt 2016</li>
										<li class = "list-group-item"><span class = "badge">20 phút trước</span> OPPO Neo 3 - đẳng cấp mãi mãi</li>
										<li class = "list-group-item"><span class = "badge">8 tiếng trước</span> Samsung Galaxy S5 - Không thể chê!</li>
										<li class = "list-group-item"><span class = "badge">17 ngày trước</span> Iphone 6S - ngôi vị quán quân iOS </li>
										<li class = "list-group-item"><span class = "badge">1 tháng trước</span> Ipad Mini - còn chờ gì nữa mà không khám phá</li>
										<li class = "list-group-item"><span class = "badge">1 tháng trước</span> Kingzone K1 - ngon trong tầm giá </li>
									</ul>
								</div>
								<div class = "panel-footer text-right readmore">
									<a href = "#"><span class = "glyphicon glyphicon-triangle-right" aria-hidden = "true"></span> Xem thêm</a>
								</div>
							</div>
						</div>
					</div>
					<div class = "row">
						<div class = "col-xs-12 col-sm-6 col-md-3 col-lg-3 bg-fanpage">
							<div class = "panel panel-default fanpage">
								<div class = "panel-heading mirror mirror-child">
									<a href = "#">Facebook</a>
								</div>
								<div class = "panel-body font-fanpage text-center">
									<div class = "row margin0">
										<div class = "col-xs-6 col-sm-6 col-md-6 col-lg-6 padding0 b-r">
											<h5><span class="count">2313</span></h5>
											<p>Friends</p>
										</div>
										<div class = "col-xs-6 col-sm-6 col-md-6 col-lg-6 padding0">
											<h5><span class="count">1220</span></h5>
											<p>Like</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class = "col-xs-12 col-sm-6 col-md-3 col-lg-3 bg-fanpage">
							<div class = "panel panel-default fanpage">
								<div class = "panel-heading mirror mirror-child">
									<a href = "#">Twitter</a>
								</div>
								<div class = "panel-body font-fanpage text-center">
									<div class = "row margin0">
										<div class = "col-xs-6 col-sm-6 col-md-6 col-lg-6 padding0 b-r">
											<h5><span class="count">2313</span></h5>
											<p>Friends</p>
										</div>
										<div class = "col-xs-6 col-sm-6 col-md-6 col-lg-6 padding0">
											<h5><span class="count">1220</span></h5>
											<p>Like</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class = "col-xs-12 col-sm-6 col-md-3 col-lg-3 bg-fanpage">
							<div class = "panel panel-default fanpage">
								<div class = "panel-heading mirror mirror-child">
									<a href = "#">Youtube</a>
								</div>
								<div class = "panel-body font-fanpage text-center">
									<div class = "row margin0">
										<div class = "col-xs-6 col-sm-6 col-md-6 col-lg-6 padding0 b-r">
											<h5><span class="count">2313</span></h5>
											<p>Friends</p>
										</div>
										<div class = "col-xs-6 col-sm-6 col-md-6 col-lg-6 padding0">
											<h5><span class="count">1220</span></h5>
											<p>Like</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class = "col-xs-12 col-sm-6 col-md-3 col-lg-3 bg-fanpage">
							<div class = "panel panel-default fanpage">
								<div class = "panel-heading mirror mirror-child">
									<a href = "#">Google+</a>
								</div>
								<div class = "panel-body font-fanpage text-center">
									<div class = "row margin0">
										<div class = "col-xs-6 col-sm-6 col-md-6 col-lg-6 padding0 b-r">
											<h5><span class="count">2313</span></h5>
											<p>Friends</p>
										</div>
										<div class = "col-xs-6 col-sm-6 col-md-6 col-lg-6 padding0">
											<h5><span class="count">1220</span></h5>
											<p>Like</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
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
@endsection()