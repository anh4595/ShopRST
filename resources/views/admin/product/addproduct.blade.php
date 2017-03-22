@extends('admin.shared')
@section('content')
	<h1><span class = "glyphicon glyphicon-pencil addtop" aria-hidden = "true"></span>&nbsp;&nbsp;Sản phẩm</h1>	
	<div id = "sub-main">
		<div class = "row">
			<div class = "col-xs-12 col-sm-7 col-md-8 col-lg-9">
				<ol class = "breadcrumb">
					<li>Hệ thống</li>
					<li>Sản phẩm</li>
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
		<div class = "row margin0 space-top">
			<form action="{!! route('admin.product.addproduct') !!}" method="POST">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
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
										@endforeach()
									</ul>
								</div>
						@endif
						<div class = "panel-body">
							<div class = "form-group">
								<label>Tên sản phẩm</label>
								<input type = "text" class = "form-control" name="nameproduct" placeholder = "Nhập tiêu đề bài viết">
							</div>
							<div class = "form-group">
								<label>Metatitle</label>
								<input type = "text" class = "form-control" name="metatitle" placeholder = "xe oto can cau">
							</div>
                            <div class = "form-group">
								<label>Metakeyword</label>
								<input type = "text" class = "form-control" name="metakeyword" placeholder = "xe-o-to-can-cau">
							</div>
							<div class = "form-group">
                                <label>Mô tả nội dung</label>
								<textarea class = "form-control" name="descriptions" rows = "2"></textarea>
								<script type="text/javascript">ckeditor("descriptions")</script>
							</div>
							<div class = "form-group">
                                <label>Nội dung chi tiết</label>
								<textarea class = "form-control" name="detail" rows = "8" ></textarea>
								<script type="text/javascript">ckeditor("detail")</script>
							</div>
                	        <div class = "form-group">
								<label>Tags</label>
								<div class = "panel-body">
									<?php
										$list_tagproduct=DB::table('tags')->where('type','product')->get();
									?>
									@foreach($list_tagproduct as $tagproduct)
										<label><input type = "checkbox" name="tag[]" value="{!! $tagproduct->id !!}">{!! $tagproduct->name !!}</label>
									@endforeach
								</div>
							</div>
							<div class = "form-group">
								<label>Sizes</label>
								<div class = "panel-body">
									<?php
										$list_size=DB::table('sizes')->get();
									?>
									@foreach($list_size as $productsize)
										<label><input type = "checkbox" name="size[]" value="{!! $productsize->id !!}">{!! $productsize->name !!}</label>
									@endforeach
								</div>
							</div>
						</div>
					</div>
					<div class = "row">
						<div class = "col-xs-12 col-sm-12 col-md-7 col-lg-8">
							<div class = "panel panel-default">
								<div class = "panel-heading">
									<span class = "glyphicon glyphicon-road" aria-hidden = "true">&nbsp;</span>Số lượng
								</div>
								<div class = "panel-body">
									<div class = "form-group">
										<label>Số lượng nhập</label>
										<input type = "text" class = "form-control" name="quantity">
									</div>
								</div>
							</div>
							<div class = "panel panel-default">
								<div class = "panel-heading">
									<span class = "glyphicon glyphicon-road" aria-hidden = "true">&nbsp;</span>Quảng bá
								</div>
								<div class = "panel-body">
									<div class = "checkbox">
										<label><input type = "checkbox" name="hotflag" value="1">Sản phẩm HOT</label>
										<label style="margin-left: 5%;"><input type = "checkbox" name="homeflag" value="1" >Sản phẩm Home</label>
										<label style="margin-left: 5%;"><input type = "checkbox" name="promotionflag" value="1">Sản phẩm Sale</label>
									</div>
								</div>
							</div>
						</div>
						<div class = "col-xs-12 col-sm-12 col-md-5 col-lg-4">
							<div class = "panel panel-default">
								<div class = "panel-heading">
									<span class = "glyphicon glyphicon-road" aria-hidden = "true">&nbsp;</span>Giá cả
								</div>
								<div class = "panel-body">
									<div class = "form-group">
										<div class = "input-group">
											<label>Đơn giá</label>
											<input type = "text" class = "form-control" placeholder = "12.000" name="price">
										</div>
									</div>
									<div class = "form-group">
										<div class = "input-group">
											<label>Giá khuyến mãi</label>
											<input type = "text" class = "form-control" placeholder = "8.000" name="promotionprice">
										</div>
									</div>
								</div>
							</div>
						</div>								
					</div>
				</div>
				<div class = "col-xs-12 col-sm-12 col-md-4 col-lg-3">
					<div class = "panel panel-default">
						<div class = "panel-heading">
							<span class = "glyphicon glyphicon-folder-open" aria-hidden = "true">&nbsp;</span>Danh mục
						</div>
						<div class = "panel-body">
							<select class = "form-control" name="category_id">
								<option value="0">Không có cha</option>
                                	<?php
                                        $list_parent=DB::table('productcategories')->get();
                                    ?>
                                    @foreach($list_parent as $item)
                                        <option value="{!! $item->id !!}">{!! $item->name !!}</option>
                                     @endforeach
							</select>
						</div>
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
							<span class = "glyphicon glyphicon-picture" aria-hidden = "true">&nbsp;</span>Gallery Detail
						</div>
						<div class = "panel-body">
							<div class = "form-group">
								<input type = "file" name="imagedetail1" />
							</div>
							<div class = "form-group">
								<input type = "file" name="imagedetail2" />
							</div>
							<div class = "form-group">
								<input type = "file" name="imagedetail3" />
							</div>
							<div class = "form-group">
								<input type = "file" name="imagedetail4" />
							</div>
						</div>						
					</div>

					<div class = "panel panel-default">
						<div class = "panel-heading">
							<span class = "glyphicon glyphicon-ok" aria-hidden = "true">&nbsp;</span>Trạng thái
						</div>

						<div class = "panel-body">
							<div class = "radio">
								<label><input type="radio" name="status" value="1" checked>Hiển thị sản phẩm</label>
							</div>
							<div class = "radio">
								<label><input type="radio" name="status" value="0">Chưa hiển thị sản phẩm</label>
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
						</div>
						
						<div class = "panel-footer">
							<div class = "row margin0">
								<div class = "col-xs-6 col-sm-6 col-md-6 col-lg-6 padding0 text-right">
									<button type="submit" name="submit" class = "btn btn-danger btn-lg">Thêm mới</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection()