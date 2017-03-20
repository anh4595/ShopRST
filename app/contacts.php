<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contacts extends Model
{
    protected $table = 'contacts';

    protected $fillable = ['id','name','phone','email','website','address','lat','lng','status'];

    public $timestamps = true;
}
