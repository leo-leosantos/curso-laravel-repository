<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\
{
    ProductRepositoryInterface,
    CategoryRepositoryInterface

};
use App\Repositories\Core\Eloquent\
{
    EloquentProductRepository,

};
use App\Repositories\Core\QueryBuilder\
{
    QueryBuilderCategoryRepository,

};
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ProductRepositoryInterface::class,
            EloquentProductRepository::class
        );

        $this->app->bind(
            CategoryRepositoryInterface::class,
            QueryBuilderCategoryRepository::class
        );

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
