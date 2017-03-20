<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class feedbacks extends Model
{
    protected $table = 'feedbacks';

    protected $fillable = ['id','name','email','subject','message'];

    public $timestamps = true;
}
