<?php

namespace MrShaneBarron\CookieConsent;

use Illuminate\Support\ServiceProvider;
use MrShaneBarron\CookieConsent\Livewire\CookieConsent;
use MrShaneBarron\CookieConsent\View\Components\CookieConsent as BladeCookieConsent;

class CookieConsentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/sb-cookie-consent.php', 'sb-cookie-consent');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'sb-cookie-consent');

        if (class_exists(\Livewire\Livewire::class)) {
            \Livewire\Livewire::component('sb-cookie-consent', CookieConsent::class);
        }

        $this->loadViewComponentsAs('ld', [
            BladeCookieConsent::class,
        ]);

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/sb-cookie-consent.php' => config_path('sb-cookie-consent.php'),
            ], 'sb-cookie-consent-config');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/sb-cookie-consent'),
            ], 'sb-cookie-consent-views');
        }
    }
}
