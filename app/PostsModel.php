<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostsModel extends Model
{
    //
    protected $table = 'posts';
    protected $fillable = ['title','content','image_post','path','type','user_id','is_visible','created_at','updated_at'];
}
