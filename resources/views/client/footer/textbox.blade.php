            <!-- #trademark-text-box -->
            <div id="trademark-text-box" class="row">
                <?php
                    $list_cate=DB::table('productcategories')->where('status',1)->where('parent_id',0)->get();
                ?>
                @foreach($list_cate as $item)
                <div class="col-sm-12">
                    <ul id="trademark-tv-list" class="trademark-list">  
                        <li class="trademark-text-tit">{!! $item->name !!}:</li>
                            <?php
                                $list_chid=DB::table('productcategories')->where('parent_id',$item->id)->get();
                            ?>
                            @foreach($list_chid as $itemchid)
                            <li><a href="#" >{!! $itemchid->name !!}</a></li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div><!-- /#trademark-text-box -->