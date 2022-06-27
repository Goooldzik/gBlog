<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repository\Contracts\CategoryRepositoryContract;
use App\Service\Contracts\CategoryServiceContract;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class CategoryController extends Controller
{
    /**
     * @var     CategoryServiceContract
     */
    protected CategoryServiceContract $categoryService;

    /**
     * @var     CategoryRepositoryContract
     */
    protected CategoryRepositoryContract $categoryRepository;

    /**
     * CategoryController constructor.
     * @param   CategoryServiceContract $categoryService
     * @param   CategoryRepositoryContract $categoryRepository
     */
    public function __construct(CategoryServiceContract $categoryService, CategoryRepositoryContract $categoryRepository)
    {
        $this->categoryService = $categoryService;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return  View
     */
    public function index(Request $request): View
    {
        return view('dashboard.categories.index', [
            'categories' => $this->categoryRepository->search($request->all())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  View
     */
    public function create(): View
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param   CategoryRequest $request
     * @return  JsonResponse
     * @throws  UnknownProperties
     */
    public function store(CategoryRequest $request): JsonResponse
    {
        $category = $this->categoryService->store($request->data());

        if($category) {
            return response()->json([
                'status' => 'success',
                'message' => __('categories.successful_created')
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => __('errors.something_went_wrong')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param   Category $category
     * @return  View
     */
    public function show(Category $category): View
    {
        return view('categories.show', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param   Category $category
     * @return  View
     */
    public function edit(Category $category): View
    {
        return view('dashboard.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param   CategoryRequest $request
     * @param   Category $category
     * @return  JsonResponse
     * @throws  UnknownProperties
     */
    public function update(CategoryRequest $request, Category $category): JsonResponse
    {
        $result = $this->categoryService->update($request->data(), $category);

        if($result) {
            return response()->json([
                'status' => 'success',
                'message' => __('categories.successful_updated')
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => __('errors.something_went_wrong')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param   Category $category
     * @return  JsonResponse
     */
    public function destroy(Category $category): JsonResponse
    {
        $result = $this->categoryService->destroy($category);

        if($result) {
            return response()->json([
                'status' => 'success',
                'message' => __('categories.successful_deleted')
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => __('errors.something_went_wrong')
        ]);
    }
}
