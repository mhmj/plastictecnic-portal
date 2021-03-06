<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ITStaff
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
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if(Auth::check()) {
            if(Auth::user()->role_id == 3) {
                return $next($request);
            }
            else
            {
                return redirect('/dashboard');
            }
        }
    }
}
