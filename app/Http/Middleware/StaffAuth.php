<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffAuth
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
        if (!session()->has('loginId')) {
            return redirect('/');
        }
        return $next($request);
    }
}
