{{-- Search Simple (tanpa filter bulan) --}}
<div class="relative w-full sm:w-64">
    <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400 pointer-events-none"
        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path d="M21 21l-4.35-4.35M11 4a7 7 0 100 14 7 7 0 000-14z" />
    </svg>

    <input type="text"
        wire:model.live.debounce.300ms="{{ $searchModel ?? 'search' }}"
        placeholder="{{ $placeholder ?? 'Cari...' }}"
        class="w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" />
</div>

