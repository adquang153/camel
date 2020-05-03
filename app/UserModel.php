<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserModel extends Model
{
    //
    use SoftDeletes;
    protected $table = 'user';
    protected $fillable = ['user_name','password','email','avatar','path','number_phone','type','is_visible','created_at','updated_at'];
}
