@php
$positionClass = $position === 'top' ? 'top-0' : 'bottom-0';
@endphp

<div
    x-data="{
        show: false,
        init() { this.show = !this.getCookie('{{ $cookieName }}'); },
        getCookie(name) { return document.cookie.split('; ').find(row => row.startsWith(name + '='))?.split('=')[1]; },
        setCookie(name, value, days) { document.cookie = `${name}=${value};path=/;max-age=${days * 86400}`; },
        accept() { this.setCookie('{{ $cookieName }}', 'accepted', {{ $cookieExpiry }}); this.show = false; $dispatch('cookie-consent-accepted'); },
        decline() { this.setCookie('{{ $cookieName }}', 'declined', {{ $cookieExpiry }}); this.show = false; $dispatch('cookie-consent-declined'); }
    }"
    x-show="show"
    x-transition
    class="fixed {{ $positionClass }} left-0 right-0 z-50 p-4"
>
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg border border-gray-200 p-4 sm:p-6 flex flex-col sm:flex-row items-center gap-4">
        <p class="text-sm text-gray-600 flex-1">{{ $message }}</p>
        <div class="flex gap-2 flex-shrink-0">
            @if($showDecline)
                <button @click="decline()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                    {{ $declineText }}
                </button>
            @endif
            <button @click="accept()" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
                {{ $acceptText }}
            </button>
        </div>
    </div>
</div>
