<?php


namespace App\Service;

use App\Dtos\CategorySaveDto;
use App\Models\Category;
use App\Repository\Contracts\CategoryRepositoryContract;
use App\Service\Contracts\CategoryServiceContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class CategoryService implements CategoryServiceContract
{
    /**
     * @var     CategoryRepositoryContract
     */
    protected CategoryRepositoryContract $categoryRepository;

    /**
     * CategoryService constructor.
     * @param   CategoryRepositoryContract $categoryRepository
     */
    public function __construct(CategoryRepositoryContract $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param   CategorySaveDto $categorySaveDto
     * @return  Model
     */
    public function store(CategorySaveDto $categorySaveDto): Model
    {
        return $this->categoryRepository->create($categorySaveDto->toArray());
    }

    /**
     * @param   CategorySaveDto $categorySaveDto
     * @param   Category $category
     * @return  bool
     */
    public function update(CategorySaveDto $categorySaveDto, Category $category): bool
    {
        return $this->categoryRepository->update($category, $categorySaveDto->toArray());
    }

    /**
     * @param   Category $category
     * @return  bool
     */
    public function destroy(Category $category): bool
    {
        return $this->categoryRepository->delete($category);
    }
}
