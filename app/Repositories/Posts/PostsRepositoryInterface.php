<?php 

namespace App\Repositories\Posts;

interface PostsRepositoryInterface{

    public function get($id);

    public function all();
    
    public function create($data);

    public function delete($id);
    
    public function update($id, $data);

}

?>