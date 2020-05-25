<?php

namespace App\Repositories\AboutUs;

use App\Repositories\AboutUs\AboutUsRepositoryInterface;
use App\AboutUsModel as AboutUs;
use Illuminate\Support\Facades\Storage;

class AboutUsRepository implements AboutUsRepositoryInterface{

    public function get($id,$params = []){
        $select = '*';
        if(isset($params['select']))
            $select = $params['select'];
        $data = AboutUs::select($select)->find($id);
        return $data;
    }

    public function all($params = [],$where = []){
        $select = '*';
        if(isset($params['select']))
            $select = $params['select'];
        $data = AboutUs::select($select)->where($where);
        if(isset($params['paginate']))
            $data = $data->paginate($params['paginate']);
        else
            $data = $data->get();
        return $data;
    }

    public function create($data){
        $path = $data['image']->store('public/images/about_us');
        $data['path'] = $path;
        $data['image'] = Storage::url($path);
        isset($data['is_visible']) ? $data['is_visible'] = 'Y' : $data['is_visible'] = 'N';
        $data = AboutUs::create($data);
        return $data;
    }

    public function delete($id){
        $data = AboutUs::select('id')->find($id);
        if($data){
            $data->forceDelete();
            return true;
        }
        return false;
    }

    public function update($id,$data){
        $result = AboutUs::find($id);
        if($result){
            if(isset($data['image'])){
                $path = $result->path;
                Storage::delete($path);
                $path = $data['image']->store('public/images/about_us');
                $data['path'] = $path;
                $data['image'] = Storage::url($path);
            }
            else{
                $data['path'] = $result->path;
                $data['image'] = $result->image;
            }
            isset($data['is_visible']) ? $data['is_visible'] = 'Y' : $data['is_visible'] = 'N';
            $result->update($data);
            return $result;
        }
        return false;
    }


    public function getAboutHome($params=[],$where=[],$take=1){
        $select = '*';
        if(isset($params['select']))
            $select = $params['select'];
        $data = AboutUs::select($select)->where($where)->take($take)->orderBy('id','desc')->get();
        return $data;
    }
}

?>