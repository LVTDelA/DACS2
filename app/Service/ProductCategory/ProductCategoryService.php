<?php

namespace App\Service\ProductCategory;

use App\Repositories\ProductCategory\ProductCategoryRepositoryInterface;
use App\Service\ProductCategory\ProductCategoryServiceInterface;
use App\Service\BaseService;

class ProductCategoryService extends BaseService implements ProductCategoryServiceInterface
{
    public $repository;
    public function __construct(ProductCategoryRepositoryInterface $categoryRepository)
    {
        $this->repository = $categoryRepository;
    }
}
