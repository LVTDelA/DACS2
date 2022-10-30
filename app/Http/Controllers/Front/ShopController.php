<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CoffeeCategory;
use App\Models\CoffeeProduct;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //
    public function show($id)
    {
        $product = CoffeeProduct::findOrfail($id);

        $relatedProducts = CoffeeProduct::
        where('id_coffee_category', $product->id_coffee_category)
            ->limit(4)
            ->get();

//        dd($product);
        return view('front.shop.show', compact('product', 'relatedProducts'));
    }

    public function index(Request $request)
    {
        $categories = CoffeeCategory::all();

        $perPage = $request->show ?? 3;
        $sortBy = $request->sort_by ?? 'latest';
        $search = $request->search ?? '';

        $products = CoffeeProduct::where('name', 'like', '%' . $search . '%');
        $products = $this->sortAndPagination($products, $sortBy, $perPage);


//        dd($products->links());
        return view('front.shop.index', compact('categories','products'));
    }

    public function category() {

    }

    private function sortAndPagination($products, $sortBy, $perPage) {
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

        $products->appends(['sort_by' => $sortBy, 'show' => $perPage]);

        return $products;
    }
}
