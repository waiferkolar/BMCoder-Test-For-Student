<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Aware
{

    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->roles->pluck("id")[0] == 1) {
                return $next($request);
            } else {
                return redirect("/");
            }
        } else {
            return redirect("/login");
        }
    }
}
