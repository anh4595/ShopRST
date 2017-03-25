    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-9 page-top-left">
                <div class="popular-tabs">
                      <ul class="nav-tab">
                        <li class="active"><a data-toggle="tab" href="#tab-111">BEST SELLERS</a></li>
                        <li><a data-toggle="tab" href="#tab-222">ON SALE</a></li>
                        <li><a data-toggle="tab" href="#tab-333">New products</a></li>
                      </ul>
                      <div class="tab-container">
                            <div id="tab-111" class="tab-panel active">
                                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":3}}'>
                                <?php
                                    $list_best=DB::table('products')->where('status',1)->orderby('quantitysold','DESC')->skip(0)->take(10)->get();
                                ?>
                                @foreach($list_best as $item)
                                    <li>
                                        <div class="left-block">
                                            <a href="{!! url('chi-tiet-san-pham',[$item->id,$item->metatitle]) !!}" >
                                                <img class="img-responsive" alt="product" src="{{url('public/assets/data/'.$item->image)}}" />
                                            </a>
                                            <div class="quick-view">
                                                    <a title="Add to my wishlist" class="heart" href="#"></a>
                                                    <a title="Add to compare" class="compare" href="#"></a>
                                                    <a title="Quick view" class="search" href="#"></a>
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="{!! url('mua-hang',[$item->id,$item->metatitle]) !!}">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="{!! url('chi-tiet-san-pham',[$item->id,$item->metatitle]) !!}">{!! $item->name !!}</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">${!! $item->promotionprice !!}</span>
                                                <span class="price old-price">${!! $item->price !!}</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div id="tab-222" class="tab-panel">
                                <ul class="product-list owl-carousel"  data-dots="false" data-loop="true" data-nav = "true" data-margin = "30"  data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":3}}'>
                                <?php
                                    $list_sale=DB::table('products')->where('status',1)->where('promotionflag',1)->orderby('id','DESC')->skip(0)->take(10)->get();
                                ?>
                                @foreach($list_sale as $itemsale)
                                    <li>
                                        <div class="left-block">
                                            <a href="{!! url('chi-tiet-san-pham',[$itemsale->id,$itemsale->metatitle]) !!}" >
                                            <img class="img-responsive" alt="product" src="{{url('public/assets/data/'.$itemsale->image)}}" /></a>
                                            <div class="quick-view">
                                                    <a title="Add to my wishlist" class="heart" href="#"></a>
                                                    <a title="Add to compare" class="compare" href="#"></a>
                                                    <a title="Quick view" class="search" href="#"></a>
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="#">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="{!! url('chi-tiet-san-pham',[$itemsale->id,$itemsale->metatitle]) !!}">{!! $itemsale->name !!}</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">${!! $item->promotionprice !!}</span>
                                                <span class="price old-price">${!! $itemsale->price !!}</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div id="tab-333" class="tab-panel">
                                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":3}}'>
                                <?php
                                     $list_new=DB::table('products')->where('status',1)->orderby('created_at','DESC')->skip(0)->take(10)->get();
                                ?>
                                @foreach($list_new as $itemnew)
                                    <li>
                                        <div class="left-block">
                                            <a href="{!! url('chi-tiet-san-pham',[$itemnew->id,$itemnew->metatitle]) !!}">
                                                <img class="img-responsive" alt="product" src="{{url('public/assets/data/'.$itemnew->image)}}" />
                                            </a>
                                            <div class="quick-view">
                                                    <a title="Add to my wishlist" class="heart" href="#"></a>
                                                    <a title="Add to compare" class="compare" href="#"></a>
                                                    <a title="Quick view" class="search" href="#"></a>
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="#">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="{!! url('chi-tiet-san-pham',[$itemnew->id,$itemnew->metatitle]) !!}">{!! $itemnew->name !!}</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">${!! $itemnew->price !!}</span>
                                                <span class="price old-price">${!! $item->promotionprice !!}</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                      </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 page-top-right">
                <div class="latest-deals">
                    <h2 class="latest-deal-title">latest deals</h2>
                    <div class="latest-deal-content">
                        <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":1}}'>
                        <?php
                            $list_deals=DB::table('products')->where('status',1)->where('promotionflag',1)->orderby('created_at','DESC')->skip(0)->take(3)->get();
                        ?>
                        @foreach($list_deals as $itemdeals)
                            <li>
                                <div class="count-down-time" data-countdown="2017/03/27 9:20:00"></div>
                                <div class="left-block">
                                    <a href="{!! url('chi-tiet-san-pham',[$itemdeals->id,$itemdeals->metatitle]) !!}">
                                        <img class="img-responsive"  alt="product" src="{{url('public/assets/data/'.$itemdeals->image)}}" />
                                    </a>
                                    <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="{!! url('chi-tiet-san-pham',[$itemdeals->id,$itemdeals->metatitle]) !!}">{!! $itemdeals->name !!}</a></h5>
                                    <div class="content_price">
                                        <span class="price product-price">${!! $item->promotionprice !!}</span>
                                        <span class="price old-price">${!! $itemdeals->price !!}</span>
                                        <span class="colreduce-percentage">(-60%)</span>
                                    </div>
                                </div>
                            </li>
                        @endforeach 
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>