<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">

    {{-- Left side: Toolbar actions --}}
    <div class="flex flex-wrap items-center gap-3">
        <a href="{{ $createRoute ?? '#' }}"
            class="inline-flex items-center justify-center px-4 py-2.5 bg-blue-600 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 active:bg-blue-800 transition-all duration-200 shadow-sm hover:shadow gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M12 4v16m8-8H4" />
            </svg>
            Tambah
        </a>

        <a href="{{ $exportRoute ?? '#' }}"
            class="inline-flex items-center justify-center px-4 py-2.5 bg-green-600 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 active:bg-green-800 transition-all duration-200 shadow-sm hover:shadow gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
            </svg>
            Export
        </a>

        <form action="{{ $importRoute ?? '#' }}" method="POST" enctype="multipart/form-data" class="inline-block">
            @csrf
            <input type="file" name="file" id="importFile" class="hidden" onchange="this.form.submit()" accept=".xlsx,.xls,.csv" required>
            <button type="button"
                onclick="document.getElementById('importFile').click()"
                class="inline-flex items-center justify-center px-4 py-2.5 bg-purple-600 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 active:bg-purple-800 transition-all duration-200 shadow-sm hover:shadow gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                </svg>
                Import
            </button>
        </form>
    </div>

    {{-- Right side: Search --}}
    <div class="flex items-center gap-4 w-full sm:w-auto">
<<<<<<< HEAD
        {{-- Search (dengan filter bulan hanya untuk staff_keuangan) --}}
        @if(Auth::check() && Auth::user()->role === 'staff_keuangan')
            <x-search-with-year />
        @else
            <x-search-simple />
        @endif
=======
        {{-- Search --}}
        <x-search-with-year />
>>>>>>> 7881684e027466948b9fc35eb8f243bc2c31e810
    </div>
</div>