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
     * Get's all contacts.
     *
     * @return mixed
     */
    public function all();

    /**
     * Create a contact
     * return @mixed
     */
    public function create($data);

    /**
     * Deletes a contact.
     *
     * @param int
     */
    public function delete($id);

    /**
     * Updates a contact.
     *
     * @param int
     * @param array
     */
    public function update($id, $data);
}

?>