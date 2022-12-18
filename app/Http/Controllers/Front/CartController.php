<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CoffeeProduct;
use App\Service\CoffeeProduct\CoffeeProductServiceInterface;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    private $productService;

    public function __construct(CoffeeProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function add(Request $request)
    {
        if ($request->ajax()) {
            $product = $this->productService->find($request->productId);
            $qty = $request->qty;

            $response['cart'] = Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $qty,
                'price' => $product->discount ?? $product->price,
                'weight' => $product->weight ?? 0,
                'options' => [
                    'images' => $product->CoffeeImages,
                ],
            ]);


            $response['count'] = Cart::count();
            $response['total'] = Cart::total(0, '', ' ');

            return $response;
        }

        return back();
    }

    public function index()
    {
        $carts = Cart::content();
//        $subtotal = Cart::subtotal();
        $total = Cart::total(0, null, ' ');

        return view('front.shop.cart', compact('carts', 'total'));
    }

    public function delete(Request $request)
    {
        if ($request->ajax()) {
            Cart::remove($request->rowId);

            $response['count'] = Cart::count();
            $response['total'] = Cart::total(0, '', ' ');
//            dd($response);
            return $response;
        }

        return back();
    }

    public function destroy()
    {
        Cart::destroy();

        return back();
    }

    public function update(Request $request)
    {
        if ($request->ajax()) {
            $response['cart'] = Cart::update($request->rowId, $request->qty);

            $response['total'] = Cart::total(0, '', ' ');

            return $response;
        }

        return back();
    }
}
