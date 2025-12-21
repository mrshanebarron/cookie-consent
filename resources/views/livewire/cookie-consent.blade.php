@php
$positionStyle = $this->position === 'top' ? 'top: 0;' : 'bottom: 0;';
@endphp

<div
    x-data="{
        show: false,
        init() { this.show = !this.getCookie('{{ $this->cookieName }}'); },
        getCookie(name) { return document.cookie.split('; ').find(row => row.startsWith(name + '='))?.split('=')[1]; },
        setCookie(name, value, days) { document.cookie = `${name}=${value};path=/;max-age=${days * 86400}`; },
        accept() { this.setCookie('{{ $this->cookieName }}', 'accepted', {{ $this->cookieExpiry }}); this.show = false; $dispatch('cookie-consent-accepted'); },
        decline() { this.setCookie('{{ $this->cookieName }}', 'declined', {{ $this->cookieExpiry }}); this.show = false; $dispatch('cookie-consent-declined'); }
    }"
    x-show="show"
    x-transition
    style="position: fixed; {{ $positionStyle }} left: 0; right: 0; z-index: 50; padding: 16px;"
>
    <div style="max-width: 56rem; margin: 0 auto; background: white; border-radius: 8px; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1); border: 1px solid #e5e7eb; padding: 16px 24px; display: flex; flex-wrap: wrap; align-items: center; gap: 16px;">
        <p style="font-size: 14px; color: #4b5563; flex: 1; margin: 0;">{{ $this->message }}</p>
        <div style="display: flex; gap: 8px; flex-shrink: 0;">
            @if($this->showDecline)
                <button @click="decline()" style="padding: 8px 16px; font-size: 14px; font-weight: 500; color: #374151; background: white; border: 1px solid #d1d5db; border-radius: 8px; cursor: pointer; transition: background 0.15s;" onmouseover="this.style.background='#f9fafb'" onmouseout="this.style.background='white'">
                    {{ $this->declineText }}
                </button>
            @endif
            <button @click="accept()" style="padding: 8px 16px; font-size: 14px; font-weight: 500; color: white; background: #2563eb; border: none; border-radius: 8px; cursor: pointer; transition: background 0.15s;" onmouseover="this.style.background='#1d4ed8'" onmouseout="this.style.background='#2563eb'">
                {{ $this->acceptText }}
            </button>
        </div>
    </div>
</div>
