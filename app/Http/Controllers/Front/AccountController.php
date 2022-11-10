<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Service\User\UserServiceInterface;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    private $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function login() {
        return view('front.account.login');
    }

    public function checkLogin(Request $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 2 //khách hàng
        ];

        $remember = $request->remember;

        if (Auth::attempt($credentials, $remember)) {
            return redirect('/');
        } else {
            return back()->with('notification', 'Lỗi! Email hoặc mật khẩu không chính xác.');
        };
    }

    public function logout() {
        Auth::logout();

        return back();
    }

    public function register() {
        return view('front.account.register');
    }

    public function postRegister(Request $request) {
        if ($request->password != $request->password_confirmation) {
            return back()->with('notification', 'Các mật khẩu đã nhập không khớp. Hãy thử lại.');
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => Constant::user_level_client, //Khách hàng bình thường
        ];

        $this->userService->create($data);

        return redirect('account/login')->with('notification', 'Đăng ký thành công, hãy đăng nhập lại.');
    }

    public function myOrderIndex() {
        $orders = Order::where('user_id', Auth::id())->get();
//        dd($orders[0]->orderDetails[0]->coffeeProduct->coffeeImages[0]->path);
        return view('front.account.my-order.index', compact('orders'));
    }
}
