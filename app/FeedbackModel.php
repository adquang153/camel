<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class FeedbackModel extends Model
{
    //
    use SoftDeletes;
    protected $table = 'feedback';
    protected $fillable = ['title','content','user_id','created_at','updated_at'];
}
