<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productsizes extends Model
{
    protected $table = 'productsizes';

    protected $fillable = ['product_id','size_id'];

    public $timestamps = true;
}
