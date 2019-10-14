<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Author
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
        //return $next($request);
        if (Auth::check() && Auth::user()->role == 1) {
            return redirect()->route('superadmin');
        }
        elseif (Auth::check() && Auth::user()->role == 2) {
            return redirect()->route('admin');
        }
        elseif (Auth::check() && Auth::user()->role == 3) {
            return $next($request);
        }
        else {
            return redirect()->route('login');
        }
    }
}
