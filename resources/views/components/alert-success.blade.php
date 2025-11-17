@props(['message' => null])

@if(session('success') || isset($message))
<div 
    x-data="{ show: true }" 
    x-show="show" 
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-2"
    x-init="setTimeout(() => show = false, 5000)"
    class="fixed top-20 left-1/2 transform -translate-x-1/2 z-50 max-w-md w-full mx-4 bg-white border-l-4 border-green-500 rounded-lg shadow-lg p-4 flex items-start space-x-3"
    role="alert"
>
    <div class="flex-shrink-0">
        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
        </div>
    </div>
    <div class="flex-1">
        <p class="text-sm font-semibold text-gray-800">Berhasil!</p>
        <p class="text-sm text-gray-600 mt-0.5">{{ $message ?? session('success') }}</p>
    </div>
    <button @click="show = false" class="flex-shrink-0 text-gray-400 hover:text-gray-600 focus:outline-none transition">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>
@endif
