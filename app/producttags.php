<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producttags extends Model
{
    protected $table = 'producttags';

    protected $fillable = ['product_id','tag_id'];

    public $timestamps = true;
}
