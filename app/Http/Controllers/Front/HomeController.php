<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CoffeeProduct;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index() {
        $product1s = CoffeeProduct::where('id_coffee_category', 1)->get();
        $product2s = CoffeeProduct::where('id_coffee_category', 2)->get();
        $product3s = CoffeeProduct::where('id_coffee_category', 3)->get();

        $blogs = Blog::orderBy('id', 'desc')->limit(3)->get();

        // dd($products2);
        return view('front.index', compact('product1s', 'product2s', 'product3s','blogs'));
    }
}
