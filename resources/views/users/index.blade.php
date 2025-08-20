<x-app-layout>
    {{-- ✅ Konten Utama --}}
    <div class="flex-1 p-6 space-y-6">

        {{-- ✅ Alert Success --}}
        @if (session('success'))
        <x-alert-success :message="session('success')" />
        @endif

        {{-- ✅ Judul Halaman --}}
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-extrabold text-gray-800 tracking-wide">Manajemen Users</h1>
            <div class="bg-indigo-100 bg-opacity-60 text-indigo-800 text-sm font-semibold px-4 py-2 rounded-lg shadow">
                📅 Tahun Ajaran: <span class="font-bold">{{ now()->format('Y') }}/{{ now()->addYear()->format('Y') }}</span>
            </div>
        </div>

        {{-- ✅ Komponen Livewire --}}
        <div class="animate-fade-in-up">
            @livewire('user-management')
        </div>
    </div>
</x-app-layout>