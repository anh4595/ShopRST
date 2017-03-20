<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = 'orders';

    protected $fillable = ['id','customername','customeraddress','customeremail','customermobile','customermessage','status'];

    public $timestamps = true;
}
