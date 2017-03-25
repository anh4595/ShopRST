    <div class="container">
        <div class="row">
            <div class="col-sm-3 slider-left"></div>
            <div class="col-sm-9 header-top-right">
                <div class="homeslider">
                    <div class="content-slide">
                        <?php
                            $list_slide=DB::table('slides')->where('status',1)->get();
                        ?>
                        <ul id="contenhomeslider">
                        @foreach($list_slide as $item)
                            <li><img alt="Funky roots" src="{{url('public/assets/data/'.$item->url)}}" title="{!! $item->name !!}" /></li>
                        @endforeach
                        </ul>
                    </div>
                </div>
                <div class="header-banner banner-opacity">
                    <a href="#"><img alt="Funky roots" src="{{url('public/assets/data/ads1.jpg')}}" /></a>
                </div>
            </div>
        </div>
    </div>