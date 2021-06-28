<?php

namespace App\Http\Middleware;

use Closure;

class Setlanguage
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
        if (request()->segment(1) == 'en') {
            $language = 'en';
        } else {
            $language = 'vi';
        }
        if(!request()->segment(1)){
            \App::setLocale('en');
        } else {
            \App::setLocale($language);
        }
        return $next($request);
    }
}
