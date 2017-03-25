<!DOCTYPE html>
<html>

<!-- Mirrored from kutethemes.com/demo/kuteshop/html/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jul 2015 07:31:04 GMT -->
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
                <!-- Blog category -->
                <div class="block left-module">
                    <p class="title_block">Blog Categories</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-category">
                            <div class="layered-content">
                                <ul class="tree-menu">
                                <?php
                                    $list_cate=DB::table('postcategories')->where('status',1)->orderby('created_at')->get();
                                ?>
                                @foreach($list_cate as $item)
                                    <li><span></span><a href="{!! url('danh-sach-tin-tuc',[$item->id,$item->metatitle]) !!}">{!! $item->name !!}</a></li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- ./layered -->
                    </div>
                </div>
                <!-- ./blog category  -->
                <!-- Popular Posts -->
                <div class="block left-module">
                    <p class="title_block">News Posts</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered">
                            <div class="layered-content">
                                <ul class="blog-list-sidebar clearfix">
                                <?php
                                    $list_post=DB::table('posts')->where('status',1)->orderby('created_at','DESC')->skip(0)->take(6)->get();
                                ?>
                                @foreach($list_post as $itempost)
                                    <li>
                                        <div class="post-thumb">
                                            <a href="{!! url('chi-tiet-tin-tuc',[$itempost->id,$itempost->metatitle]) !!}"><img src="{{url('public/assets/data/'.$itempost->image)}}" alt="Blog"></a>
                                        </div>
                                        <div class="post-info">
                                            <h5 class="entry_title"><a href="{!! url('chi-tiet-tin-tuc',[$itempost->id,$itempost->metatitle]) !!}">{!! $itempost->name !!}</a></h5>
                                            <div class="post-meta">
                                                <span class="date"><i class="fa fa-calendar"></i> {!! $itempost->created_at !!}</span>
                                                <span class="comment-count">
                                                    <i class="fa fa-comment-o"></i> 3
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- ./layered -->
                    </div>
                </div>
                <!-- ./Popular Posts -->
                <!-- Banner -->
                <div class="block left-module">
                    <div class="banner-opacity">
                        <a href="#"><img src="{{url('public/assets/data/slide-left.jpg')}}" alt="ads-banner"></a>
                    </div>
                </div>
                <!-- ./Banner -->
                <!-- tags -->
                <div class="block left-module">
                    <p class="title_block">TAGS</p>
                    <div class="block_content">
                        <div class="tags">
                        <?php
                            $list_tag=DB::table('tags')->where('type','post')->get()
                        ?>
                        @foreach($list_tag as $itemtag)
                            <a href="#"><span class="level1">{!! $itemtag->name !!}</span></a>
                        @endforeach
                        </div>
                    </div>
                </div>
                <!-- ./tags -->
                <!-- Banner -->
                <div class="block left-module">
                    <div class="banner-opacity">
                        <a href="#"><img src="{{url('public/assets/data/slide-left2.jpg')}}" alt="ads-banner"></a>
                    </div>
                </div>
                <!-- ./Banner -->
            </div>
            <!-- ./left colunm -->
            <?php
                $list_post=DB::table('posts')->where('status',1)->paginate(10);
            ?>
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <h2 class="page-heading">
                    <span class="page-heading-title2">Blog post</span>
                </h2>
                <ul class="blog-posts">
                @foreach($list_post as $item_post)
                    <li class="post-item">
                        <article class="entry">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="entry-thumb image-hover2">
                                        <a href="{!! url('chi-tiet-tin-tuc',[$item_post->id,$item_post->metatitle]) !!}">
                                            <img src="{{url('public/assets/data/'.$item_post->image)}}" alt="Blog">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="entry-ci">
                                        <h3 class="entry-title"><a href="{!! url('chi-tiet-tin-tuc',[$item_post->id,$item_post->metatitle]) !!}">{!! $item_post->name !!}</a></h3>
                                        <div class="entry-meta-data">
                                            <span class="author">
                                            <i class="fa fa-user"></i> 
                                            by: <a href="#">Admin</a></span>
                                            <span class="cat">
                                                <i class="fa fa-folder-o"></i>
                                                <a href="#">News, </a>
                                                <a href="#">Promotions</a>
                                            </span>
                                            <span class="comment-count">
                                                <i class="fa fa-comment-o"></i> 3
                                            </span>
                                            <span class="date"><i class="fa fa-calendar"></i> {!! $item_post->created_at !!}</span>
                                        </div>
                                        <div class="post-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <span>(7 votes)</span>
                                        </div>
                                        <div class="entry-excerpt">
                                           {!! $item_post->description !!}
                                        </div>
                                        <div class="entry-more">
                                            <a href="#">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </li>
                @endforeach
                </ul>
                <div class="sortPagiBar clearfix">
                    <div class="bottom-pagination">
                        <nav>
                          <ul class="pagination">
                            @if($list_post->currentPage() != 1)
								<li>
									<a href="{!! str_replace('/?','?',$list_post->url($list_post->currentPage() - 1)) !!}" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
									</a>
								</li>
								@endif
								@for($i=1;$i<=$list_post->lastPage();$i=$i+1)
								<li class = "{!! ($list_post->currentPage() == $i) ? 'active' : '' !!}">
									<a href="{!! str_replace('/?','?',$list_post->url($i)) !!}">{{ $i }}</a>
								</li>
								@endfor
								@if($list_post->currentPage() != $list_post->lastPage())
								<li>
									<a href="{!! str_replace('/?','?',$list_post->url($list_post->currentPage() + 1)) !!}" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
									</a>
								</li>
							@endif
                          </ul>
                        </nav>
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

<!-- Mirrored from kutethemes.com/demo/kuteshop/html/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jul 2015 07:31:21 GMT -->
</html>