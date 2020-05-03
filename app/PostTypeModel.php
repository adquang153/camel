<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostTypeModel extends Model
{
    //
    use SoftDeletes;
    protected $table = 'post_type';
    protected $fillable = ['title','content','created_at','updated_at'];
}
