<?php 

namespace App\Repositories\PostType;

interface PostTypeRepositoryInterface{

    public function get($id);

    public function all();

    public function create($data);

    public function delete($id);

    public function update($id, $data);

}

?>