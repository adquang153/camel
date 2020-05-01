<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    //
    protected $table = 'user';
    protected $fillable = ['user_name','password','email','avatar','path','number_phone','type','is_visible','created_at','updated_at'];
}
