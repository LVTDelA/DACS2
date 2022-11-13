<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CoffeeProduct;
use App\Service\Blog\BlogServiceInterface;
use App\Service\CoffeeProduct\CoffeeProductServiceInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $productService;
    private $blogService;

    public function __construct(CoffeeProductServiceInterface $coffeeProductService,
                                BlogServiceInterface          $blogService)
    {
        $this->productService = $coffeeProductService;
        $this->blogService = $blogService;
    }

    public function index()
    {
        $products = $this->productService->getFeaturedProducts();
        $product1s = $products[0];
        $product2s = $products[1];
        $product3s = $products[2];

        $blogs = $this->blogService->getLatestBlogs();

        // dd($products2);
        return view('front.index', compact('product1s', 'product2s', 'product3s', 'blogs'));
    }
}
