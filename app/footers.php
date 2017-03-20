<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class footers extends Model
{
    protected $table = 'footers';

    protected $fillable = ['id','content','status',];

    public $timestamps = true;
}
