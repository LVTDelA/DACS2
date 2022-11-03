<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

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

        if ($request->payment_type == 'pay_later') {
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

//        Send mail
            $total = Cart::total(0, null, ' ');
            $this->sendMail($order, $total);
//        Xóa DL giỏ hàng
            Cart::destroy();

            return 'OK!!';
        } else {

        }
    }

    private function sendMail($order, $total) {
        $email_to = $order->email;

        Mail::send('front.checkout.email', compact('order', 'total'), function ($message) use ($email_to) {
            $message->from('votheluc02@gmail.com', 'VKU_COFFEE');
            $message->to($email_to, $email_to);
            $message->subject('Thông tin đơn hàng');

        });
    }
}
