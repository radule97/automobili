<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        $user = Auth::user();
        if(!isset($user) || $user == false){
            return redirect()->back();
        }
        if(!$user->isAdmin()){
            return redirect()->back();
        }
        return $next($request);


    }
}
