@extends('admin.shared')
@section('content')
<?php
	$list_feedbacks = DB::table('feedbacks')->orderBy('id')->get();
	$count_feedback = count($list_feedbacks);
?>
	<h1><span class = "glyphicon glyphicon-envelope addtop" aria-hidden = "true"></span>&nbsp;&nbsp;Hòm thư</h1>	
				<div id = "sub-main">
					<div class = "row">
						<div class = "col-xs-12 col-sm-7 col-md-8 col-lg-9">
							<ol class = "breadcrumb">
								<li>Hệ thống</li>
								<li class="active">Hòm thư</li>
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
						<div class = "col-xs-12 col-sm-5 col-md-7 col-lg-7"></div>
						<div class = "col-xs-12 col-sm-7 col-md-5 col-lg-5">
							<div class = "input-group text-right">
								<input type = "text" class = "form-control" placeholder = "Bạn cần tìm gì?">
								<span class = "input-group-btn">
									<button class = "btn btn-danger" type = "button">Tìm kiếm</button>
								</span>
							</div>
						</div>
					</div>
					<div class = "row space-top box-total">
						<div class = "col-xs-12 col-sm-8 col-md-7 col-lg-6">
							<span><i>Tổng số thư: </i><strong>{!! $count_feedback !!}</strong></span>
						</div>
						<div class = "col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right">
							<div class = "btn btn-danger btn-a">
								<a href = "#">Xóa tất cả</a>
							</div>
						</div>
					</div>
					<div class = "row margin0">
						<div class = "table-responsive homthu">
							<table class = "table table-striped table-bordered">
								<thead>
									<tr>
										<th><input type = "checkbox" value = "" /></th>
										<th>Tên người gửi</th>
										<th>Email</th>
										<th>Tiêu đề</th>
										<th>Nội dung</th>
										<th>Ngày gửi</th>
										<th>Chức năng</th>
									</tr>
								</thead>
								@foreach($list_feedbacks as $item)
								{			
									<tr>
										<td><input type = "checkbox" value = "" /></td>
										<td>{!! $item->name !!}</td>
										<td>{!! $item->email !!}</td>
										<td>{!! $item->subject !!}</td>
										<td>{!! $item->message !!}</td>
										<td>{!! $item->created_at !!}</td>
										<td><a href = "#">Xóa</a></td>
									</tr>
								}
								@endforeach
							</table>
						</div>
						<nav>
							<ul class="pagination">
								<li>
									<a href="#" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
									</a>
								</li>
								<li class = "active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li>
									<a href="#" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
									</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
@endsection()