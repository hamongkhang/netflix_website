<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user() && Auth::user()->level==1) {
            return $next($request);
        } else {
            session()->forget('username_minmovies');
            Auth::logout();
            return redirect()->route('admin.getLogin')->with(['thongbao_level' => 'danger', 'thongbao_admin' => "<b>Bạn không có quyền truy cập vào trang dành cho quản trị viên!</b>"]);
        }
    }
}
