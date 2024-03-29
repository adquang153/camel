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
     * Create a banner
     * return @mixed
     */
    public function create($data);

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
    public function update($id, $data);
}

?>