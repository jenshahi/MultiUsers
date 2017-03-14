<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EditorMiddleware
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
        if(Auth::user()->isadmin!=0){
            return redirect('/home');
        }
        else if(Auth::user()->isadmin==0 && Auth::user()->roles()->first()->id==2){
            return redirect('/moderator/home');
        }
        else if(Auth::user()->isadmin==0 && Auth::user()->roles()->first()->id==1){
            return redirect('/manager/home');
        }
        return $next($request);
    }
}
