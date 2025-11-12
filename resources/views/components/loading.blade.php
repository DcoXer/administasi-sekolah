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

        <!-- Liquid Background -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute w-[600px] h-[600px] -top-48 -left-48 bg-blue-200
                rounded-full blur-3xl opacity-20 animate-pulse"></div>
            <div class="absolute w-[500px] h-[500px] -bottom-40 -right-40 bg-blue-300
                rounded-full blur-3xl opacity-20 animate-pulse"></div>
        </div>

        <!-- Loader Card -->
        <div class="relative bg-white p-8 rounded-2xl shadow-lg border border-gray-200 flex flex-col items-center">
            <div class="w-16 h-16 border-[3px] border-t-transparent border-blue-600 rounded-full animate-spin"></div>
            <p class="mt-4 text-gray-700 font-semibold">Loading...</p>
        </div>
    </div>

    <!-- Loader Livewire -->
    <div wire:loading.delay
        class="fixed inset-0 flex items-center justify-center bg-black/30 z-[9999]">

        <div class="relative bg-white p-8 rounded-2xl shadow-lg border border-gray-200 flex flex-col items-center">
            <div class="w-14 h-14 border-[3px] border-t-transparent border-blue-600 rounded-full animate-spin"></div>
            <p class="mt-3 text-gray-700 font-medium">Processing...</p>
        </div>
    </div>
</div>