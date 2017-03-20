<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usergroups extends Model
{
    protected $table = 'usergroups';

    protected $fillable = ['id','name','status'];

    public $timestamps = true;
}
