<?php

namespace App\Http\Middleware;

use App\models\Setting;
use Closure;

class AdminLanguage
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
        $currentLang = Setting::getSettingByKey('layout_language')->value ?? 'en';
        app()->setLocale($currentLang);

        $isRtl = $currentLang == "ar" ? true : false;
        config()->set('layout.self.rtl',$isRtl) ;
        return $next($request);
    }
}
