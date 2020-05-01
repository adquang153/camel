<?php 

namespace App\Repositories\Banner;

interface BannerRepositoryInterface
{
    /**
     * Get's a banner by it's ID
     *
     * @param int
     */
    public function get($id);

    /**
     * Get's all banners.
     *
     * @return mixed
     */
    public function all();

    /**
     * Deletes a banner.
     *
     * @param int
     */
    public function delete($id);

    /**
     * Updates a banner.
     *
     * @param int
     * @param array
     */
    public function update($id, array $data);
}

?>