<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CoffeeBrand;
use App\Models\CoffeeCategory;
use App\Models\CoffeeProduct;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //
    public function show($id)
    {
        $categories = CoffeeCategory::all();
        $brands = CoffeeBrand::all();

        $product = CoffeeProduct::findOrfail($id);

        $relatedProducts = CoffeeProduct::
        where('id_coffee_category', $product->id_coffee_category)
            ->limit(4)
            ->get();

//        dd($product);
        return view('front.shop.show', compact('categories', 'brands', 'product', 'relatedProducts'));
    }

    public function index(Request $request)
    {
        $categories = CoffeeCategory::all();
        $brands = CoffeeBrand::all();

        $perPage = $request->show ?? 3;
        $sortBy = $request->sort_by ?? 'latest';
        $search = $request->search ?? '';

        $products = CoffeeProduct::where('name', 'like', '%' . $search . '%');

        $products = $this->filter($products, $request);
        $products = $this->sortAndPagination($products, $sortBy, $perPage);


//        dd($products->links());
        return view('front.shop.index', compact('categories', 'brands', 'products'));
    }

    public function category($categoryName, Request $request)
    {
        $categories = CoffeeCategory::all();
        $brands = CoffeeBrand::all();

        $perPage = $request->show ?? 3;
        $sortBy = $request->sort_by ?? 'latest';

        $products = CoffeeCategory::where('name', $categoryName)->first()->CoffeeProducts->toQuery();

        $products = $this->filter($products, $request);
        $products = $this->sortAndPagination($products, $sortBy, $perPage);

        return view('front.shop.index', compact('categories', 'brands', 'products'));
    }

    private function sortAndPagination($products, $sortBy, $perPage)
    {
        switch ($sortBy) {
            case 'latest':
                $products = $products->orderBy('id');
                break;
            case 'oldest':
                $products = $products->orderByDesc('id');
                break;
            case 'name-ascending':
                $products = $products->orderBy('name');
                break;
            case 'name-descending':
                $products = $products->orderByDesc('name');
                break;
            case 'price-ascending':
                $products = $products->orderBy('price');
                break;
            case 'price-descending':
                $products = $products->orderByDesc('price');
                break;
            default:
                $products = $products->orderBy('id');
        }

        $products = $products->paginate($perPage);

//        Thêm query trên URL khi sang trang. Cách 1 hoặc 2
//        1. Thêm query chi tiết
//        $products->appends(['sort_by' => $sortBy, 'show' => $perPage]);
//        2.Thêm tất cả query hiện có trên URL
        $products->withQueryString();

        return $products;
    }

    private function filter($products, Request $request)
    {
        $brand_ids = array_keys($request->brand ?? []);

        if ($brand_ids != null) $products = $products->whereIn('id_coffee_brand', $brand_ids);


        $priceMin = str_replace(' 000₫', '', $request->price_min);
        $priceMax = str_replace(' 000₫', '', $request->price_max);

        if ($priceMin != null && $priceMax != null) $products->whereBetween('price', [$priceMin, $priceMax]);

        return $products;
    }
}
