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
}
