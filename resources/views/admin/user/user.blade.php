@extends('admin.shared')
@section('content')
<?php
	$list_user = DB::table('users')->orderBy('id')->get();
	$count_user = count($list_user);

	$count_enable = 0;
	$count_disable = 0;
	foreach($list_user as $item)
		if($item->status == 0)
			$count_disable++;
		elseif($item->status == 1)
			$count_enable++;
?>
	<h1><span class = "glyphicon glyphicon-gift addtop" aria-hidden = "true"></span>&nbsp;&nbsp;Người dùng</h1>	
				<div id = "sub-main">
					<div class = "row">
						<div class = "col-xs-12 col-sm-7 col-md-8 col-lg-9">
							<ol class = "breadcrumb">
								<li>Hệ thống</li>
								<li class="active">Người dùng</li>
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
						<div class = "col-xs-12 col-sm-5 col-md-7 col-lg-7">
							<div class = "btn btn-danger btn-lg">
								<a href = "{!! URL('admin/nguoi-dung/them-nguoi-dung') !!}">Thêm mới</a>
							</div>
						</div>
						<div class = "col-xs-12 col-sm-7 col-md-5 col-lg-5">
							<div class = "input-group text-right">
								<input type = "text" class = "form-control" placeholder = "Bạn cần tìm gì?">
								<span class = "input-group-btn">
									<button class = "btn btn-danger" type = "button">Tìm kiếm</button>
								</span>
							</div>
						</div>
					</div>
					<div class = "row space-top box-total">
						<div class = "col-xs-12 col-sm-8 col-md-7 col-lg-6">
							<span><i>Tổng số người dùng: </i><strong>{!! $count_user !!}</strong> |</span>
							<span><i>Có </i><strong>{!! $count_disable !!}</strong> <i>người dùng chưa kích hoạt</i></span>
						</div>
					</div>
					<div class = "row margin0 space">
						<div class = "col-xs-12 col-sm-5 col-md-4 col-lg-3 padding0">
							<div class = "form-inline">
								<select class = "form-control">
									<option value="1">Bài đã đăng</option>
									<option value="0">Bài chưa đăng</option>
								</select>
								<button type = "submit" class = "btn btn-danger">Lọc</button>
							</div>
						</div>
						<div class = "col-xs-12 col-sm-2 col-md-4 col-lg-6 text-right padding0">
							<div class = "btn btn-danger btn-a">
								<a href = "#">Xóa tất cả</a>
							</div>
						</div>
					</div>
					<div class = "row margin0">
						<div class = "table-responsive table-sanpham">
							<table class = "table table-striped table-bordered">
								<thead>
									<tr>
										<th><input type = "checkbox" value = "" /></th>
										<th>Tên người dùng</th>
                                        <th>Nhóm người dùng</th>
										<th>Số điện thoại</th>
										<th>Email</th>
										<th>Ngày tạo</th>
										<th>Người tạo</th>
                                        <th>Ngày cập nhật</th>
										<th>Người cập nhật</th>
										<th>Tên tài khoản</th>
										<th>Tình trạng</th>
										<th>Chức năng</th>
									</tr>
								</thead>    
                                @foreach($list_user as $item)
                                {
                                    <tr>
                                        <td><input type = "checkbox" value = "" /></td>
                                        <td>{!! $item->name !!}</td>
                                        <td>
                                            <?php
                                                $getNameGroup_byID = DB::table('usergroups')->where('id',$item->group_id)->get();
                                            ?>
                                            @foreach($getNameGroup_byID as $item)
                                                {!! $item->name !!}
                                            @endforeach
                                        </td>
                                        <td>{!! $item->phone !!}</td>
                                        <td>{!! $item->email !!}</td>
                                        <td>{!! $item->created_at !!}</td>
                                        <td>{!! $item->createdby !!}</td>
                                        <td>{!! $item->updated_at !!}</td>
                                        <td>{!! $item->updatedby !!}</td>
                                        <td>{!! $item->username !!}</td>
                                         @if($item->status == 0)
										    <td>Chưa kích hoạt</td>
										@elseif( $item->status == 1)
											<td>Đã kích hoạt</td>
										@endif
                                        <td>
                                            <a href = "#">Sửa |</a>
                                            <a href = "#">Xóa</a>
                                        </td>
                                    </tr>
                                }
                                @endforeach
							</table>
						</div>
						<nav>
							<ul class="pagination">
								<li>
									<a href="#" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
									</a>
								</li>
								<li class = "active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li>
									<a href="#" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
									</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
@endsection()