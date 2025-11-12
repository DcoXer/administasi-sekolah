<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Operator Dashboard -->
            @if(Auth::user()->hasRole('operator'))
                @include('dashboard.operator')
            @endif

            <!-- Kepala Madrasah Dashboard -->
            @if(Auth::user()->hasRole('kepala_madrasah'))
                @include('dashboard.kepala_sekolah')
            @endif

            <!-- Staff Keuangan Dashboard -->
            @if(Auth::user()->hasRole('staff_keuangan'))
                @include('dashboard.staff_keuangan')
            @endif

            <!-- Wali Kelas / Guru Bidang / Default Dashboard -->
            @if(Auth::user()->hasAnyRole(['wali_kelas', 'guru_bidang']))
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Selamat Datang, {{ Auth::user()->name }}</h3>
                    <p class="text-gray-600">Silakan gunakan menu di samping untuk mengakses fitur-fitur yang tersedia.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Include Dashboard Scripts -->
    @include('dashboard.scripts')
</x-app-layout>
