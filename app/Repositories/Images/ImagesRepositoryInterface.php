<?php 

namespace App\Repositories\Images;

interface ImagesRepositoryInterface{
    

    public function all();

    public function create($data);

    public function delete($id);

}

?>