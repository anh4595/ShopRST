@extends('admin.shared')
@section('content')	
<?php
	$list_contacts = DB::table('contacts')->orderBy('id')->paginate(5);

	$list_count = DB::table('contacts')->orderBy('id')->get();
	$count_contact = count($list_count);

	$count_enable = 0;
	$count_disable = 0;
	foreach($list_contacts as $item)
		if($item->status == 0)
			$count_disable++;
		elseif($item->status == 1)
			$count_enable++;
?>
    <h1><span class = "glyphicon glyphicon-gift addtop" aria-hidden = "true"></span>&nbsp;&nbsp;Liên hệ</h1>	
				<div id = "sub-main">
					<div class = "row">
						<div class = "col-xs-12 col-sm-7 col-md-8 col-lg-9">
							<ol class = "breadcrumb">
								<li>Hệ thống</li>
								<li class="active">Liên hệ</li>
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
								<a href = "{!! URL('admin/mo-rong/lien-he/them-lien-he') !!}">Thêm mới</a>
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
							<span><i>Tổng số dòng: </i><strong>{!! $count_contact !!}</strong> |</span>
							<span><i>Có </i><strong>{!! $count_disable !!}</strong> <i>bài chưa đăng</i></span>
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
										<th>Tên liên hệ</th>
										<th>Điện thoại</th>
										<th style="width: 200px;">Email</th>
										<th>Website</th>
                                        <th>Địa chỉ</th>
										<th>Lat</th>
										<th>Lng</th>
                                        <th>Trạng thái</th>
										<th>Chức năng</th>
									</tr>
								</thead>
                                @foreach($list_contacts as $item)
                                    <tr>
                                        <td><input type = "checkbox" value = "" /></td>
                                        <td>{!! $item->name !!}</td>
                                        <td>{!! $item->phone !!}</td>
                                        <td>{!! $item->email !!}</td>
                                        <td>{!! $item->website !!}</td>
                                        <td>{!! $item->address !!}</td>
                                        <td>{!! $item->lat !!}</td>
                                        <td>{!! $item->lng !!}</td>
                            			@if($item->status == 0)
											<td>Chưa kích hoạt<br />
												<a href = "{!! URL::route('admin.contact.changeStatus',$item->id) !!}">Bật</a>
											</td>
										@elseif( $item->status == 1)
											<td>Đã kích hoạt<br />
												<a href = "{!! URL::route('admin.contact.changeStatus',$item->id) !!}">Tắt</a>
											</td>
										@endif            
                                        <td>
                                            <a href = "{!! URL::route('admin.contact.getEdit',$item->id) !!}" value="{!! $item->id !!}">Sửa |</a>
                                            <a href = "{!! URL::route('admin.contact.getDelete',$item->id) !!}" value="{!! $item->id !!}">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach()
							</table>
						</div>
						<nav>
							<ul class="pagination">
								@if($list_contacts->currentPage() != 1)
									<li>
										<a href="{!! str_replace('/?','?',$list_contacts->url($list_contacts->currentPage() - 1)) !!}" aria-label="Previous">
											<span aria-hidden="true">&laquo;</span>
										</a>
									</li>
									@endif
									@for($i=1;$i<=$list_contacts->lastPage();$i=$i+1)
									<li class = "{!! ($list_contacts->currentPage() == $i) ? 'active' : '' !!}">
										<a href="{!! str_replace('/?','?',$list_contacts->url($i)) !!}">{{ $i }}</a>
									</li>
									@endfor
									@if($list_contacts->currentPage() != $list_contacts->lastPage())
									<li>
										<a href="{!! str_replace('/?','?',$list_contacts->url($list_contacts->currentPage() + 1)) !!}" aria-label="Next">
											<span aria-hidden="true">&raquo;</span>
										</a>
									</li>
								@endif
							</ul>
						</nav>
					</div>
				</div>
@endsection()