<?php


namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements Contracts\BaseRepositoryContract
{
    /**
     * @var     Model
     */
    protected Model $model;

    /**
     * BaseRepository constructor.
     * @param   Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param   array $attributes
     * @return  Model
     */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * @param   Model $model
     * @param   array $attributes
     * @return  bool
     */
    public function update(Model $model, array $attributes): bool
    {
        return $model->update($attributes);
    }

    /**
     * @param   Model $model
     * @return  bool
     */
    public function delete(Model $model): bool
    {
        return $model->delete();
    }

    /**
     * @param   int $id
     * @return  Model
     */
    public function find(int $id): Model
    {
        return $this->model->find($id);
    }

    /**
     * @return  Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * @return  Model
     */
    public function getModel(): Model
    {
        return $this->model;
    }
}
