<?php

namespace MrShaneBarron\CookieConsent;

use Illuminate\Support\ServiceProvider;

class CookieConsentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if (class_exists(\Livewire\Livewire::class)) {
            \Livewire\Livewire::component('sb-cookie-consent', Livewire\CookieConsent::class);
        }
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'sb-cookie-consent');
    }
}
