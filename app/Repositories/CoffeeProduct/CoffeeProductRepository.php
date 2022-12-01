<?php

namespace App\Repositories\CoffeeProduct;

use App\Models\CoffeeCategory;
use App\Models\CoffeeProduct;
use App\Repositories\BaseRepositories;
use Illuminate\Http\Request;

class CoffeeProductRepository extends BaseRepositories implements CoffeeProductRepositoryInterface
{

    public function getModel()
    {
        return CoffeeProduct::class;
    }

    public function getRelatedProducts($product, $limit = 4)
    {
        return $this->model->where('id_coffee_category', $product->id_coffee_category)
            ->limit($limit)
            ->get();
    }

    public function getFeaturedProductsByCategory(int $categoryId)
    {
        return $this->model->where('id_coffee_category', $categoryId)->get();
    }

    public function getProductOnIndex($request)
    {
        $search = $request->search ?? '';

        $products = $this->model->where('name', 'like', '%' . $search . '%');
        $products = $this->filter($products, $request);
        $products = $this->sortAndPagination($products, $request);

        return $products;
    }

    public function getProductsByCategory($categoryName, $request) {
//        $products = CoffeeCategory::where('name', $categoryName)->first()->CoffeeProducts->toQuery();
        $products = CoffeeCategory::where('name', $categoryName)->first()->CoffeeProducts();

        $products = $this->filter($products, $request);
        $products = $this->sortAndPagination($products, $request);

        return $products;
    }

    private function sortAndPagination($products, Request $request) {
        $perPage = $request->show ?? 6;
        $sortBy = $request->sort_by ?? 'latest';

        switch ($sortBy) {
            case 'latest':
                $products = $products->orderByDesc('id');
                break;
            case 'oldest':
                $products = $products->orderBy('id');
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
