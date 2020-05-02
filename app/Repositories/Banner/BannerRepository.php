<?php 

namespace App\Repositories\Banner;

use App\Repositories\Banner\BannerRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use App\BannerModel;

class BannerRepository implements BannerRepositoryInterface
{
    public function get($id)
    {
        return BannerModel::find($id);
    }

    public function all()
    {
        return BannerModel::all();
    }

    public function create($data){
        $path = $data['image_banner']->store('public/images/banner');
        $data['path'] = $path;
        $data['image_banner'] = Storage::url($path);
        isset($data['is_visible']) ? $data['is_visible'] = 'Y' : $data['is_visible'] = 'N';
        $data = BannerModel::create($data);
        return $data;
    }

    public function delete($id)
    {
        $data = BannerModel::find($id);
        if($data){
            $data->forceDelete();
            return true;
        }
        return false;
    }

    public function update($id, $data)
    {
        $result = BannerModel::find($id);
        if($result){
            if(isset($data['image_banner'])){
                $path = $result->path;
                Storage::delete($path);
                $path = $data['image_banner']->store('public/images/banner');
                $data['path'] = $path;
                $data['image_banner'] = Storage::url($path);
            }
            else{
                $data['path'] = $result->path;
                $data['image_banner'] = $result->image_banner;
            }
            isset($data['is_visible']) ? $data['is_visible'] = 'Y' : $data['is_visible'] = 'N';
            $result->update($data);
            return $result;
        }
        return false;
    }
}

?>