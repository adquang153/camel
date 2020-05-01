<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedbackModel extends Model
{
    //
    protected $table = 'feedback';
    protected $fillable = ['title','content','user_id','created_at','updated_at'];
}
