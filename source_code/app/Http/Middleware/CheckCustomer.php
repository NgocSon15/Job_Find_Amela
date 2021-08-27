<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = session()->get('user');
        if($user->role == 'customer'){
            return $next($request);
        }else{
            return abort('403', __('đăng nhập lại bằng tài khoản customer'));
        }
    }
}
