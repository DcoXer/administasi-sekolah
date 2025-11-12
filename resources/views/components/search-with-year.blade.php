{{-- Search --}}
<div class="relative w-full sm:w-64">
    <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400 pointer-events-none"
        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path d="M21 21l-4.35-4.35M11 4a7 7 0 100 14 7 7 0 000-14z" />
    </svg>

    <input type="text"
        wire:model.live.debounce.300ms="{{ $searchModel ?? 'search' }}"
        placeholder="{{ $placeholder ?? 'Cari...' }}"
        class="w-full pl-10 pr-3 py-2 rounded-lg 
                   bg-white border border-gray-300 
                   text-gray-900 placeholder-gray-400
                   focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent
                   transition-all duration-300" />
</div>

<!-- Bagian Filter Bulan -->
<div class="flex flex-col sm:flex-row sm:items-center sm:space-x-3">
    <div class="w-full sm:w-48">
        <select wire:model.live="bulan"
            class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm shadow-sm
                   focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-200 ease-in-out">
            <option value="">Semua Bulan</option>
            @foreach ([
            'Januari','Februari','Maret','April','Mei','Juni',
            'Juli','Agustus','September','Oktober','November','Desember'
            ] as $bulan)
            <option value="{{ $bulan }}"
                class="py-2 hover:bg-gray-100 cursor-pointer">
                {{ $bulan }}
            </option>
            @endforeach
        </select>
    </div>
</div>