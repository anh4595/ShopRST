<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderdetails extends Model
{
    protected $table = 'orderdetails';

    protected $fillable = ['order_id','product_id','quantity','price','note'];

    public $timestamps = true;
}
