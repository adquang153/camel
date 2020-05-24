<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutUsModel extends Model
{
    //
    use SoftDeletes;
    
    protected $table = 'about_us';
    protected $fillable = ['title','content','image','path','is_visible','created_at','updated_at'];
}
