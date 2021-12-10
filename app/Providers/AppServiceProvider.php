<?php

namespace App\Providers;

use App\Repositories\ProductAttributesRepository;
use App\Repositories\ProductAttributesRepositoryInterface;
use App\Repositories\ProductsRepository;
use App\Repositories\ProductsRepositoryInterface;
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
        $this->app->bind(ProductsRepositoryInterface::class, function () {
            return new ProductsRepository();
        });
        $this->app->bind(ProductAttributesRepositoryInterface::class, function () {
            return new ProductAttributesRepository();
        });
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
