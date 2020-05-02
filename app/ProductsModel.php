<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    //
    protected $table = 'products';
    protected $fillable = ['title','content','image_product','path','price','type','user_id','is_visible','created_at','update_at'];
}
