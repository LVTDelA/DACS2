<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CoffeeProduct;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    //
    public function add($id) {
        $product = CoffeeProduct::findOrFail($id);

        Cart::add([
            'id' => $id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->discount ?? $product->price,
            'weight'=> $product->weight ?? 0,
            'options' => [
                'images' => $product->CoffeeImages,
            ],
        ]);

        return back();
    }

    public function index() {
        $carts = Cart::content();
//        $subtotal = Cart::subtotal();
        $total = Cart::total();

        return view('front.shop.cart', compact('carts', 'total'));
    }

    public function delete($rowId) {
        Cart::remove($rowId);

        return back();
    }

    public function destroy() {
        Cart::destroy();

        return back();
    }

    public function update(Request $request) {
        Cart::update($request->rowId, $request->qty);

        return ['qty' => $request->qty, 'total' => Cart::total()];
    }
}
