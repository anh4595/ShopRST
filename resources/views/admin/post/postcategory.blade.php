@extends('admin.shared')
@section('content')
<?php
	$list_postcategory = DB::table('postcategories')->orderBy('id')->get();
    $count_postcategory = count($list_postcategory);

	$count_enable = 0;
	$count_disable = 0;
	foreach($list_postcategory as $item)
		if($item->status == 0)
			$count_disable++;
		elseif($item->status == 1)
			$count_enable++;
?>
	<h1><span class = "glyphicon glyphicon-folder-open addtop" aria-hidden = "true"></span>&nbsp;&nbsp;Danh mục bài viết</h1>	
				<div id = "sub-main">
					<div class = "row">
						<div class = "col-xs-12 col-sm-7 col-md-8 col-lg-9">
							<ol class = "breadcrumb">
								<li>Hệ thống</li>
								<li>Bài viết</li>
								<li class = "active">Danh mục bài viết</li>
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
						<div class = "col-xs-12 col-sm-12 col-md-4 col-lg-4 option-h4 text-justify">
							<h4>Thêm danh mục</h4>
								@if(count($errors)>0)
								<div class="alert alert-danger">
									<ul>
										@foreach($errors->all() as $error)
											<li>{!! $error !!}</li>
										@endforeach()
									</ul>
								</div>
								@endif
							<form action="{!! route('admin.post.postcategory') !!}" method="POST">
								<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
								<div class = "form-group">
									<label>Tên danh mục</label>
									<input type = "text" class = "form-control" name="category" placeholder = "Nhập tên danh mục của bạn">
									<p><i>Bạn nên đặt tên danh mục để phân loại các bài viết, sản phẩm của mình.</i></p>
								</div>
								<div class = "form-group">
									<label>Metatitle</label>
									<input type = "text" class = "form-control" name="metatitle" placeholder = "Nhập tên slug của bạn">
									<p><i>Bạn có thể đặt tên Metatitle (hiển thị trên URL) theo ý của mình hoặc để nguyên.</i></p>
								</div>	
								<div class = "form-group">
									<label>Mô tả</label>
									<textarea class = "form-control" name="description" rows = "3"></textarea>
									<p><i>	Bạn có thể mô tả thêm về danh mục này chứa những phần gì, bài viết nào, sản phẩm nào... 
											Bạn có thể để trống, không bắt buộc.</i></p>
								</div>
								<div class = "form-group">
									<label>Người tạo</label>
									<input type = "text" class = "form-control" name="createby" placeholder = "Nhập tên của người tạo danh mục">
									<p><i>Bạn có thể nhập tên người tạo danh mục hoặc để nguyên.</i></p>
								</div>
								<div class = "form-group">
									<label>Người cập nhật</label>
									<input type = "text" class = "form-control" name="updateby" placeholder = "Nhập tên của người cập nhật danh mục">
									<p><i>Bạn có thể nhập tên người cập nhật danh mục hoặc để nguyên.</i></p>
								</div>
                                <div class = "form-group">
									<span><label style="margin-right:3%">Kích hoạt</label> <input type = "checkbox" name="status" ></span>
									<p><i>Bạn có thể tít chọn để danh mục hoạt động ngay hoặc để nguyên.</i></p>
								</div>
								<div class = "col-xs-12 col-sm-5 col-md-7 col-lg-7" style="float: right;margin-right: -20%;">
									<button type="submit" class = "btn btn-danger btn-lg">Thêm mới</button>
								</div>
							</form>
						</div>
						<div class = "col-xs-12 col-sm-12 col-md-8 col-lg-8">
							<div class = "row">
								<div class = "col-xs-12 col-sm-6 col-md-6 col-lg-6"></div>
								<div class = "col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<div class = "input-group text-right">
										<input type = "text" class = "form-control" placeholder = "Bạn cần tìm gì?">
										<span class = "input-group-btn">
											<button class = "btn btn-danger" type = "button">Tìm kiếm</button>
										</span>
									</div>
								</div>
							</div>
							<div class = "row space-top box-total">
								<div class = "col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <span><i>Tổng số bài viết: </i><strong>{!! $count_postcategory !!}</strong> |</span>
							        <span><i>Có </i><strong>{!! $count_disable !!}</strong> <i>danh mục chưa kích hoạt</i></span>
								</div>
								<div class = "col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<div class = "text-right">
										<div class = "btn btn-danger btn-a">
											<a href = "#">Xóa tất cả</a>
										</div>
									</div>
								</div>
							</div>
							<div class = "row margin0">
								<div class = "table-responsive">
									<table class = "table table-striped table-bordered">
										<thead>
                                            <tr>
                                                <th><input type = "checkbox" value = "" /></th>
                                                <th>Tên danh mục</th>
                                                <th>Mô tả</th>
                                                <th>Ngày tạo</th>
                                                <th>Người tạo</th>                                               
                                                <th>Từ khóa</th>
                                                <th>Trạng thái</th>
                                                <th>Chức năng</th>
                                            </tr>
								        </thead>
										<tbody>
                                            @foreach($list_postcategory as $item)
                                                <tr>
                                                    <td><input type = "checkbox" value = "" /></td>
                                                    <td>{!! $item->name !!}</td>
                                                    <td>{!! $item->description !!}</td>
                                                    <td>{!! $item->created_at !!}</td>
                                                    <td>{!! $item->createdby !!}</td>
                                                    <td>{!! $item->metatitle !!}</td>
													@if($item->status == 0)
														<td>Chưa kích hoạt</td>
													@elseif( $item->status == 1)
														<td>Đã kích hoạt</td>
													@endif
                                                    <td>
                                                        <a href = "{!! URL('admin/bai-viet/sua-danh-muc-bai-viet') !!}">Sửa</a>
                                                       	<a href = "{!! URL::route('admin.postcategory.getDelete',$item->id) !!}" value="{!! $item->id !!}">Xóa</a>
                                                    </td>
                                                </tr>
                                            @endforeach
										</tbody>
									</table>
								</div>
							</div>
							<p>	
								<i>	Chú ý: Việc bạn xóa bỏ danh mục không làm ảnh hưởng đến các bài viết. Tất cả các bài viết nằm trong
									danh mục bị xóa hoặc chưa có tên trong danh mục sẽ được để mặc định trong danh mục tên là "Chưa có". 
								</i>
							</p>
						</div>
					</div>
				</div>
@endsection()