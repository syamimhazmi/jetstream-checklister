<?php
namespace App\Repositories\Builders;

use App\Contracts\Repositories\Builders\ChecklistGroup as ChecklistGroupContract;
use Illuminate\Database\Eloquent\Builder;

class ChecklistGroup implements ChecklistGroupContract
{
    /**
     * Eloquent builder.
     *
     * @var \Illuminate\Database\Eloquent\Builder
     */
    protected $builder;

    /**
     * Creates a new Checklist group builder.
     */
    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Only take the specified segment.
     *
     * @param int $take
     * @param int $skip
     *
     * @return \App\Contracts\Repositories\Builders\ChecklistGroup
     */
    public function segment($take, $skip = 0)
    {
        return new static($this->builder->take($take)->skip($skip));
    }

    /**
     * Searches user according to its name.
     *
     * @param string $value
     *
     * @return \App\Contracts\Repositories\Builders\ChecklistGroup
     */
    public function search($column, $value)
    {
        return new static($this->builder->where(function ($query) use ($column, $value) {
            $query->where($column, $value);
        }));
    }

    /**
     * Get query result.
     *
     * @return \Illuminate\Support\Collection
     */
    public function get()
    {
        return $this->builder->get();
    }

    /**
     * Get query count.
     *
     * @return int
     */
    public function count()
    {
        return $this->buidler->count();
    }

    /**
     * Load data with relationships.
     */
    public function with($relationship)
    {
        $this->builder->with($relationship);

        return $this;
    }
}
