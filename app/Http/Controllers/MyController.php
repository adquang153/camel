<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    //
    
    public function getConfig(){
        $data = config('menu');
        return view('admin/index',compact('data'));
    }

}
