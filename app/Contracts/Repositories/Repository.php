<?php
namespace App\Contracts\Repositories;

interface Repository
{
    /**
     * Get all data.
     *
     * @return \Illuminate\Support\Collection
     */
    public function all();

    /**
     * Get a single data.
     *
     * @param int $userId
     *
     * @return
     */
    public function find($id);

    /**
     * Creates a builder.
     *
     * @return
     */
    public function query();

    /**
     * Creates a new data.
     *
     * @return
     */
    public function create(array $data);

    /**
     * Updates a data.
     *
     * @param int $id ID of data
     */
    public function update($id, array $data);

    /**
     * Deletes a resource.
     *
     * @param int $id ID of data
     *
     * @return bool
     */
    public function delete($id);
}
