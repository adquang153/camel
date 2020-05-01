<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTypeModel extends Model
{
    //
    protected $table = 'product_type';
    protected $fillable = ['title','content','created_at','updated_at'];
}
