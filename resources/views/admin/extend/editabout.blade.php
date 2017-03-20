@extends('admin.shared')
@section('content')
	<h1><span class = "glyphicon glyphicon-pencil addtop" aria-hidden = "true"></span>&nbsp;&nbsp;Giới thiệu</h1>	
				<div id = "sub-main">
					<div class = "row">
						<div class = "col-xs-12 col-sm-7 col-md-8 col-lg-9">
							<ol class = "breadcrumb">
								<li>Hệ thống</li>
								<li>Giới thiệu</li>
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
									<span class = "glyphicon glyphicon-pencil addtop" aria-hidden = "true">&nbsp;</span>Thông tin giới thiệu
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
									<form action="" method="POST" >
										<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
										<div class = "form-group">
											<label>Tên bài viết</label>
											<input type = "text" class = "form-control" name="nameabout" placeholder = "Nhập tiêu đề bài giới thiệu" value="{!! old('nameabout',isset($about) ? $about['name'] : NULL) !!}">
										</div>
										<div class = "form-group">
                                            <label>Nội dung chi tiết</label>
											<textarea class = "form-control" name="detail" rows = "8" value="{!! old('detail',isset($about) ? $about['detail'] : NULL) !!}" ></textarea>
										</div>
										<div class = "form-group">
											<label>Người đăng</label>
											<input type="text" class = "form-control" name="createby" value="{!! old('createby',isset($about) ? $about['createdby'] : NULL) !!}">
										</div>
										<div class = "form-group">
											<label>Người cập nhật</label>
											<input type="text" class = "form-control" name="updateby" value="{!! old('updateby',isset($about) ? $about['updatedby'] : NULL) !!}">
										</div>
										<button type="submit" name="submit" class = "btn btn-danger btn-lg">Cập nhật</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
@endsection()