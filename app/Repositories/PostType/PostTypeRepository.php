<?php

namespace App\Repositories\PostType;

use App\Repositories\PostType\PostTypeRepositoryInterface;
use App\PostTypeModel as PostType;

class PostTypeRepository implements PostTypeRepositoryInterface{

    public function get($id){
        return PostType::find($id);
    }

    public function all(){
        return PostType::orderBy('id','desc')->get();
    }

    public function create($data){
        return PostType::create($data);
    }

    public function delete($id){
        $result = PostType::find($id);
        if($result){
            $result->forceDelete();
            return true;
        }
        return false;
    }

    public function update($id, $data){
        $result = PostType::find($id);
        if($result){
            $result->update($data);
            return $result;
        }
        return false;
    }

}

?>