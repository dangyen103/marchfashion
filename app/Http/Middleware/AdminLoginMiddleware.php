<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class AdminLoginMiddleware
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
        if(Auth::check())
        {
            if(Auth::user()->level == 1 && Auth::user()->adminitrator->status == 1)
            {
                return $next($request);
            }
            else
            {
                return redirect('admin/login')->with('alert-danger', 'Bạn không có quyền truy cập quản trị');
            }
        }
        else
        {
            return redirect('admin/login');
        }
    }
}
