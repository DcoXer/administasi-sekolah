<div
    x-data="{ show: true }"
    x-show="show"
    x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="opacity-0 -translate-y-5"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-500"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-5"
    class="fixed top-4 right-4 z-50 w-80 bg-red-100 border border-red-300 text-red-800 rounded shadow-lg p-4 flex justify-between items-start">
    <div class="flex-1">
        <strong class="block font-semibold">Gagal!</strong>
        <span>{{ $message }}</span>
    </div>
    <button @click="show=false" class="ml-2 text-red-700 hover:text-red-900">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
    </button>
</div>