<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    protected $table = 'posts';

    protected $fillable = ['id','name','metatitle','metakeyword','category_id','image','description','detail','tag','createdby','updatedby','status'];

    public $timestamps = true;
}
