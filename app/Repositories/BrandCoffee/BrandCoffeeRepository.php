<?php

namespace App\Repositories\BrandCoffee;

use App\Models\CoffeeBrand;
use App\Repositories\BaseRepositories;

class BrandCoffeeRepository extends BaseRepositories implements BrandCoffeeRepositoryInterface
{

    public function getModel()
    {
        return CoffeeBrand::class;
    }
}
