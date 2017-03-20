<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    protected $table = 'customers';

    protected $fillable = ['id','username','password','name','address','email','phone','status'];

    public $timestamps = true;
}
