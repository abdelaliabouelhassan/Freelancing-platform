<?php

namespace App\Http\Middleware;

use Closure;

class localization
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
        if(\session()->has('long')){
            \Illuminate\Support\Facades\App::setLocale(session()->get('long'));
        }else{
            \Illuminate\Support\Facades\App::setLocale('ar');
        }
        return $next($request);
    }
}
