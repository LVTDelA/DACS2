<?php

namespace App\Service\CoffeeProduct;

use App\Service\ServiceInterface;

interface CoffeeProductServiceInterface extends ServiceInterface
{
    public function getRelatedProducts($product, $limit = 4);
    public function getFeaturedProducts();
    public function getProductOnIndex($request);
    public function getProductsByCategory($categoryName, $request);

}
