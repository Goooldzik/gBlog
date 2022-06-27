<?php


namespace App\Repository\Contracts;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryContract
{
    public function create(array $attributes): Model;

    public function update(Model $model, array $attributes): bool;

    public function delete(Model $model): bool;

    public function find(int $id): Model;

    public function all(): Collection;

    public function getModel(): Model;
}
