<x-app-layout>
    {{-- ✅ Konten Utama --}}
    <div class="flex-1 p-6 space-y-6">

        {{-- ✅ Alert Success --}}
        @if (session('success'))
        <x-alert-success :message="session('success')" />
        @endif

        {{-- ✅ Judul Halaman --}}
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-extrabold text-gray-800 tracking-wide">Manajemen Data Siswa</h1>
        </div>

        {{-- ✅ Komponen Livewire --}}
        <div class="animate-fade-in-up">
            @livewire('filter-siswa-table')
        </div>
    </div>
</x-app-layout>