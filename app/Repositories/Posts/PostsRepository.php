<?php 

namespace App\Repositories\Posts;

use App\Repositories\Posts\PostsRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use App\PostsModel as Posts;

class PostsRepository implements PostsRepositoryInterface{

    public function get($id){
        return Posts::find($id);
    }

    public function all(){
        return Posts::orderBy('id','desc')->get();
    }

    public function create($data){
        $path = $data['image_post']->store('public/images/posts');
        $data['path'] = $path;
        $data['image_post'] = Storage::url($path);
        isset($data['is_visible']) ? $data['is_visible'] = 'Y' : $data['is_visible'] = 'N';
        $data = Posts::create($data);
        return $data;
    }

    public function update($id, $data){
        $result = Posts::find($id);
        if($result){
            $path = $result->path;
            if(isset($data['image_post'])){
                Storage::delete($path);
                $path = $data['image_post']->store('public/images/posts');
            }
            $data['path'] = $path;
            $data['image_post'] = Storage::url($path);
            isset($data['is_visible']) ? $data['is_visible'] = 'Y' : $data['is_visible'] = 'N';
            $result = $result->update($data);
            return $result;
        }
        return false;
    }

    public function delete($id){
        $result = Posts::find($id);
        if($result){
            $result->forceDelete();
            return true;
        }
        return false;
    }

}

?>