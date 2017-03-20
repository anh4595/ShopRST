<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'products';

    protected $fillable = ['id','name','category_id','metatitle','metakeyword','quantity','quantitysold','price','promotionprice','image','moreimage','tag','description','detail','size','hotflag','viewcount','create_by','update_by','status','homeflag','promotionflag'];

    public $timestamps = true;
}
