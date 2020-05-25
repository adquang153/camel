<?php 

namespace App\Repositories\Feedback;

use App\Repositories\Feedback\FeedbackRepositoryInterface;
use App\FeedbackModel as Feedback;

class FeedbackRepository implements FeedbackRepositoryInterface{

    public function all($params=[],$where=[]){
        $select = '*';
        if(isset($params['select']))
            $select = $params['select'];
        $data = Feedback::select($select)->where($where)->orderBy('id','desc')->get();
        return $data;
    }

    public function delete($id){
        $result = Feedback::select('id')->find($id);
        if($result){
            $result->forceDelete();
            return true;
        }
        return false;
    }

    public function update($id,$data){
        $result = Feedback::select('id')->find($id);
        if($result){
            $result = $result->update($data);
            return $result;
        }
        return false;
    }
}

?>