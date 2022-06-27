<?php

namespace App\Repository\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface CategoryRepositoryContract extends BaseRepositoryContract
{
    public function search(array $params): LengthAwarePaginator;
}
