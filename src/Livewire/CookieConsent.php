<?php

namespace MrShaneBarron\CookieConsent\Livewire;

use Livewire\Component;

class CookieConsent extends Component
{
    public string $message = 'We use cookies to enhance your experience. By continuing to visit this site you agree to our use of cookies.';
    public string $acceptText = 'Accept';
    public string $declineText = 'Decline';
    public bool $showDecline = true;
    public string $position = 'bottom';
    public string $cookieName = 'cookie_consent';
    public int $cookieExpiry = 365;

    public function mount(string $message = null, string $acceptText = 'Accept', string $declineText = 'Decline', bool $showDecline = true, string $position = 'bottom', string $cookieName = 'cookie_consent', int $cookieExpiry = 365): void
    {
        $this->message = $message ?? $this->message;
        $this->acceptText = $acceptText;
        $this->declineText = $declineText;
        $this->showDecline = $showDecline;
        $this->position = $position;
        $this->cookieName = $cookieName;
        $this->cookieExpiry = $cookieExpiry;
    }

    public function render()
    {
        return view('ld-cookie-consent::livewire.cookie-consent');
    }
}
