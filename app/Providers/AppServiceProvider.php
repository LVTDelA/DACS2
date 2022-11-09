<?php

namespace App\Providers;

use App\Repositories\CoffeeProduct\CoffeeProductRepositoryInterface;
use App\Repositories\CoffeeProduct\CoffeeProductRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Service\CoffeeProduct\CoffeeProductService;
use App\Service\CoffeeProduct\CoffeeProductServiceInterface;
use App\Service\User\UserService;
use App\Service\User\UserServiceInterface;
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

        //User
        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class
        );


        $this->app->singleton(
            UserServiceInterface::class,
            UserService::class
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
