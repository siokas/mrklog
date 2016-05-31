<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Auth;

class ResendConfirmationCode
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
        if (!Auth::user()) return redirect('/');
        else if(Auth::user()->confirmed) return redirect('/');
        
        return $next($request);
    }
}
