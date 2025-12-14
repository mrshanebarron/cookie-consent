<?php

namespace MrShaneBarron\CookieConsent\Livewire;

use Livewire\Component;

class CookieConsent extends Component
{
    public bool $show = true;
    public string $position = 'bottom';
    public string $title = 'Cookie Consent';
    public string $message = 'We use cookies to enhance your experience. By continuing to visit this site you agree to our use of cookies.';
    public string $acceptText = 'Accept';
    public string $declineText = 'Decline';
    public ?string $policyUrl = null;
    public bool $showDecline = true;

    public function mount(
        string $position = 'bottom',
        string $title = 'Cookie Consent',
        string $message = 'We use cookies to enhance your experience. By continuing to visit this site you agree to our use of cookies.',
        string $acceptText = 'Accept',
        string $declineText = 'Decline',
        ?string $policyUrl = null,
        bool $showDecline = true
    ): void {
        $this->position = $position;
        $this->title = $title;
        $this->message = $message;
        $this->acceptText = $acceptText;
        $this->declineText = $declineText;
        $this->policyUrl = $policyUrl;
        $this->showDecline = $showDecline;
    }

    public function accept(): void
    {
        $this->show = false;
        $this->dispatch('cookies-accepted');
    }

    public function decline(): void
    {
        $this->show = false;
        $this->dispatch('cookies-declined');
    }

    public function render()
    {
        return view('ld-cookie-consent::livewire.cookie-consent');
    }
}
