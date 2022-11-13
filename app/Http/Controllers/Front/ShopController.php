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

//        $relatedProducts = CoffeeProduct::
//        where('id_coffee_category', $product->id_coffee_category)
//            ->limit(4)
//            ->get();
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

//        $products = CoffeeProduct::where('name', 'like', '%' . $search . '%');
//
//        $products = $this->filter($products, $request);
//        $products = $this->sortAndPagination($products, $sortBy, $perPage);
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

//        $products = $this->filter($products, $request);
//        $products = $this->sortAndPagination($products, $sortBy, $perPage);

        return view('front.shop.index', compact('categories', 'brands', 'products'));
    }
}
