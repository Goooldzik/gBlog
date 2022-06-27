<?php

namespace App\Providers;

use App\Repository\BaseRepository;
use App\Repository\CategoryRepository;
use App\Repository\Contracts\BaseRepositoryContract;
use App\Repository\Contracts\CategoryRepositoryContract;
use App\Service\CategoryService;
use App\Service\Contracts\CategoryServiceContract;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseRepositoryContract::class, BaseRepository::class);

        $this->app->bind(CategoryRepositoryContract::class, CategoryRepository::class);
        $this->app->bind(CategoryServiceContract::class, CategoryService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
