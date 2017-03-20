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
							<form>
								<div class = "form-group">
									<label>Tên danh mục</label>
									<input type = "text" class = "form-control" placeholder = "Nhập tên danh mục của bạn">
									<p><i>Bạn nên đặt tên danh mục để phân loại các bài viết, sản phẩm của mình.</i></p>
								</div>
								<div class = "form-group">
									<label>Metatitle</label>
									<input type = "text" class = "form-control" placeholder = "Nhập tên Metatitle của bạn">
									<p><i>Bạn có thể đặt tên Metatitle (hiển thị trên URL) theo ý của mình hoặc để nguyên.</i></p>
								</div>	
                                <div class = "form-group">
									<label>Metakeyword</label>
									<input type = "text" class = "form-control" placeholder = "Nhập tên Metakeyword của bạn">
									<p><i>Bạn có thể đặt tên Metakeyword (từ khóa) dể tăng SEO.</i></p>
								</div>	
                                <div class = "form-group">
									<label>Chọn danh mục cha</label>
									<select class = "form-control">
										<option>Không có cha</option>
                                        <?php
                                            $list_parent=DB::table('productcategories')->where('parent_id',NULL)->get();
                                        ?>
                                        @foreach($list_parent as $item)
                                            <option>{!! $item->name !!}</option>
                                        @endforeach
									</select>
									<p><i>Bạn có để nó làm danh mục con của danh mục nào không. Nếu không thì bạn chọn mục "Không có cha".</i></p>
								</div>	
                                <div class = "form-group">
									<label>Vị trí</label>
									<input type = "text" class = "form-control">
									<p><i>Bạn có thể chọn vị trí hiển thị tên danh mục trên menu website hoặc có thể bỏ trống.</i></p>
								</div>
								<div class = "form-group">
									<label>Mô tả</label>
									<textarea class = "form-control" rows = "3"></textarea>
									<p><i>	Bạn có thể mô tả thêm về danh mục này chứa những phần gì, bài viết nào, sản phẩm nào... 
											Bạn có thể để trống, không bắt buộc.</i></p>
								</div>
                                <div class = "form-group">
									<label>Người tạo</label>
									<input type = "text" class = "form-control" placeholder = "Nhập tên của người tạo danh mục">
									<p><i>Bạn có thể nhập tên người tạo danh mục hoặc để nguyên.</i></p>
								</div>
                                <div class = "form-group">
									<label>Người cập nhật</label>
									<input type = "text" class = "form-control" placeholder = "Nhập tên của người cập nhật danh mục">
									<p><i>Bạn có thể nhập tên người cập nhật danh mục hoặc để nguyên.</i></p>
								</div>
                                <div class = "form-group">
									<span><label style="margin-right:3%">Kích hoạt</label> <input type = "checkbox" ></span>
									<p><i>Bạn có thể tít chọn để danh mục hoạt động ngay hoặc để nguyên.</i></p>
								</div>
								<div class = "btn btn-danger btn-lg">
									<a href = "dmbaiviet.html">Lưu thay đổi</a>
								</div>
							</form>
						</div>
					</div>
				</div>
@endsection()