<?php

namespace App\Http\Middleware;

use Closure;

class ManagerMiddleware
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
       if (auth()->check()&&$request->user()->permission == "Admin" || auth()->check()&&$request->user()->permission == "manager")
        {
            return $next($request);
        }
       return redirect()->guest('/error');
    }
}
