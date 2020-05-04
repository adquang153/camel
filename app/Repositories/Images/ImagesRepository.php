<?php 

namespace App\Repositories\Images;

use Illuminate\Support\Facades\Storage;
use App\Repositories\Images\ImagesRepositoryInterface;
use App\ImagesProductModel as Images;

class ImagesRepository implements ImagesRepositoryInterface{

    public function get($id){
        return Images::find($id);
    }

    public function all($where=[]){
        $data = Images::where($where)->orderBy('id','desc')->get();
        return $data;
    }
    
    public function create($data){
        $path = $data['image']->store('public/images/images_product');
        $data['path'] = $path;
        $data['image'] = Storage::url($path);
        isset($data['is_visible']) ? $data['is_visible'] = 'Y' : $data['is_visible'] = 'N';
        $data = Images::create($data);
        return $data;
    }

    public function delete($id){
        $result = Images::find($id);
        if($result){
            Storage::delete($result->path);
            $result->delete();
            return true;
        }
        return false;
    }

}