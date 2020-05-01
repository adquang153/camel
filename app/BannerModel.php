<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BannerModel extends Model
{
    use SoftDeletes;
    //
    protected $table = 'banner';
    protected $fillable = ['title','image_banner','path','start_date','end_date','is_visible','created_at','updated_at'];
}
