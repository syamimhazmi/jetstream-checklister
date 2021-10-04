<?php
namespace App\Repositories;

use App\Contracts\Repositories\Repository as RepositoryContract;
use Illuminate\Database\Eloquent\Model;

abstract class Repository implements RepositoryContract
{
    /**
     * Model associated with this repository.
     * Must be an instance of Illuminate\Database\Eloquent\Model.
     *
     * @var string
     */
    protected static $model;

    /**
     * Builder associated with this repository.
     *
     * @var string
     */
    protected static $builder;

    /**
     * Creates a eloquent builder.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function newInstance()
    {
        return $this->getInstance()->newInstance();
    }

    /**
     * Creates a eloquent builder.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function newQuery()
    {
        return $this->getInstance()->newQuery();
    }

    /**
     * Get all data.
     *
     * @return \Illuminate\Support\Collection
     */
    public function all()
    {
        return $this->query()->get();
    }

    /**
     * Get a single data.
     *
     * @param int $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find($id)
    {
        return $this->getInstance()->findOrFail($id);
    }

    /**
     * Get a multiple data by array of IDs.
     *
     * @param array $ids
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findByIds($ids)
    {
        return $this->getInstance()->whereIn('id', $ids)->get();
    }

    /**
     * Get a multiple data by array of IDs.
     *
     * @param string $column
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findByColumn($column, $data)
    {
        return $this->getInstance()->whereIn($column, $data)->get();
    }

    /**
     * Find first resource a return a new instance.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function firstOrNew(array $attributes)
    {
        return $this->getInstance()->firstOrNew($attributes);
    }

    /**
     * Creates a builder.
     *
     * @return \App\Contracts\Repositories\Builders\Repository|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $query = $this->newQuery();

        if (\is_null(static::$builder)) {
            return $query;
        }

        return new static::$builder($query);
    }

    /**
     * Creates a new data.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data)
    {
        return $this->storeData($this->getInstance(), $data);
    }

    /**
     * Updates a data.
     *
     * @param int $id ID of data
     */
    public function update($id, array $data)
    {
        return $this->updateModel($this->find($id), $data);
    }

    /**
     * Updates an existing instance of a Model.
     *
     * @param \Illuminate\Database\Eloquent\Model $model model to be updated
     * @param array                               $data  data to be updated to the model
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateModel(Model $model, array $data)
    {
        return $this->storeData($model, $data);
    }

    /**
     * Deletes a resource.
     *
     * @param int $id ID of data
     *
     * @return bool
     */
    public function delete($id)
    {
        return $this->find($id)->delete();
    }

    /**
     * Returns an instance of the model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function getInstance()
    {
        return new static::$model();
    }

    /**
     * Stores the data.
     *
     * @param array $data
     */
    abstract protected function storeData(Model $model, $data);
}
