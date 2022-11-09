<?php

namespace App\Repositories\CoffeeProduct;

use App\Models\CoffeeProduct;
use App\Repositories\BaseRepositories;

class CoffeeProductRepository extends BaseRepositories implements CoffeeProductRepositoryInterface
{

    public function getModel()
    {
        return CoffeeProduct::class;
    }
}
