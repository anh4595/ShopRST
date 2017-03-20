@extends('admin.shared')
@section('content')
<?php
	$list_tag = DB::table('tags')->orderBy('id')->get();
	$count_tag = count($list_tag);
?>
	<h1><span class = "glyphicon glyphicon-folder-open addtop" aria-hidden = "true"></span>&nbsp;&nbsp;Thẻ tag</h1>	
				<div id = "sub-main">
					<div class = "row">
						<div class = "col-xs-12 col-sm-7 col-md-8 col-lg-9">
							<ol class = "breadcrumb">
								<li>Hệ thống</li>
								<li>Thẻ tag</li>
								<li class = "active">Thẻ tag</li>
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
							<h4>Thêm thẻ tag</h4>
							@if(count($errors)>0)
								<div class="alert alert-danger">
									<ul>
										@foreach($errors->all() as $error)
											<li>{!! $error !!}</li>
										@endforeach()
									</ul>
								</div>
							@endif
							<form action="{!! route('admin.tag.tag') !!}" method="POST">
								<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
								<div class = "form-group">
									<label>Mã code</label>
									<input type = "text" class = "form-control" name="namecode" placeholder = "Nhập mã code thẻ tag">
									<p><i>Bạn nên đặt mã code để phân loại các thẻ tag của mình.</i></p>
								</div>
								<div class = "form-group">
									<label>Tên thẻ tag</label>
									<input type = "text" class = "form-control" name="nametag" placeholder = "Nhập tên thẻ tag của bạn">
									<p><i>Bạn nên đặt tên thẻ tag để phân loại các thẻ tag của mình.</i></p>
								</div>
                                <div class = "form-group">
									<label>Chọn thể loại</label>
									<select class = "form-control" name="type">
                                        <option value="product">Sản phẩm</option>
                                        <option value="post">Bài viết</option>
									</select>
									<p><i>Bạn vui lòng chọn thể loại tag.</i></p>
								</div>	
                                <div class = "col-xs-12 col-sm-5 col-md-7 col-lg-7" style="float: right;margin-right: -20%;">
									<button type="submit" name="submit" class="btn btn-danger btn-lg">Thêm mới</button>
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
                                    <span><i>Tổng số thẻ tag: </i><strong>{!! $count_tag !!}</strong> |</span>
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
                                                <th>Tên thẻ tag</th>
                                                <th>Loại thẻ tag</th>
                                                <th>Ngày tạo</th>
                                                <th>Ngày cập nhật</th>
                                                <th>Chức năng</th>
									        </tr>
								        </thead>
										<tbody>
                                            @foreach($list_tag as $item)
                                                <tr>
                                                    <td><input type = "checkbox" value = "" /></td>
                                                    <td>{!! $item->name !!}</td>
                                                    <td>{!! $item->type !!}</td>
													<td>{!! $item->created_at !!}</td>
                                                    <td>{!! $item->updated_at !!}</td>
                                                    <td>
                                                        <a href = "{!! URL('admin/san-pham/sua-san-pham') !!}">Sửa</a>
                                                        <a href = "#">Xóa</a>
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