<?php

namespace App\Http\Middleware;

use illuminate\support\Facades\Auth;
use Closure;

class isAdmin
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
        if(auth::user() && auth::user()->nama == 'FahriGanteng'){
            return $next($request);
        }
        return redirect('/');
    }
}
