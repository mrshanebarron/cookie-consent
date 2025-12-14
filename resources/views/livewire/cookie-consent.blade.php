<div
    x-data="{ show: @entangle('show') }"
    x-show="show"
    x-transition
    @class([
        'fixed left-0 right-0 z-50 p-4',
        'bottom-0' => $position === 'bottom',
        'top-0' => $position === 'top',
    ])
>
    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-xl border p-6">
        <div class="flex flex-col md:flex-row md:items-center gap-4">
            <div class="flex-1">
                <h3 class="font-semibold text-gray-900 mb-1">{{ $title }}</h3>
                <p class="text-sm text-gray-600">
                    {{ $message }}
                    @if($policyUrl)
                        <a href="{{ $policyUrl }}" class="text-blue-500 hover:underline">Learn more</a>
                    @endif
                </p>
            </div>
            <div class="flex items-center gap-3">
                @if($showDecline)
                    <button
                        wire:click="decline"
                        class="px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg transition-colors"
                    >
                        {{ $declineText }}
                    </button>
                @endif
                <button
                    wire:click="accept"
                    class="px-4 py-2 text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 rounded-lg transition-colors"
                >
                    {{ $acceptText }}
                </button>
            </div>
        </div>
    </div>
</div>
