<?php 

namespace App\Repositories\Products;

use App\Repositories\Products\ProductsRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use App\ProductsModel as Products;

class ProductsRepository implements ProductsRepositoryInterface{

    public function get($id,$params=[],$type=""){
        $select = '*';
        if(isset($params['select']))
            $select = $params['select'];
        if(!$type==""){
            $data = Products::select($select)->where('products.is_visible','Y')->where('products.id',$id)->join('users','users.id','=','products.user_id');
            return $data->first();
        }
        return Products::select($select)->find($id);
    }

    public function all($params=[],$where=[]){
        $select = '*';
        if(isset($params['select']))
            $select = $params['select'];
        $data = Products::select($select)->where($where)->orderBy('id','desc');
        if(isset($params['paginate']))
            $data = $data->paginate($params['paginate']);
        else
            $data = $data->get();
        return $data;
    }

    public function create($data){
        $path = $data['image_product']->store('public/images/products');
        $data['path'] = $path;
        $data['image_product'] = Storage::url($path);
        isset($data['is_visible']) ? $data['is_visible'] = 'Y' : $data['is_visible'] = 'N';
        $data = Products::create($data);
        return $data;
    }

    public function update($id, $data){
        $result = Products::find($id);
        if($result){
            $path = $result->path;
            if(isset($data['image_product'])){
                Storage::delete($path);
                $path = $data['image_product']->store('public/images/products');
            }
            $data['path'] = $path;
            $data['image_product'] = Storage::url($path);
            isset($data['is_visible']) ? $data['is_visible'] = 'Y' : $data['is_visible'] = 'N';
            $result = $result->update($data);
            return $result;
        }
        return false;
    }

    public function delete($id){
        $result = Products::select('id')->find($id);
        if($result){
            $result->forceDelete();
            return true;
        }
        return false;
    }
}
?>