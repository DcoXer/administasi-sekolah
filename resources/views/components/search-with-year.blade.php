{{-- Search --}}
<div class="relative w-full sm:w-64">
    <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400 pointer-events-none"
        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path d="M21 21l-4.35-4.35M11 4a7 7 0 100 14 7 7 0 000-14z" />
    </svg>

    <input type="text"
        wire:model.live.debounce.300ms="{{ $searchModel ?? 'search' }}"
        placeholder="{{ $placeholder ?? 'Cari...' }}"
        class="w-full pl-10 pr-3 py-2 rounded-xl 
                   bg-transparent border border-white/30 
                   backdrop-blur-md 
                   text-gray-900 placeholder-gray-400
                   focus:outline-none focus:ring-none focus:border-none
                   transition-all duration-300" />
</div>

{{-- Tahun Ajaran --}}
<div class="flex items-center gap-2 text-sm font-medium text-gray-700">
    <svg xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
        fill="currentColor"
        class="w-5 h-5 text-blue-600">
        <path fill-rule="evenodd"
            d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z"
            clip-rule="evenodd" />
    </svg>
    <span>Tahun Ajaran: {{ date('Y') }}/{{ date('Y')+1 }}</span>
</div>