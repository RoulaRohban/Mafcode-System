<?php

namespace App\Http\Middleware;

use Closure;

class ApiLanguage
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
        if($request->is('api/*') && $request->has('lang') && $request->lang == "en")
        {
            app()->setLocale('en');
        }
        return $next($request);
    }
}
