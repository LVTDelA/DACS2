<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CoffeeBrand;
use App\Models\CoffeeCategory;
use App\Models\CoffeeProduct;
use App\Service\Brand\BrandServiceInterface;
use App\Service\CoffeeProduct\CoffeeProductServiceInterface;
use App\Service\ProductCategory\ProductCategoryServiceInterface;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    private $productService;
    private $productCategoryService;
    private $brandService;

    public function __construct(CoffeeProductServiceInterface   $coffeeProductService,
                                ProductCategoryServiceInterface $productCategoryService,
                                BrandServiceInterface           $brandService)
    {
        $this->productService = $coffeeProductService;
        $this->productCategoryService = $productCategoryService;
        $this->brandService = $brandService;
    }

    //
    public function show($id)
    {
        $categories = $this->productCategoryService->all();
        $brands = $this->brandService->all();

        $product = $this->productService->find($id);

        $relatedProducts = $this->productService->getRelatedProducts($product);

//        dd($product);
        return view('front.shop.show', compact('categories', 'brands', 'product', 'relatedProducts'));
    }

    public function index(Request $request)
    {
        $categories = $this->productCategoryService->all();
        $brands = $this->brandService->all();

        $perPage = $request->show ?? 3;
        $sortBy = $request->sort_by ?? 'latest';
        $search = $request->search ?? '';

        $products = $this->productService->getProductOnIndex($request);


//        dd($products->links());
        return view('front.shop.index', compact('categories', 'brands', 'products'));
    }

    public function category($categoryName, Request $request)
    {
        $categories = $this->productCategoryService->all();
        $brands = $this->brandService->all();

        $perPage = $request->show ?? 3;
        $sortBy = $request->sort_by ?? 'latest';

//        $products = $this->productCategoryService->where('name', $categoryName)->first()->CoffeeProducts->toQuery();
        $products = $this->productService->getProductsByCategory($categoryName, $request);


        return view('front.shop.index', compact('categories', 'brands', 'products'));
    }
}
