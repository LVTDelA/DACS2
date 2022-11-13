<?php

namespace App\Service\CoffeeProduct;

use App\Repositories\CoffeeProduct\CoffeeProductRepositoryInterface;
use App\Service\BaseService;

class CoffeeProductService extends BaseService implements CoffeeProductServiceInterface
{
    public $repository;

    public function __construct(CoffeeProductRepositoryInterface $coffeeProductRepository)
    {
        $this->repository = $coffeeProductRepository;
    }

    public function getRelatedProducts($product, $limit = 4)
    {
        return $this->repository->getRelatedProducts($product, $limit);
    }

    public function getFeaturedProducts()
    {
        return [
            $this->repository->getFeaturedProductsByCategory(1),
            $this->repository->getFeaturedProductsByCategory(2),
            $this->repository->getFeaturedProductsByCategory(3),
        ];
    }

    public function getProductOnIndex($request)
    {
        return $this->repository->getProductOnIndex($request);
    }

    public function getProductsByCategory($categoryName, $request)
    {
        return $this->repository->getProductsByCategory($categoryName, $request);
    }
}
