<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CreateSessionIfNotExisting
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
        if(!Session::has('cart')){
            Session::put('cart',[]);
        }

        return $next($request);
    }
}
