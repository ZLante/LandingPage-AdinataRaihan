<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $language = $request->user()?->language ?? session('language', config('app.locale', 'en'));
        $supported = ['id', 'en', 'ms', 'zh'];

        if (in_array($language, $supported, true)) {
            app()->setLocale($language);
            session(['language' => $language]);
        }

        return $next($request);
    }
}
