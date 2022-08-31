<?php

namespace App\Providers;

use App\Models\Category;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            //array com todas as views que quero compartilhar os dados
            [
                'admin.products.*'
            ],

            //buscar os dados
            function($view) {
                $view->with('categories', Category::pluck('title','id'));
            }
    );
    }
}
