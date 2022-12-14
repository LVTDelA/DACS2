<?php

namespace App\Http\Controllers\Admin;

use App\Utilities\Constant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function getLogin(){
        return view('admin.login');
    }

    public function postLogin(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => [Constant::user_level_host, Constant::user_level_admin],
        ];

        $remember = $request->remember;

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended('admin/user'); // Trả về trang trước khi Middleware bắt lại
        } else {
            return back()->with('notification', 'Lỗi! Email hoặc mật khẩu không chính xác.');
        }
    }

    public function logout() {
        Auth::logout();

        return redirect('admin/login');
    }
}
