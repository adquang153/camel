<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactModel extends Model
{
    //
    use SoftDeletes;
    protected $table = 'contact_us';
    protected $fillable = ['address','phone_number','hot_line','work_time','created_at','updated_at'];
}
