@extends('admin.shared')
@section('content')
<?php
	$list_sizes = DB::table('sizes')->paginate(10);

	$list_count = DB::table('sizes')->get();
	$count_size = count($list_count);
?>
	<h1><span class = "glyphicon glyphicon-folder-open addtop" aria-hidden = "true"></span>&nbsp;&nbsp;Danh mục sản phẩm</h1>	
				<div id = "sub-main">
					<div class = "row">
						<div class = "col-xs-12 col-sm-7 col-md-8 col-lg-9">
							<ol class = "breadcrumb">
								<li>Hệ thống</li>
								<li>Sản phẩm</li>
								<li class = "active">Danh mục sản phẩm</li>
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
							<form action="{!! route('admin.product.size') !!}" method="POST">
								<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                                <div class = "form-group">
									<label>Mã code</label>
									<input type = "text" class = "form-control" name="namecode" placeholder = "Nhập mã code kích thước của bạn">
									<p><i>Bạn có thể đặt mã code theo ý của mình.</i></p>
								</div>	
								<div class = "form-group">
									<label>Kích thước</label>
									<input type = "text" class = "form-control" name="namesize" placeholder = "Nhập kích thước của bạn">
									<p><i>Bạn nên đặt kích thước để phân loại các kích thước khác của sản phẩm.</i></p>
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
                                    <span><i>Tổng số loại kích thước: </i><strong>{!! $count_size !!}</strong></span>        
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
                                                <th>Mã code</th>
                                                <th>Kích thước</th>
                                                <th>Ngày tạo</th>
                                                <th>Chức năng</th>
									        </tr>
								        </thead>
										<tbody>
                                            @foreach($list_sizes as $item)
                                                <tr>
                                                    <td><input type = "checkbox" value = "" /></td>
                                                    <td>{!! $item->id !!}</td>
                                                    <td>{!! $item->name !!}</td>
                                                    <td>{!! $item->created_at !!}</td>
                                                    <td>
                                                        <a href = "{!! URL::route('admin.size.getEdit',$item->id) !!}" value="{!! $item->id !!}">Sửa |</a>
                                                        <a href = "{!! URL::route('admin.size.getDelete',$item->id) !!}" value="{!! $item->id !!}">Xóa</a>
                                                    </td>
                                                </tr>
                                            @endforeach
										</tbody>
									</table>
								</div>
								<nav>
									<ul class="pagination">
										@if($list_sizes->currentPage() != 1)
										<li>
											<a href="{!! str_replace('/?','?',$list_sizes->url($list_sizes->currentPage() - 1)) !!}" aria-label="Previous">
												<span aria-hidden="true">&laquo;</span>
											</a>
										</li>
										@endif
										@for($i=1;$i<=$list_sizes->lastPage();$i=$i+1)
										<li class = "{!! ($list_sizes->currentPage() == $i) ? 'active' : '' !!}">
											<a href="{!! str_replace('/?','?',$list_sizes->url($i)) !!}">{{ $i }}</a>
										</li>
										@endfor
										@if($list_sizes->currentPage() != $list_sizes->lastPage())
										<li>
											<a href="{!! str_replace('/?','?',$list_sizes->url($list_sizes->currentPage() + 1)) !!}" aria-label="Next">
												<span aria-hidden="true">&raquo;</span>
											</a>
										</li>
										@endif
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
@endsection()