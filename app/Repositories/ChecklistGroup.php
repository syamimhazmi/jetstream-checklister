<?php
namespace App\Repositories;

use App\Contracts\Repositories\ChecklistGroup as ChecklistGroupContract;
use App\Models\ChecklistGroup as CheclistGroupModel;
use App\Repositories\Builders\ChecklistGroup as ChecklistGroupBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ChecklistGroup extends Repository implements ChecklistGroupContract
{
    /**
     * Model associated with this repository.
     *
     * @var string
     */
    protected static $model = CheclistGroupModel::class;

    /**
     * Builder associated with this repository.
     *
     * @var string
     */
    protected static $builder = ChecklistGroupBuilder::class;

    /**
     * Get all checklist groups.
     *
     * @return \Illuminate\Support\Collection
     */
    public function all()
    {
        return $this->query()->all();
    }

    /**
     * Get a single checklist group.
     *
     * @param int $userId
     *
     * @return \App\Models\ChecklistGroup
     */
    public function find($id)
    {
        $model = static::$model;

        return $model::findOrFail($id);
    }

    /**
     * Get a single checklist group with trashed.
     *
     * @param int $userId
     *
     * @return \App\Models\ChecklistGroup
     */
    public function findWithTrashed($id)
    {
        $model = static::$model;

        return $model::withTrashed()->findOrFail($id);
    }

    /**
     * Creates a builder.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return new static::$builder((new static::$model)->newQuery());
    }

    /**
     * Creates a new data.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data)
    {
        // Some code here to create checklist group data
        $checklistGroup = null;

        DB::transaction(function () use ($data, &$checklistGroup) {
            $checklistGroup = parent::create($data);
        });

        return $checklistGroup;
    }

    /**
     * Updates a data.
     *
     * @param int $id ID of data
     */
    public function update($id, array $data)
    {
        // Some code here to create checklist group data
        $checklistGroup = null;

        DB::transaction(function () use ($id, $data, &$checklistGroup) {
            $checklistGroup = parent::update($id, $data);
        });

        return $checklistGroup;
    }

    /**
     * Stores the checklist group data.
     *
     * @param \App\Models\ChecklistGroup    $renewal
     * @param array                         $data
     */
    protected function storeData(Model $checklistGroup, $data)
    {
        // Some logic to store data
        $checklistGroup->name = $data['name'];
        $checklistGroup->save();

        return $checklistGroup;
    }

    /**
     * Deletes a checklist group.
     *
     * @param int $id ID of data
     *
     * @return bool
     */
    public function delete($id)
    {
        return $this->find($id)->delete();
    }
}
