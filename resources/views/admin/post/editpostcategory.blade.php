@extends('admin.shared')
@section('content')
    <h1><span class = "glyphicon glyphicon-folder-open addtop" aria-hidden = "true"></span>&nbsp;&nbsp;Sửa danh mục</h1>	
				<div id = "sub-main">
					<div class = "row">
						<div class = "col-xs-12 col-sm-7 col-md-8 col-lg-9">
							<ol class = "breadcrumb">
								<li>Hệ thống</li>
								<li>Bài viết</li>
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
									<label>Tên danh mục</label>
									<input type = "text" class = "form-control" name="category" placeholder = "Nhập tên danh mục của bạn" value="{!! old('category',isset($postCategory) ? $postCategory['name'] : NULL) !!}">
									<p><i>Bạn nên đặt tên danh mục để phân loại các bài viết, sản phẩm của mình.</i></p>
								</div>
								<div class = "form-group">
									<label>Metatitle</label>
									<input type = "text" class = "form-control" name="metatitle" placeholder = "Nhập tên slug của bạn" value="{!! old('metatitle',isset($postCategory) ? $postCategory['metatitle'] : NULL) !!}">
									<p><i>Bạn có thể đặt tên Metatitle (hiển thị trên URL) theo ý của mình hoặc để nguyên.</i></p>
								</div>	
								<div class = "form-group">
									<label>Chọn danh mục cha</label>
									<select class = "form-control" name="category_id">
										<option value="0">Không có cha</option>
                                        <?php cate_parent($parent,0,$postCategory["parent_id"]) ?>
									</select>
									<p><i>Bạn có để nó làm danh mục con của danh mục nào không. Nếu không thì bạn chọn mục "Không có cha".</i></p>
								</div>	
								<div class = "form-group">
									<label>Mô tả</label>
									<textarea class = "form-control" name="descriptions" rows = "3">{!! old('descriptions',isset($postCategory) ? $postCategory['description'] : NULL) !!}</textarea>
									<script type="text/javascript">ckeditor("descriptions")</script>
									<p><i>	Bạn có thể mô tả thêm về danh mục này chứa những phần gì, bài viết nào, sản phẩm nào... 
											Bạn có thể để trống, không bắt buộc.</i></p>
								</div>
								<div class = "form-group">
									<label>Người tạo</label>
									<input type = "text" class = "form-control" name="createby" placeholder = "Nhập tên của người tạo danh mục" value="{!! old('createby',isset($postCategory) ? $postCategory['createdby'] : NULL) !!}">
									<p><i>Bạn có thể nhập tên người tạo danh mục hoặc để nguyên.</i></p>
								</div>
								<div class = "form-group">
									<label>Người cập nhật</label>
									<input type = "text" class = "form-control" name="updateby" placeholder = "Nhập tên của người cập nhật danh mục" value="{!! old('updateby',isset($postCategory) ? $postCategory['updatedby'] : NULL) !!}">
									<p><i>Bạn có thể nhập tên người cập nhật danh mục hoặc để nguyên.</i></p>
								</div>
								<button type="submit" class = "btn btn-danger btn-lg">Lưu lại</button>
							</form>
						</div>
					</div>
				</div>
@endsection()