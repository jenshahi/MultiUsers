<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if(Auth::user()->isadmin!=1 && Auth::user()->roles()->first()->id==1){
            return redirect('/manager/home');
        }

        else if(Auth::user()->isadmin!=1 && Auth::user()->roles()->first()->id==2){
            return redirect('/moderator/home');
        }

        else if(Auth::user()->isadmin!=1 && Auth::user()->roles()->first()->id==3){
            return redirect('/editor/home');
        }
        return $next($request);
    }
}
