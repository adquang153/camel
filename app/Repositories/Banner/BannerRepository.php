<?php 

namespace App\Repositories\Banner;

use App\BannerModel;

class BannerRepository implements BannerRepositoryInterface
{
    /**
     * Get's a banner by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($id)
    {
        return BannerModel::find(id);
    }

    /**
     * Get's all posts.
     *
     * @return mixed
     */
    public function all()
    {
        dd(Banner::all());
        return BannerModel::all();
        
    }

    /**
     * Deletes a banner.
     *
     * @param int
     */
    public function delete($id)
    {
        BannerModel::destroy($id);
    }

    /**
     * Updates a banner.
     *
     * @param int
     * @param array
     */
    public function update($id, array $data)
    {
        BannerModel::find($id)->update($data);
    }
}

?>