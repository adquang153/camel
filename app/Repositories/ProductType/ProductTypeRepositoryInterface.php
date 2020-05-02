<?php 

namespace App\Repositories\ProductType;

interface ProductTypeRepositoryInterface{

    public function get($id);

    public function all();
    
    public function create($data);

    public function delete($id);

    public function update($id, $data);

}

?>