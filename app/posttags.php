<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posttags extends Model
{
    protected $table = 'posttags';

    protected $fillable = ['post_id','tag_id'];

    public $timestamps = true;
}
