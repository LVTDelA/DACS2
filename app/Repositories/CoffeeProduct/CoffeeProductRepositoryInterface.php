<?php

namespace App\Repositories\CoffeeProduct;

use App\Repositories\RepositoriesInterface;

interface CoffeeProductRepositoryInterface extends RepositoriesInterface
{
    public function getRelatedProducts ($product, $limit = 4);
    public function getFeaturedProductsByCategory(int $categoryId);
    public function getProductOnIndex($request);
    public function getProductsByCategory($categoryName, $request);

}
