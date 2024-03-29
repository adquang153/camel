<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductTypeModel extends Model
{
    //
    use SoftDeletes;
    protected $table = 'product_type';
    protected $fillable = ['title','image','path','created_at','updated_at'];
}
