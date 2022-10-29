<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CoffeeProduct;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //
    public function show($id) {
        $product = CoffeeProduct::findOrfail($id);

//        dd($product);
        return view('front.shop.show', compact('product'));
    }
}
