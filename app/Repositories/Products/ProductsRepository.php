<?php 

namespace App\Repositories\Products;

use App\Repositories\Products\ProductsRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use App\ProductsModel as Products;

class ProductsRepository implements ProductsRepositoryInterface{

    public function get($id){
        return Products::find($id);
    }

    public function all($where=[]){
        return Products::where($where)->orderBy('id','desc')->get();
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
        $result = Products::find($id);
        if($result){
            $result->forceDelete();
            return true;
        }
        return false;
    }

}

?>