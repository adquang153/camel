<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagesProductModel extends Model
{
    //
    protected $table = 'images_product';
    protected $fillable = ['images','product_id','path','is_visible','created_at','updated_at'];
}
