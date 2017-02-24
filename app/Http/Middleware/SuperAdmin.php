<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
class SuperAdmin
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
        if (auth()->check()&&$request->user()->permission == "Admin" )
        {
            return $next($request);
        }
       return redirect()->guest('/error');

    }
}