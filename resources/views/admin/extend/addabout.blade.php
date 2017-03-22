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
									<form action="{!! route('admin.extend.addabout') !!}" method="POST" >
										<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
										<div class = "form-group">
											<label>Tên bài viết</label>
											<input type = "text" class = "form-control" name="nameabout" placeholder = "Nhập tiêu đề bài giới thiệu">
										</div>
										<div class = "form-group">
                                            <label>Nội dung chi tiết</label>
											<textarea class = "form-control" name="detail" rows = "8" ></textarea>
											<script type="text/javascript">ckeditor("detail")</script>
										</div>
										<div class = "form-group">
											<label>Ngày đăng</label>
											<?php 
												$timezone = +7;
												echo '<input type="text"  class = "form-control" value="'.gmdate("d-m-Y", time() + 3600*($timezone+date("I"))).'">';
											?>
										</div>
										<div class = "form-group">
											<label>Người đăng</label>
											<input type="text" class = "form-control" name="createby">
										</div>
										<div class = "form-group">
											<label>Người cập nhật</label>
											<input type="text" class = "form-control" name="updateby">
										</div>
										<div class = "panel panel-default">
											<div class = "panel-heading">
												<span class = "glyphicon glyphicon-ok" aria-hidden = "true">&nbsp;</span>Trạng thái
											</div>
											<div class = "panel-body">
												<div class = "radio">
													<label><input type="radio" value="1" name="status" checked>Hiển thị bài giới thiệu</label>
												</div>
												<div class = "radio">
													<label><input type="radio" value="0" name="status">Chưa hiển thị bài giới thiệu</label>
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