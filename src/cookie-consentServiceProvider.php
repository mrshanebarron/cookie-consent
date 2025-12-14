<?php

namespace MrShaneBarron\cookie-consent;

use Illuminate\Support\ServiceProvider;
use MrShaneBarron\cookie-consent\Livewire\cookie-consent;
use MrShaneBarron\cookie-consent\View\Components\cookie-consent as Bladecookie-consent;
use Livewire\Livewire;

class cookie-consentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/ld-cookie-consent.php', 'ld-cookie-consent');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ld-cookie-consent');

        Livewire::component('ld-cookie-consent', cookie-consent::class);

        $this->loadViewComponentsAs('ld', [
            Bladecookie-consent::class,
        ]);

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/ld-cookie-consent.php' => config_path('ld-cookie-consent.php'),
            ], 'ld-cookie-consent-config');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/ld-cookie-consent'),
            ], 'ld-cookie-consent-views');
        }
    }
}
