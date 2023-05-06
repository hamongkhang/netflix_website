<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
        if (session('username_minmovies')) {
            return $next($request);
        } else
            return redirect()->route('user.index')->with(['thongbao_level' => 'danger', 'thongbao' => "Bạn vui lòng <b>Đăng nhập</b> để truy cập trang đích!"]);;
    }
}
