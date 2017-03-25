<!DOCTYPE html>
<html>

<!-- Mirrored from kutethemes.com/demo/kuteshop/html/category.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jul 2015 07:28:15 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/lib/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/lib/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/lib/select2/css/select2.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/lib/jquery.bxslider/jquery.bxslider.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/lib/owl.carousel/owl.carousel.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/lib/jquery-ui/jquery-ui.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/lib/fancyBox/jquery.fancybox.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/css/animate.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/css/reset.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/css/responsive.css')}}" />
    
    <title>RST-Shop</title>
</head>
<body class="category-page">
<!-- HEADER -->
<div id="header" class="header">
    @include('client.header.topheader')
    @include('client.header.mainheader')
    @include('client.menu.topmenu')
</div>
<!-- end header -->

<div class="columns-container">
    <div class="container" id="columns">
        <!-- row -->
        <div class="row">
            <!-- Left colunm -->
            <div class="column col-xs-12 col-sm-3" id="left_column">
                <!-- block category -->
                <div class="block left-module">
                    <p class="title_block">Product types</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-category">
                            <div class="layered-content">
                                <?php
                                    $list_category=DB::table('productcategories')->where('status',1)->get();
                                ?>
                                <ul class="tree-menu">
                                @foreach($list_category as $itemcate)
                                    <li><span></span><a href="{!! url('danh-sach-san-pham',[$itemcate->id,$itemcate->metatitle]) !!}">{!! $itemcate->name !!}</a></li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- ./layered -->
                    </div>
                </div>
                <!-- ./block category  -->
                <!-- block filter -->
                <div class="block left-module">
                    <p class="title_block">Filter selection</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-filter-price">
                            <!-- filter price -->
                            <div class="layered_subtitle">price</div>
                            <div class="layered-content slider-range">
                                
                                <div data-label-reasult="Range:" data-min="0" data-max="500" data-unit="$" class="slider-range-price" data-value-min="50" data-value-max="350"></div>
                                <div class="amount-range-price">Range: $50 - $350</div>
                                <ul class="check-box-list">
                                    <li>
                                        <input type="checkbox" id="p1" name="cc" />
                                        <label for="p1">
                                        <span class="button"></span>
                                        $20 - $50<span class="count">(0)</span>
                                        </label>   
                                    </li>
                                    <li>
                                        <input type="checkbox" id="p2" name="cc" />
                                        <label for="p2">
                                        <span class="button"></span>
                                        $50 - $100<span class="count">(0)</span>
                                        </label>   
                                    </li>
                                    <li>
                                        <input type="checkbox" id="p3" name="cc" />
                                        <label for="p3">
                                        <span class="button"></span>
                                        $100 - $250<span class="count">(0)</span>
                                        </label>   
                                    </li>
                                </ul>
                            </div>
                            <!-- ./filter price -->
                            <!-- ./filter size -->
                            <div class="layered_subtitle">Size</div>
                            <div class="layered-content filter-size">
                                <ul class="check-box-list">
                                    <?php
                                        $list_size=DB::table('sizes')->orderby('created_at','DESC')->get();
                                    ?>
                                    @foreach($list_size as $itemsize)
                                    <li>
                                        <input type="checkbox" id="{!! $itemsize->id !!}" name="cc" />
                                        <label for="size1">
                                        <span class="button"></span>{!! $itemsize->name !!}
                                        </label>   
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- ./filter size -->
                        </div>
                        <!-- ./layered -->

                    </div>
                </div>
                <!-- ./block filter  -->
                
                <!-- left silide -->
                <div class="col-left-slide left-module">
                    <ul class="owl-carousel owl-style2" data-loop="true" data-nav = "false" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-items="1" data-autoplay="true">
                        <li><a href="#"><img src="{{url('public/assets/data/slide-left.jpg')}}" alt="slide-left"></a></li>
                        <li><a href="#"><img src="{{url('public/assets/data/slide-left2.jpg')}}" alt="slide-left"></a></li>
                        <li><a href="#"><img src="{{url('public/assets/data/slide-left3.png')}}" alt="slide-left"></a></li>
                    </ul>

                </div>
                <!--./left silde-->
                <!-- SPECIAL -->
                <div class="block left-module">
                    <p class="title_block">SALE PRODUCTS</p>
                    <div class="block_content">
                        <ul class="products-block">
                            <?php 
                                $item_sale=DB::table('products')->where('status',1)->where('promotionflag',1)->orderby('created_at','DESC')->skip(0)->take(1)->get();
                            ?>
                            @foreach($item_sale as $item)
                            <li>
                                <div class="products-block-left">
                                    <a href="#">
                                        <img src="{{url('public/assets/data/'.$item->image)}}" alt="SALE PRODUCTS">
                                    </a>
                                </div>
                                <div class="products-block-right">
                                    <p class="product-name">
                                        <a href="#">{!! $item->name !!}/a>
                                    </p>
                                    <p class="product-price">${!! number_format($item->promotionprice,0,",",".") !!}</p>
                                    <p class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </p>
                                </div>
                            </li>
                             <div class="products-block">
                                <div class="products-block-bottom">
                                    <a class="link-all" href="{!! url('danh-sach-san-pham-sale') !!}">All Products</a>
                                </div>
                            </div>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- ./SPECIAL -->
                <!-- TAGS -->
                <div class="block left-module">
                    <p class="title_block">TAGS</p>
                    <div class="block_content">
                        <div class="tags">
                            <?php                            
                                $list_tag = DB::table('tags')->where('type','product')->get();
                            ?>
                            @foreach($list_tag as $itemtag)
                                <a href="#"><span class="level1">{!! $itemtag->name !!}</span></a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- ./TAGS -->
            </div>
            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <!-- category-slider -->
                <div class="category-slider">
                    <ul class="owl-carousel owl-style2" data-dots="false" data-loop="true" data-nav = "true" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-items="1">
                        <li>
                            <img src="{{url('public/assets/data/category-slide.jpg')}}" alt="category-slider">
                        </li>
                        <li>
                            <img src="{{url('public/assets/data/slide-cart2.jpg')}}" alt="category-slider">
                        </li>
                    </ul>
                </div>
                <!-- ./category-slider -->
                <!-- view-product-list-->
                <div id="view-product-list" class="view-product-list">
                    <h2 class="page-heading">
                    @foreach($name_category as $nameitem)
                        <span class="page-heading-title">{!! $nameitem->name !!}</span>
                    @endforeach
                    </h2>
                    <ul class="display-product-option">
                        <li class="view-as-grid selected">
                            <span>grid</span>
                        </li>
                        <li class="view-as-list">
                            <span>list</span>
                        </li>
                    </ul>
                    <!-- PRODUCT LIST -->
                    <ul class="row product-list grid">
                    @foreach($product_category as $itemproduct)
                        <li class="col-sx-12 col-sm-4">
                            <div class="product-container">
                                <div class="left-block">
                                    <a href="{!! url('mua-hang',[$itemproduct->id,$itemproduct->metatitle]) !!}">
                                        <img class="img-responsive" alt="product" src="{{url('public/assets/data/'.$itemproduct->image)}}" />
                                    </a>
                                    <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="{!! url('mua-hang',[$itemproduct->id,$itemproduct->metatitle]) !!}">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="#">{!! $itemproduct->name !!}</a></h5>
                                    <div class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="content_price">
                                        <span class="price product-price">${!! $itemproduct->promotionprice !!}</span>
                                        <span class="price old-price">${!! $itemproduct->price !!}</span>
                                    </div>
                                    <div class="info-orther">
                                        <p>Item Code: #{!! $itemproduct->id !!}</p>
                                        <p class="availability">Availability: <span>In stock</span></p>
                                        <div class="product-desc">
                                            {!! $itemproduct->description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    </ul>
                    <!-- ./PRODUCT LIST -->
                </div>
                <!-- ./view-product-list-->
                <div class="sortPagiBar">
                    <div class="bottom-pagination">
                        <nav>
                          <ul class="pagination">
                            @if($product_category->currentPage() != 1)
								<li>
									<a href="{!! str_replace('/?','?',$product_category->url($product_category->currentPage() - 1)) !!}" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
									</a>
								</li>
								@endif
								@for($i=1;$i<=$product_category->lastPage();$i=$i+1)
								<li class = "{!! ($product_category->currentPage() == $i) ? 'active' : '' !!}">
									<a href="{!! str_replace('/?','?',$product_category->url($i)) !!}">{{ $i }}</a>
								</li>
								@endfor
								@if($product_category->currentPage() != $product_category->lastPage())
								<li>
									<a href="{!! str_replace('/?','?',$product_category->url($product_category->currentPage() + 1)) !!}" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
									</a>
								</li>
							@endif
                          </ul>
                        </nav>
                    </div>
                    <div class="show-product-item">
                        <select name="">
                            <option value="">Show 18</option>
                            <option value="">Show 20</option>
                            <option value="">Show 50</option>
                            <option value="">Show 100</option>
                        </select>
                    </div>
                    <div class="sort-product">
                        <select>
                            <option value="">Product Name</option>
                            <option value="">Price</option>
                        </select>
                        <div class="sort-product-icon">
                            <i class="fa fa-sort-alpha-asc"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>

<!-- Footer -->
<footer id="footer">
     <div class="container">
        @include('client.footer.introducebox')
        @include('client.footer.trademarkbox')
        @include('client.footer.textbox')
        @include('client.footer.menubox')
    </div> 
</footer>


<a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
<!-- Script-->
<script type="text/javascript" src="{{url('public/assets/lib/jquery/jquery-1.11.2.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/assets/lib/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/assets/lib/select2/js/select2.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/assets/lib/jquery.bxslider/jquery.bxslider.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/assets/lib/owl.carousel/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/assets/lib/jquery.countdown/jquery.countdown.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/assets/lib/jquery.elevatezoom.js')}}"></script>
<script type="text/javascript" src="{{url('public/assets/lib/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/assets/lib/fancyBox/jquery.fancybox.js')}}"></script>
<script type="text/javascript" src="{{url('public/assets/js/jquery.actual.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/assets/js/theme-script.js')}}"></script>

</body>

<!-- Mirrored from kutethemes.com/demo/kuteshop/html/category.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jul 2015 07:29:23 GMT -->
</html>