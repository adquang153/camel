<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductsModel extends Model
{
    //
    use SoftDeletes;
    protected $table = 'products';
    protected $fillable = ['title','content','image_product','path','price','type','user_id','is_visible','created_at','update_at'];
}
