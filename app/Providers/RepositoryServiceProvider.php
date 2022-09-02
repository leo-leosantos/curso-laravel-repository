<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\
{
    ProductRepositoryInterface,
    CategoryRepositoryInterface,
    ChartRepositoryInterface

};
use App\Repositories\Core\Eloquent\
{
    EloquentCategoryRepository,
    EloquentProductRepository,
    EloquentChartRepository

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
            //EloquentCategoryRepository::class
        );
        $this->app->bind(
            ChartRepositoryInterface::class,
            EloquentChartRepository::class
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
