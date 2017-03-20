@extends('admin.shared')
@section('content')
    <h1><span class = "glyphicon glyphicon-folder-open addtop" aria-hidden = "true"></span>&nbsp;&nbsp;Sửa danh mục</h1>	
				<div id = "sub-main">
					<div class = "row">
						<div class = "col-xs-12 col-sm-7 col-md-8 col-lg-9">
							<ol class = "breadcrumb">
								<li>Hệ thống</li>
								<li>Sản phẩm</li>
								<li class = "active">Sửa danh mục</li>
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
					<div class = "row margin0 space-top">
						<div class = "option-h4 text-justify">
							<h4>Sửa danh mục</h4>
							<form action="" method="POST">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
								<div class = "form-group">
									<label>Kích thước</label>
									<input type = "text" class = "form-control" name="namesize" placeholder = "Nhập kích thước của bạn" value="{!! old('namesize',isset($size) ? $size['name'] : NULL) !!}">
									<p><i>Bạn nên đặt kích thước để phân loại các kích thước khác của sản phẩm.</i></p>
								</div>
                            	<button type="submit" class = "btn btn-danger btn-lg">Cập nhật</button>
							</form>
						</div>
					</div>
				</div>
@endsection()