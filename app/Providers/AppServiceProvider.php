<?php

namespace App\Providers;

use App\Categories;
use App\Observers\CategoriesObserver;
use App\Observers\ProductsObserver;
use App\Product;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Categories::observe(CategoriesObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
