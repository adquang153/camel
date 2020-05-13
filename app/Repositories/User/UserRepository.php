<?php

namespace App\Repositories\User;

use App\Repositories\User\UserRepositoryInterface;
use App\User;
use Illuminate\Support\Facades\Storage;

class UserRepository implements UserRepositoryInterface{

    public function get($id, $params = []){
        $data = User::find($id);
        if(isset($params['select']))
            $data = User::select($params['select']);
        return $data;
    }

    public function all($params = [], $where = []){
        $data = User::all();
        if(isset($params['select']))
            $data = User::select($params['select'])->get();
        return $data;
    }

    public function delete($id){

    }

    public function update($id, $data){
        
    }

}

?>