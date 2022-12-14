<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Service\Order\OrderServiceInterface;
use App\Service\User\UserServiceInterface;
use App\Utilities\Common;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class AccountController extends Controller
{
    private $orderService;
    private $userService;

    public function __construct(OrderServiceInterface $orderService,
        UserServiceInterface $userService)
    {
        $this->orderService = $orderService;
        $this->userService = $userService;
    }

    public function login() {
        return view('front.account.login');
    }

    public function checkLogin(Request $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => Constant::user_level_client //khách hàng
        ];

        $remember = $request->remember; //remember là 1 token

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended(); // Trả về trang trước khi Middleware bắt lại
        } else {
            return back()->with('notification', 'Lỗi! Email hoặc mật khẩu không chính xác.');
        }
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
//      $orders = $this->orderService->where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        $orders = $this->orderService->getOrdersByUser(Auth::id())->orderBy('id', 'desc')->get();;  //desc là giảm dần //asc là tăng dân


        return view('front.account.my-order.index', compact('orders'));
    }

    public function myOrderShow($id) {
        $order = $this->orderService->find($id);

        return view('front.account.my-order.show', compact('order'));
    }

    public function getUser(Request $request)
    {
        $user = Auth::user();

        return view('front.user.index', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
//        dd($user);
        $data = $request->all();

        //Chống người dùng thay đổi level
        unset($data['level']);

        // Xu li password
        if ($request->get('password') != null) {
            if ($request->get('password') != $request->get('password_confirmation')) {
                return back()
                    ->with('notification', 'Error: Confirm password does not match');
            }

//            dd([$user->getAuthPassword(), bcrypt($request->oldPassword)]);


            if (! Hash::check($request->oldPassword, $user->getAuthPassword())) {
                return back()->with(['notification' => 'Mật khẩu cũ không đúng!']);
            }

            $data['password'] = bcrypt($request->get('password'));
        } else {
            unset($data['password']);
        }

        // Xu li file anh
        if ($request->hasFile('image')) {
            //add new img
            $data['avatar'] = Common::uploadFile($request->file('image'), 'admin/assets/images/avatars');
            //xoa file cu
            $file_name_old = $request->get('image_old');
            if ($file_name_old != '') {
                unlink('admin/assets/images/avatars/' . $file_name_old);
            }
        }

        // Update Data
        $this->userService->update($data, $user->id);

        return redirect('account/user/')->with(['notification' => 'Cập nhật thành công!']);
    }
}
