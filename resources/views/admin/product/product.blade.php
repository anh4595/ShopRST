@extends('admin.shared')
@section('content')
<?php
	$list_products= DB::table('products')->orderBy('id')->paginate(6);

	$list_count= DB::table('products')->orderBy('id')->get();
	$count_product = count($list_count);

	$count_enable = 0;
	$count_disable = 0;
	foreach($list_products as $item)
		if($item->status == 0)
			$count_disable++;
		elseif($item->status == 1)
			$count_enable++;
?>
	<h1><span class = "glyphicon glyphicon-gift addtop" aria-hidden = "true"></span>&nbsp;&nbsp;Sản phẩm</h1>	
				<div id = "sub-main">
					<div class = "row">
						<div class = "col-xs-12 col-sm-7 col-md-8 col-lg-9">
							<ol class = "breadcrumb">
								<li>Hệ thống</li>
								<li class="active">Sản phẩm</li>
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
								<a href = "{!! URL('admin/san-pham/them-san-pham') !!}">Thêm mới</a>
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
							<span><i>Tổng số sản phẩm: </i><strong>{!! $count_product !!}</strong> |</span>
							<span><i>Có </i><strong>{!! $count_disable !!}</strong> <i>sản phẩm chưa đăng</i></span>
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
								<a href = "{!! URL::route('admin.product.multiDelete') !!}">Xóa tất cả</a>
							</div>
						</div>
					</div>
					<div class = "row margin0">
						<div class = "table-responsive table-sanpham">
							<table class = "table table-striped table-bordered">
								<thead>
									<tr>
										<th><input type = "checkbox" value = "" /></th>
										<th>Ảnh đại diện</th>
										<th>Tên sản phẩm</th>
										<th>Số lượng</th>
										<th>Số lượng bán</th>
										<th>Đơn giá</th>
										<th>Giá khuyến mãi</th>
										<th>Nội dung</th>
										<th>Luợt xem</th>
										<th>HOT</th>
										<th>HOME</th>
										<th>SALE</th>
										<th>Tình trạng</th>										
										<th>Chức năng</th>
									</tr>
								</thead>
								@foreach($list_products as $item)
									<tr>
										<td><input type = "checkbox" name="selected_id" value = "{!! $item->id !!}" /></td>
										<td><img class = "img-responsive" src = "{{url('public/assets/data/'.$item->image)}}" alt = "{!! $item->name !!}" /></td>
										<td>{!! $item->name !!}</td>		
										<td>{!! $item->quantity !!}</td>
										@if($item->quantitysold == NULL)
											<td>0</td>
										@else
											<td>{!! $item->quantitysold !!}</td>
										@endif
										<td>{!! $item->price !!}</td>
										<td>{!! $item->promotionprice !!}</td>
										<td><?php echo substr(htmlentities($item->detail),0,100)."..." ?></td>
										@if($item->viewcount == NULL)
											<td>0</td>
										@else
											<td>{!! $item->viewcount !!}</td>
										@endif										
										@if($item->hotflag == 0)
											<td>Chưa kích hoạt<br />
												<a href = "{!! URL::route('admin.product.changeHot',$item->id) !!}">Bật</a>
											</td>
										@elseif( $item->hotflag == 1)
											<td>Đã kích hoạt<br />
												<a href = "{!! URL::route('admin.product.changeHot',$item->id) !!}">Tắt</a>
											</td>
										@endif 

										@if($item->homeflag == 0)
											<td>Chưa kích hoạt<br />
												<a href = "{!! URL::route('admin.product.changeHome',$item->id) !!}">Bật</a>
											</td>
										@elseif( $item->homeflag == 1)
											<td>Đã kích hoạt<br />
												<a href = "{!! URL::route('admin.product.changeHome',$item->id) !!}">Tắt</a>
											</td>
										@endif 

										@if($item->promotionflag == 0)
											<td>Chưa kích hoạt<br />
												<a href = "{!! URL::route('admin.product.changeSale',$item->id) !!}">Bật</a>
											</td>
										@elseif( $item->promotionflag == 1)
											<td>Đã kích hoạt<br />
												<a href = "{!! URL::route('admin.product.changeSale',$item->id) !!}">Tắt</a>
											</td>
										@endif 

										@if($item->status == 0)
											<td>Chưa kích hoạt<br />
												<a href = "{!! URL::route('admin.product.changeStatus',$item->id) !!}">Bật</a>
											</td>
										@elseif( $item->status == 1)
											<td>Đã kích hoạt<br />
												<a href = "{!! URL::route('admin.product.changeStatus',$item->id) !!}">Tắt</a>
											</td>
										@endif 
										<td>
											<a href = "{!! URL::route('admin.product.getEdit',$item->id) !!}" value="{!! $item->id !!}">Sửa |</a>
											<a href = "{!! URL::route('admin.product.getDelete',$item->id) !!}" value="{!! $item->id !!}">Xóa</a>
										</td>
									</tr>
								@endforeach								
							</table>
						</div>
						<nav>
							<ul class="pagination">
								@if($list_products->currentPage() != 1)
									<li>
										<a href="{!! str_replace('/?','?',$list_products->url($list_products->currentPage() - 1)) !!}" aria-label="Previous">
											<span aria-hidden="true">&laquo;</span>
										</a>
									</li>
									@endif
									@for($i=1;$i<=$list_products->lastPage();$i=$i+1)
									<li class = "{!! ($list_products->currentPage() == $i) ? 'active' : '' !!}">
										<a href="{!! str_replace('/?','?',$list_products->url($i)) !!}">{{ $i }}</a>
									</li>
									@endfor
									@if($list_products->currentPage() != $list_products->lastPage())
									<li>
										<a href="{!! str_replace('/?','?',$list_products->url($list_products->currentPage() + 1)) !!}" aria-label="Next">
											<span aria-hidden="true">&raquo;</span>
										</a>
									</li>
								@endif
							</ul>
						</nav>
					</div>
				</div>
@endsection()