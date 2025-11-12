<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Welcome Card -->
            <div class="liquid-card flex items-center justify-between fade-in delay-1">
                <div>
                    <h3 class="text-sm font-medium text-gray-600">Halo,</h3>
                    <p class="text-lg font-bold text-gray-900">{{ $user->name ?? 'User' }}</p>
                    <p class="text-xs text-gray-500 mt-1">Role: {{ $user->role ?? '-' }}</p>
                </div>
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
    @include('dashboard.scripts')
</x-app-layout>
