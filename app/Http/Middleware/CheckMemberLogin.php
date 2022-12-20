<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckMemberLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //Nếu ta sử dụng Authentication của Laravel, ta sẽ có sẵn 2 middleware là guest và auth.
        if (Auth::guest()) {
            return redirect()->guest('account/login')->with('notification', 'Bạn cần đăng nhập trước khi tiếp tục');
        }

        return $next($request);
    }
}
