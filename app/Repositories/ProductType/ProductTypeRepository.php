<?php 

namespace App\Repositories\ProductType;

use Illuminate\Support\Facades\Storage;
use App\Repositories\ProductType\ProductTypeRepositoryInterface;
use App\ProductTypeModel as ProType;

class ProductTypeRepository implements ProductTypeRepositoryInterface{

    public function get($id,$params=[]){
        $select = '*';
        if(isset($params['select']))
            $select = $params['select'];
        return ProType::select($select)->find($id);
    }

    public function all($params = []){
        $select = '*';
        if(isset($params['select']))
            $select = $params['select'];
        return ProType::select($select)->get();
    }

    public function create($data){
        $path = $data['image']->store('public/images/product_type');
        $data['path'] = $path;
        $data['image'] = Storage::url($path);
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
            $path = $result->path;
            if(isset($data['image'])){
                Storage::delete($path);
                $path = $data['image']->store('public/images/product_type');
            }
            $data['path'] = $path;
            $data['image'] = Storage::url($path);
            $result = $result->update($data);
            return $result;
        }
        return false;
    }

    public function getProductType($params=[],$where=[],$take){
        $select = '*';
        if(isset($params['select']))
            $select = $params['select'];
        $data = ProType::select($select)->where($where)->take($take)->get();
        return $data;
    }
}


?>