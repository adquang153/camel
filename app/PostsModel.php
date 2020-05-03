<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PostsModel extends Model
{
    //
    use SoftDeletes;
    protected $table = 'posts';
    protected $fillable = ['title','content','image_post','path','type','user_id','is_visible','created_at','updated_at'];
}
