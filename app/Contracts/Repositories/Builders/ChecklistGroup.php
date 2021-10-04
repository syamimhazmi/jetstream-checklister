<?php
namespace App\Contracts\Repositories\Builders;

interface ChecklistGroup
{
    /**
     * Searches checklist group according to its name.
     *
     * @param string $column
     * @param string $value
     *
     * @return \App\Contracts\Repositories\Builders\ChecklistGroup
     */
    public function search($column, $value);

    /**
     * Only take the specified segment.
     *
     * @param int $take
     * @param int $skip
     *
     * @return \App\Contracts\Repositories\Builders\ChecklistGroup
     */
    public function segment($take, $skip = 0);

    /**
     * Get query result.
     *
     * @return \Illuminate\Support\Collection
     */
    public function get();

    /**
     * Get query count.
     *
     * @return int
     */
    public function count();
}
