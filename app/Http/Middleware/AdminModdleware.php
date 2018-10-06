<?php

namespace gestion\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class AdminModdleware
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
        if(Auth::check() && Auth::user()->id_cargo==1){
            return $next($request);
        }
        return redirect('gestion/contenido');
        
    }
}
