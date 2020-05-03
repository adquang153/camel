<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImagesProductModel extends Model
{
    //
    use SoftDeletes;
    protected $table = 'images_product';
    protected $fillable = ['images','product_id','path','is_visible','created_at','updated_at'];
}
