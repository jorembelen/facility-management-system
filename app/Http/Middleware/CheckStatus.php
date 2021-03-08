<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check() && auth()->User()->status == 0){
            // Auth::logout();
            Auth::guard('web')->logout();
             return redirect()->to('/login')->with('warning', 'Your session has expired because your status change.');
        }
        return $next($request); 
    }
}
