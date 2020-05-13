<?php 

namespace App\Repositories\User;

interface UserRepositoryInterface{

    public function get($id);

    public function all();

    public function delete($id);

    public function update($id, $data);

}

?>