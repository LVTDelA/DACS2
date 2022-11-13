<?php

namespace App\Repositories\ProductCategory;

use App\Models\CoffeeCategory;
use App\Repositories\BaseRepositories;

class ProductCategoryRepository extends BaseRepositories implements ProductCategoryRepositoryInterface
{

    public function getModel()
    {
        return CoffeeCategory::class;
    }
}
