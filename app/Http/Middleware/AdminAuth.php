<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\User;

class AdminAuth
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
        if (Auth::check() && Auth::user()->role == User::ROLE['teacher']) {
            return $next($request);
        } else {
            return redirect()->route('home');
        }
    }
}
