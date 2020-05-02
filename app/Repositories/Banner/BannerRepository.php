<?php 

namespace App\Repositories\Banner;

use App\Repositories\Banner\BannerRepositoryInterface;
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
    public function delete($id)
    {
        return BannerModel::destroy($id);
    }
    public function update($id, array $data)
    {
        return BannerModel::find($id)->update($data);
    }
}

?>