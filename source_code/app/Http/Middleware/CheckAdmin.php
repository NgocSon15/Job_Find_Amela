<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdmin
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
        if(!$request->session()->has('user') || $request->session()->get('user')->role != 'admin')
        {
            return abort('403', __('Bạn không có quyền thực hiện thao tác này'));
        }

        return $next($request);
    }
}
