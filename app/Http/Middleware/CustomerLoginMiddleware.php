<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class CustomerLoginMiddleware
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
            if(Auth::user()->level == 0)
            {
                return $next($request);
            }
            else
            {
                return redirect('login');
            }
        }
        else
        {
            return redirect('login');
        }
    }
}
