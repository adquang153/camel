<?php

namespace App\Repositories\Feedback;

interface FeedbackRepositoryInterface{

    public function all();

    public function delete($id);

    public function update($id,$data);

}

?>