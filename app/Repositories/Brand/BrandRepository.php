<?php

namespace App\Repositories\Brand;

use App\Models\CoffeeBrand;
use App\Repositories\BaseRepositories;

class BrandRepository extends BaseRepositories implements BrandRepositoryInterface
{

    public function getModel()
    {
        return CoffeeBrand::class;
    }

}
