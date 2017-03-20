<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class abouts extends Model
{
    protected $table = 'abouts';

    protected $fillable = ['id','name','detail','createdby','updatedby','status'];

    public $timestamps = true;
}
