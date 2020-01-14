<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
        $deng=session('deng1');
        //dd($deng);
        if(!$deng){
           return redirect('/create');
        }
        return $next($request);
    }
}
