@props(['message'])

<div 
    x-data="{ show: true }" 
    x-show="show" 
    x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="-translate-y-full opacity-0"
    x-transition:enter-end="translate-y-0 opacity-100"
    x-transition:leave="transition ease-in duration-500"
    x-transition:leave-start="translate-y-0 opacity-100"
    x-transition:leave-end="-translate-y-full opacity-0"
    x-init="setTimeout(() => show = false, 4000)"
    class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg flex items-center space-x-2"
    role="alert"
>
    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
        viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M5 13l4 4L19 7" />
    </svg>
    <span class="text-sm font-medium">{{ $message }}</span>
    <button @click="show = false" class="ml-4 focus:outline-none">
        <svg class="w-5 h-5 text-white" fill="currentColor"
            viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd" />
        </svg>
    </button>
</div>
