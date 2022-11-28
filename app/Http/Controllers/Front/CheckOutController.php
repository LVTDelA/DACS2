<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Service\Order\OrderServiceInterface;
use App\Service\OrderDetail\OrderDetailServiceInterface;
use App\Utilities\Constant;
use App\Utilities\VNPay;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{
    private $orderService;
    private $orderDetailService;

    public function __construct(OrderServiceInterface       $orderService,
                                OrderDetailServiceInterface $orderDetailService)
    {
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
    }

    public function index()
    {
        $carts = Cart::content();
        $total = Cart::total(0, null, ' ');

        return view('front.checkout.index', compact('carts', 'total'));
    }

    public function addOrder(Request $request)
    {
//        Thêm đơn hàng
        $data = $request->all();
        $data['status'] = Constant::order_status_ReceiveOrder;
        $order = $this->orderService->create($data);

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

            $this->orderDetailService->create($data);
        }

        if ($request->payment_type == 'pay_later') {
//        Send mail
            $total = Cart::total(0, null, ' ');
            $this->sendMail($order, $total);
//        Xóa DL giỏ hàng
            Cart::destroy();

            return redirect('checkout/result')->with('notification', 'Đặt hàng thành công, cám ơn bạn đã lựa chọn chúng tôi. Hãy kiểm tra email của bạn.');
        } else if ($request->payment_type == 'online_payment') {
            $data_url = VNPay::vnpay_create_payment([
                'vnp_TxnRef' => $order->id, //id đơn hàng
                'vnp_OrderInfo' => 'noi dung chuyen khoan', //thông tin thanh toán
                'vnp_Amount' => Cart::total(0, '', '') * 1000 //số tiền
            ]);

            return redirect()->to($data_url);
        }
    }

    public function vnPayCheck(Request $request)
    {
//        Lấy data từ vnPay gửi xuống
        $vnp_ResponseCode = $request->get('vnp_ResponseCode'); // ResponseCode = 00 nếu thanh toán thành công
        $vnp_TxnRef = $request->get('vnp_TxnRef'); // order_id
        $vnp_Amount = $request->get('vnp');

//        Kiểm tra data
        if ($vnp_ResponseCode != null) {
            if ($vnp_ResponseCode == 00) {
//                Cập nhật trạng thái đơn hàng
                $this->orderService->find($vnp_TxnRef)->update(['status' => Constant::order_status_Paid]);
//                Gửi mail
                $order = $this->orderService->find($vnp_TxnRef);
                $total = $vnp_Amount;
                $this->sendMail($order, $total);

//                Xóa giỏ hàng
                Cart::destroy();

//                Thông báo kết quả
                return redirect('checkout/result')
                    ->with('notification', 'Đặt hàng và thanh toán thành công, cám ơn bạn đã lựa chọn chúng tôi. Hãy kiểm tra email của bạn.');
            } else {
//                Xóa đơn hàng đã lưu vào DB

                $this->orderDetailService->deleteAllOrderDetailByIdOrder($vnp_TxnRef);
                $this->orderService->find($vnp_TxnRef)->delete();

//                Thông báo kết quả
                return redirect('checkout/result')->with('notification', 'Thanh toán thất bại. Hãy thử lại.');
            }
        }

    }

    public function result()
    {
        $notification = session('notification');

        return view('front.checkout.result', compact('notification'));
    }

    private function sendMail($order, $total)
    {
        $email_to = $order->email;

        Mail::send('front.checkout.email', compact('order', 'total'), function ($message) use ($email_to) {
            $message->from('votheluc02@gmail.com', 'VKU_COFFEE');
            $message->to($email_to, $email_to);
            $message->subject('Thông tin đơn hàng');

        });
    }
}
