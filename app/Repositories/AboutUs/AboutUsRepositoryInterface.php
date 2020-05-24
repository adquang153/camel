<?php

namespace App\Repositories\AboutUs;

interface AboutUsRepositoryInterface{

    public function get($id);

    public function all();

    public function delete($id);

    public function create($data);

    public function update($id, $data);

}

?>