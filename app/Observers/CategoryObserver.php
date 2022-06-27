<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryObserver
{
    /**
     * @param   Category $category
     * @return  void
     */
    public function creating(Category $category): void
    {
        $category->slug = Str::slug($category->title);
    }

    /**
     * Handle the Category "created" event.
     *
     * @param   Category $category
     * @return  void
     */
    public function created(Category $category): void
    {
        //
    }

    public function updating(Category $category): void
    {
        $category->slug = Str::slug($category->title);
    }

    /**
     * Handle the Category "updated" event.
     *
     * @param   Category $category
     * @return  void
     */
    public function updated(Category $category): void
    {
        //
    }

    /**
     * Handle the Category "deleted" event.
     *
     * @param   Category $category
     * @return  void
     */
    public function deleted(Category $category): void
    {
        //
    }

    /**
     * Handle the Category "restored" event.
     *
     * @param   Category $category
     * @return  void
     */
    public function restored(Category $category): void
    {
        //
    }

    /**
     * Handle the Category "force deleted" event.
     *
     * @param   Category $category
     * @return  void
     */
    public function forceDeleted(Category $category): void
    {
        //
    }
}
