<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $table = 'users';

    protected $fillable = ['id','username','password','name','phone','email','createdby','updatedby','group_id','status'];

    public $timestamps = true;
}
