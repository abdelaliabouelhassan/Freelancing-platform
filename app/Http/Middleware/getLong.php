<?php

namespace App\Http\Middleware;

use App\Settings;
use Closure;
use Illuminate\Support\Facades\App;

class getLong
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
        $user_id = auth('api')->id();
     $setting =    Settings::where('user_id',$user_id)->first();
if($setting){
    if($setting->long){
        App::setLocale($setting->long);
    }else{
        App::setLocale('ar');
    }
}else{
    App::setLocale('ar');
}

        return $next($request);

}

}
