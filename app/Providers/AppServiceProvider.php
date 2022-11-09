<?php

namespace App\Providers;

use App\Repositories\CoffeeProduct\CoffeeProductRepository;
use App\Repositories\CoffeeProduct\CoffeeProductRepositoryInterface;
use App\Service\CoffeeProduct\CoffeeProductService;
use App\Service\CoffeeProduct\CoffeeProductServiceInterface;
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
        //CoffeeProduct
        $this->app->singleton(
            CoffeeProductRepositoryInterface::class,
            CoffeeProductRepository::class
        );

        $this->app->singleton(
            CoffeeProductServiceInterface::class,
            CoffeeProductService::class
        );
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
