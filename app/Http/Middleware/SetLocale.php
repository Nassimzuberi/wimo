<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Session;

class SetLocale
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

        if (!Session::has('locale'))
        {
            Session::put('locale',config('app.locale'));
        }
        if(session('locale') == App::getLocale()){
            return $next($request);
        }
        App::setLocale(session('locale'));
        return $next($request);
    }
}
