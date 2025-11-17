<div x-data="{ show: true }"
    x-init="
        // Loader tampil saat awal masuk
        window.addEventListener('load', () => { show = false });
        // Loader muncul lagi pas pindah halaman (full reload)
        window.addEventListener('beforeunload', () => { show = true });
     ">

    <!-- Loader Global (Full Reload / Navigation) -->
    <div x-show="show"
        x-transition.opacity
        class="fixed inset-0 flex items-center justify-center z-[9999]">

        <!-- Background -->
        <div class="absolute inset-0 bg-gray-100 opacity-90"></div>

        <!-- Loader Card -->
        <div class="relative bg-white p-8 rounded-lg shadow-lg border border-gray-200 flex flex-col items-center">
            <div class="w-16 h-16 border-[3px] border-t-transparent border-blue-500 rounded-full animate-spin"></div>
            <p class="mt-4 text-gray-800 font-semibold">Loading...</p>
        </div>
    </div>

    <!-- Loader Livewire -->
    <div wire:loading.delay
        class="fixed inset-0 flex items-center justify-center bg-gray-900/50 z-[9999]">

        <div class="relative bg-white p-8 rounded-lg shadow-lg border border-gray-200 flex flex-col items-center">
            <div class="w-14 h-14 border-[3px] border-t-transparent border-blue-500 rounded-full animate-spin"></div>
            <p class="mt-3 text-gray-700 font-medium">Processing...</p>
        </div>
    </div>
</div>