{{-- Search --}}
<div class="relative w-full sm:w-64">
    <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400 pointer-events-none"
        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path d="M21 21l-4.35-4.35M11 4a7 7 0 100 14 7 7 0 000-14z" />
    </svg>

    <input type="text"
        wire:model.live.debounce.300ms="{{ $searchModel ?? 'search' }}"
        placeholder="{{ $placeholder ?? 'Cari...' }}"
<<<<<<< HEAD
        class="w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" />
</div>

{{-- Filter Bulan (hanya untuk staff_keuangan) --}}
@if(Auth::check() && Auth::user()->role === 'staff_keuangan')
<div class="flex flex-col sm:flex-row sm:items-center sm:space-x-3">
    <div class="w-full sm:w-48">
        <select wire:model.live="bulan"
            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
=======
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
>>>>>>> 7881684e027466948b9fc35eb8f243bc2c31e810
            <option value="">Semua Bulan</option>
            @foreach ([
            'Januari','Februari','Maret','April','Mei','Juni',
            'Juli','Agustus','September','Oktober','November','Desember'
            ] as $bulan)
<<<<<<< HEAD
            <option value="{{ $bulan }}">
=======
            <option value="{{ $bulan }}"
                class="py-2 hover:bg-gray-100 cursor-pointer">
>>>>>>> 7881684e027466948b9fc35eb8f243bc2c31e810
                {{ $bulan }}
            </option>
            @endforeach
        </select>
    </div>
<<<<<<< HEAD
</div>
@endif
=======
</div>
>>>>>>> 7881684e027466948b9fc35eb8f243bc2c31e810
