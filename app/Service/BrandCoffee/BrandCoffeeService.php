<?php

namespace App\Service\BrandCoffee;

use App\Repositories\BrandCoffee\BrandCoffeeRepositoryInterface;
use App\Service\BrandCoffee\BrandCoffeeServiceInterface;
use App\Service\BaseService;

class BrandCoffeeService extends BaseService implements BrandCoffeeServiceInterface
{

    public $repository;
    public function __construct(BrandCoffeeRepositoryInterface $brandCoffeeRepository)
    {
        $this->repository = $brandCoffeeRepository;
    }
}
