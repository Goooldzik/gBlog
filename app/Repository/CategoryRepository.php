<?php

namespace App\Repository;

use App\Models\Category;
use App\Repository\Contracts\CategoryRepositoryContract;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class CategoryRepository extends BaseRepository implements CategoryRepositoryContract
{
    /**
     * CategoryRepository constructor.
     * @param   Category $model
     */
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function search(array $params): LengthAwarePaginator
    {
        $categories = $this->model->newQuery();
        if (!empty($params['search'])) {
            $querySearch = $params['search'];
            $categories->where(function (Builder $query) use ($querySearch) {
                $query->where('title', 'ILIKE', "%$querySearch%");
            });
        }

        return $categories->paginate(perPage($params['per_page'] ?? null));
    }
}
