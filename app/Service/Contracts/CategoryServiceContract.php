<?php


namespace App\Service\Contracts;

use App\Dtos\CategorySaveDto;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

interface CategoryServiceContract
{
    public function store(CategorySaveDto $categorySaveDto): Model;
    public function update(CategorySaveDto $categorySaveDto, Category $category): bool;
    public function destroy(Category $category): bool;
}
