    <div id="nav-top-menu" class="nav-top-menu">
        <div class="container">
            <div class="row">
                <div class="col-sm-3" id="box-vertical-megamenus">
                    <div class="box-vertical-megamenus">
                        <h4 class="title">
                            <span class="title-menu">Categories</span>
                            <span class="btn-open-mobile pull-right"><i class="fa fa-bars"></i></span>
                        </h4>
                        <div class="vertical-menu-content is-home">
                            <ul class="vertical-menu-list">
                            <?php
                                $list_categories=DB::table('productcategories')->where('parent_id',35)->where('status',1)->get();
                            ?>
                            @foreach($list_categories as $item)
                                <li><a href="{!! url('danh-sach-san-pham',[$item->id,$item->metatitle]) !!}"><img class="icon-menu" alt="Funky roots" src="{{url('public/assets/data/'.$item->image)}}">{!! $item->name !!}</a></li>
                            @endforeach
                            </ul>
                            <div class="all-category"><span class="open-cate">All Categories</span></div>
                        </div>
                    </div>
                </div>
                <div id="main-menu" class="col-sm-9 main-menu">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <a class="navbar-brand" href="#">MENU</a>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="{!! URL('/') !!}">Home</a></li>
                                    <?php
                                        $listmenu=DB::table('productcategories')->where('parent_id',0)->where('status',1)->get();
                                    ?>
                                    @foreach($listmenu as $item)
                                    <li class="dropdown">
                                        <a href="{!! url('danh-sach-san-pham',[$item->id,$item->metatitle]) !!}" class="dropdown-toggle" data-toggle="dropdown">{!! $item->name !!}</a>
                                        <ul class="dropdown-menu container-fluid">
                                            <li class="block-container">
                                                <ul class="block">
                                                    <?php
                                                        $listmenu2=DB::table('productcategories')->where('parent_id',$item->id)->get();
                                                    ?>
                                                    @foreach($listmenu2 as $item2)
                                                        <li class="link_container"><a href="{!! url('danh-sach-san-pham',[$item2->id,$item2->metatitle]) !!}">{!! $item2->name !!}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        </ul> 
                                    </li>
                                    @endforeach
                                    <li><a href="#">Blog</a></li>
                                </ul>
                            </div><!--/.nav-collapse -->
                        </div>
                    </nav>
                </div>
            </div>
            <!-- userinfo on top-->
            <div id="form-search-opntop">
            </div>
            <!-- userinfo on top-->
            <div id="user-info-opntop">
            </div>
            <!-- CART ICON ON MMENU -->
            <div id="shopping-cart-box-ontop">
                <i class="fa fa-shopping-cart"></i>
                <div class="shopping-cart-box-ontop-content"></div>
            </div>
        </div>
    </div>