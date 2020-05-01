<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTypeModel extends Model
{
    //
    protected $table = 'post_type';
    protected $fillable = ['title','content','created_at','updated_at'];
}
