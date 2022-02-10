<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Guest
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
        if (Auth::check() && Auth::user()->role == 'guest') {
            return redirect('/guest');
        } elseif (Auth::check() && Auth::user()->role == 'member') {
            return redirect('/member');
        } elseif (Auth::check() && Auth::user()->role == 'admin') {
            return redirect('/admin');
        } else {
            return $next($request);
        }
    }
}
