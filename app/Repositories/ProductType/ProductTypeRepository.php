<?php 

namespace App\Repositories\ProductType;

use App\Repositories\ProductType\ProductTypeRepositoryInterface;
use App\ProductTypeModel as ProType;

class ProductTypeRepository implements ProductTypeRepositoryInterface{

    public function get($id){
        return ProType::find($id);
    }

    public function all($params = []){
        $select = '*';
        if(isset($params['select']))
            $select = $params['select'];
        return ProType::select($select)->get();
    }

    public function create($data){
        return ProType::create($data);
    }

    public function delete($id){
        $data = ProType::find($id);
        if($data){
            $data->forceDelete();
            return true;
        }
        return false;
    }

    public function update($id, $data){
        $result = ProType::find($id);
        if($result){
            $result = $result->update($data);
            return $result;
        }
        return false;
    }
}


?>