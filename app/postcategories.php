<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class postcategories extends Model
{
    protected $table = 'postcategories';

    protected $fillable = ['id','name','metatitle','description','createdby','updatedby','status'];

    public $timestamps = true;
}
