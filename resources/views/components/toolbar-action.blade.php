<div class="flex flex-col sm:flex-row items-center justify-between gap-4 mb-6">

    {{-- Left side: Toolbar actions --}}
    <div class="flex flex-wrap items-center gap-3">
        <a href="{{ $createRoute ?? '#' }}"
            class="btn-ultimate h-10 px-4 text-sm flex items-center gap-2 rounded-lg">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M12 4v16m8-8H4" />
            </svg>
            Tambah
        </a>

        <a href="{{ $exportRoute ?? '#' }}"
            class="btn-ultimate h-10 px-4 text-sm flex items-center gap-2 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
            </svg>
            Export
        </a>

        <form action="{{ $importRoute ?? '#' }}" method="POST" enctype="multipart/form-data" class="inline-block">
            @csrf
            <input type="file" name="file" id="importFile" class="hidden" onchange="this.form.submit()" required>
            <button type="button"
                onclick="document.getElementById('importFile').click()"
                class="btn-ultimate h-10 px-4 text-sm flex items-center gap-2 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                </svg>
                Import
            </button>
        </form>
    </div>

    {{-- Right side: Search + Tahun ajaran --}}
    <div class="flex items-center gap-4 w-full sm:w-auto">
        {{-- Search --}}
        <x-search-with-year placeholder="Cari siswa..." />
    </div>
</div>