<?php

namespace App\Service\ProductCategory;

use App\Service\ProductCategory\ProductCategoryServiceInterface;
use App\Service\BaseService;

class ProductCategoryService extends BaseService implements ProductCategoryServiceInterface
{
    public $repository;
    public function __construct(ProductCategoryServiceInterface $productCategoryService)
    {
        $this->repository=  $productCategoryService;
    }
}
