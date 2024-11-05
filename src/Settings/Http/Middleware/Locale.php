<?php

namespace A2insights\FilamentSaas\Settings\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class Locale
{
    public function handle(Request $request, Closure $next): Response
    {
        $userSettings = $request->user()?->settings;

        $settings = Cache::remember('filament-saas.settings', now()->addHours(10), fn () => app(\A2insights\FilamentSaas\Settings\Settings::class));

        $locale = $userSettings?->locale ?? $settings->locale;

        if ($locale) {
            Config::set('app.locale', $locale);
            App::setLocale($locale);
            \Locale::setDefault($locale);
        }

        return $next($request);
    }
}
