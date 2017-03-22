<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productcategories extends Model
{
    protected $table = 'productcategories';

    protected $fillable = ['id','name','description','metatitle','metakeyword','parent_id','displayorder','create_by','update_by','status','image'];

    public $timestamps = true;
}
