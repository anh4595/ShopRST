@extends('admin.shared')
@section('content')
	<h1><span class = "glyphicon glyphicon-pencil addtop" aria-hidden = "true"></span>&nbsp;&nbsp;Liên hệ</h1>	
				<div id = "sub-main">
					<div class = "row">
						<div class = "col-xs-12 col-sm-7 col-md-8 col-lg-9">
							<ol class = "breadcrumb">
								<li>Hệ thống</li>
								<li>Liên hệ</li>
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
									<span class = "glyphicon glyphicon-pencil addtop" aria-hidden = "true">&nbsp;</span>Thông tin liên hệ
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
									<form action="{!! route('admin.extend.addcontact') !!}" method="POST">
										<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
										<div class = "form-group">
											<label>Tên công ty</label>
											<input type = "text" class = "form-control" name="namecompany" placeholder = "Nhập tên người đại diện liên hệ">
										</div>
										<div class = "form-group">
											<label>Số điện thoại</label>
											<input type = "text" class = "form-control" name="phone" placeholder = "Nhập số điện thoai công ty">
										</div>
                                        <div class = "form-group">
											<label>Email</label>
											<input type = "text" class = "form-control" name="email" placeholder = "Nhập địa chỉ email công ty">
										</div>
                                        <div class = "form-group">
											<label>Địa chỉ website</label>
											<input type = "text" class = "form-control" name="website" placeholder = "Nhập địa chỉ website công ty">
										</div>
                                         <div class = "form-group">
											<label>Địa chỉ công ty</label>
											<input type = "text" class = "form-control" name="address" placeholder = "Nhập địa chỉ công ty">
										</div>
                                        <div class = "form-group">
											<label>lat</label>
											<input type = "text" class = "form-control" name="lat" placeholder = "Nhập tọa độ x">
										</div>
                                        <div class = "form-group">
											<label>lng</label>
											<input type = "text" class = "form-control" name="lng" placeholder = "Nhập tọa độ y">
										</div>
										<div class = "panel panel-default">
											<div class = "panel-heading">
												<span class = "glyphicon glyphicon-ok" aria-hidden = "true">&nbsp;</span>Trạng thái
											</div>
											<div class = "panel-body">
												<div class = "radio">
													<label><input type="radio" name="status" value="1" checked>Hiển thị liên hệ</label>
												</div>
												<div class = "radio">
													<label><input type="radio" name="status" value="0">Chưa hiển thị liên hệ</label>
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