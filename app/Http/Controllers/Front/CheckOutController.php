<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    //
    public function index()
    {
        $carts = Cart::content();
        $total = Cart::total(0, null, ' ');

        return view('front.checkout.index', compact('carts', 'total'));
    }

    public function addOrder(Request $request) {
//        Thêm đơn hàng
        $order = Order::create($request->all());

//        Thêm CT đơn hàng
        $carts = Cart::content();

        foreach ($carts as $cart) {
            $data = [
                'id_order' => $order->id,
                'id_product' => $cart->id,
                'qty' => $cart->qty,
                'amount' => $cart->price,
                'total' => $cart->price * $cart->qty,

            ];

            OrderDetail::create($data);
        }

//        Xóa DL giỏ hàng
        Cart::destroy();

        return 'OK!!';
    }
}
