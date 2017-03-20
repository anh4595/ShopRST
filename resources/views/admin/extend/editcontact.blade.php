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
									<form action="" method="POST">
										<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
										<div class = "form-group">
											<label>Tên công ty</label>
											<input type = "text" class = "form-control" name="namecompany" placeholder = "Nhập tên người đại diện liên hệ" value="{!! old('namecompany',isset($contact) ? $contact['name'] : NULL) !!}"> 
										</div>
										<div class = "form-group">
											<label>Số điện thoại</label>
											<input type = "text" class = "form-control" name="phone" placeholder = "Nhập số điện thoai công ty" value="{!! old('phone',isset($contact) ? $contact['phone'] : NULL) !!}">
										</div>
                                        <div class = "form-group">
											<label>Email</label>
											<input type = "text" class = "form-control" name="email" placeholder = "Nhập địa chỉ email công ty" value="{!! old('email',isset($contact) ? $contact['email'] : NULL) !!}">
										</div>
                                        <div class = "form-group">
											<label>Địa chỉ website</label>
											<input type = "text" class = "form-control" name="website" placeholder = "Nhập địa chỉ website công ty" value="{!! old('website',isset($contact) ? $contact['website'] : NULL) !!}">
										</div>
                                         <div class = "form-group">
											<label>Địa chỉ công ty</label>
											<input type = "text" class = "form-control" name="address" placeholder = "Nhập địa chỉ công ty" value="{!! old('address',isset($contact) ? $contact['address'] : NULL) !!}">
										</div>
                                        <div class = "form-group">
											<label>lat</label>
											<input type = "text" class = "form-control" name="lat" placeholder = "Nhập tọa độ x" value="{!! old('lat',isset($contact) ? $contact['lat'] : NULL) !!}">
										</div>
                                        <div class = "form-group">
											<label>lng</label>
											<input type = "text" class = "form-control" name="lng" placeholder = "Nhập tọa độ y" value="{!! old('lng',isset($contact) ? $contact['lng'] : NULL) !!}">
										</div>
										<button type="submit" name="submit" class = "btn btn-danger btn-lg">Cập nhật</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
@endsection()