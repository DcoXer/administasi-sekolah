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
<<<<<<< HEAD
                <img src="{{ Auth::user()->profile_photo ? asset('storage/profile/' . Auth::user()->profile_photo) : asset('default-avatar.png') }}"
                    class="w-9 h-9 rounded-full border border-white/40 shadow-md object-cover">
            </div>

            <!-- Dashboard per Role -->
            @if(($user->role ?? '') === 'operator')
                @include('dashboard.operator')
            @elseif(($user->role ?? '') === 'staff_keuangan')
                @include('dashboard.staff_keuangan')
            @elseif(($user->role ?? '') === 'kepala_sekolah')
                @include('dashboard.kepala_sekolah')
            @endif

        </div>
    </div>

    <!-- ChartJS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>
=======
            @endif
        </div>
    </div>

    <!-- Include Dashboard Scripts -->
>>>>>>> 7881684e027466948b9fc35eb8f243bc2c31e810
    @include('dashboard.scripts')
</x-app-layout>
