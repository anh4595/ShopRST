@extends('admin.shared')
@section('content')
	<h1><span class = "glyphicon glyphicon-pencil addtop" aria-hidden = "true"></span>&nbsp;&nbsp;Slide ảnh</h1>	
				<div id = "sub-main">
					<div class = "row">
						<div class = "col-xs-12 col-sm-7 col-md-8 col-lg-9">
							<ol class = "breadcrumb">
								<li>Hệ thống</li>
								<li>Slide ảnh</li>
								<li class="active">Thêm mới</li>
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
						<div class = "col-xs-12 col-sm-12 col-md-8 col-lg-9">
							<div class = "panel panel-default">
								<div class = "panel-heading">
									<span class = "glyphicon glyphicon-pencil addtop" aria-hidden = "true">&nbsp;</span>Thông tin sản phẩm
								</div>
								@if(count($errors)>0)
								<div class="alert alert-danger">
									<ul>
										@foreach($errors->all() as $error)
											<li>{!! $error !!}</li>
										@endforeach
									</ul>
								</div>
								@endif
								<div class = "panel-body">
									<form action="{!! route('admin.extend.addslide') !!}" method="POST">
										<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
										<div class = "form-group">
											<label>Tên slide ảnh</label>
											<input type = "text" class = "form-control" name="nameslide" placeholder = "Nhập tiêu đề bài viết">
										</div>
										<div class = "panel panel-default">
											<div class = "panel-heading">
												<span class = "glyphicon glyphicon-picture" aria-hidden = "true">&nbsp;</span>Ảnh đại diện
											</div>
											<div class = "panel-body">
												<div class = "form-group">
													<input type = "file" name="image">
												</div>
											</div>
										</div>
										<div class = "panel panel-default">
											<div class = "panel-heading">
												<span class = "glyphicon glyphicon-ok" aria-hidden = "true">&nbsp;</span>Trạng thái
											</div>
											<div class = "panel-body">
												<div class = "radio">
													<label><input type="radio" name="status" value="1" checked>Hiển thị slide ảnh</label>
												</div>
												<div class = "radio">
													<label><input type="radio" name="status" value="0">Chưa hiển thị slide ảnh</label>
												</div>
											</div>
										</div>
										<button type="submit" name="submit" class = "btn btn-danger btn-lg">Thêm mới</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
@endsection()