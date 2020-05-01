<?php 

namespace App\Repositories;
use App\BannerModel;

class PostRepository implements PostRepositoryInterface
{
    /**
     * Get's a post by it's ID
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
        return BannerModel::all();
    }

    /**
     * Deletes a post.
     *
     * @param int
     */
    public function delete($id)
    {
        BannerModel::destroy($id);
    }

    /**
     * Updates a post.
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