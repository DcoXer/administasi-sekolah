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

            <!-- Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 fade-in delay-2">
                <div class="liquid-card flex items-center justify-between">
                    <div>
                        <h3 class="text-sm font-medium text-green-600">Total Siswa</h3>
                        <p class="text-lg font-bold text-green-800">
                            {{ $totalSiswa ?? '' }} siswa
                        </p>
                    </div>
                    <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 20h5V4H2v16h5m10 0V4m0 16a3 3 0 01-6 0m6 0a3 3 0 106 0" />
                    </svg>
                </div>

                @if(($user->role ?? '') === 'staff_keuangan')
                <div class="liquid-card flex items-center justify-between">
                    <div>
                        <h3 class="text-sm font-medium text-indigo-600">Total Daftar Ulang</h3>
                        <p class="text-lg font-bold text-indigo-800">
                            Rp {{ number_format($duTotalSudah ?? 0,0,',','.') }}
                        </p>
                    </div>
                    <svg class="w-10 h-10 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4c.47 0 .91-.08 1.32-.24L17 17V7l-3.68 1.24A3.95 3.95 0 0012 8z" />
                    </svg>
                </div>

                <div class="liquid-card flex items-center justify-between">
                    <div>
                        <h3 class="text-sm font-medium text-blue-600">Total SPP Masuk</h3>
                        <p class="text-lg font-bold text-blue-800">
                            Rp {{ number_format($sppTotalSudah ?? 0,0,',','.') }}
                        </p>
                    </div>
                    <svg class="w-10 h-10 text-blue-500" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4c.47 0 .91-.08 1.32-.24L17 17V7l-3.68 1.24A3.95 3.95 0 0012 8z" />
                    </svg>
                </div>
                @endif
            </div>

            <!-- Grafik Section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6 fade-in delay-3">

                <!-- Grafik Jumlah Siswa (Selalu tampil) -->
                <div class="liquid-card">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Jumlah Siswa per Kelas</h3>
                    <canvas id="siswaChart"></canvas>
                </div>

                @if(($user->role ?? '') === 'staff_keuangan')
                <!-- Grafik Daftar Ulang -->
                <div class="liquid-card">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Grafik Daftar Ulang</h3>
                    <canvas id="duChart"></canvas>
                </div>

                <!-- Grafik SPP -->
                <div class="liquid-card">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Grafik Pembayaran SPP</h3>
                    <canvas id="sppChart"></canvas>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- ChartJS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Jumlah Siswa (Selalu tampil)
            new Chart(document.getElementById('siswaChart'), {
                type: 'bar',
                data: {
                    labels: @json(array_keys($siswaPerKelas ?? [])),
                    datasets: [{
                        label: 'Jumlah Siswa',
                        data: @json(array_values($siswaPerKelas ?? [])),
                        backgroundColor: 'rgba(139, 92, 246, 0.6)',
                        borderRadius: 8,
                        barThickness: 30
                    }]
                }
            });

            @if(($user -> role ?? '') === 'staff_keuangan')
            // Grafik Daftar Ulang
            new Chart(document.getElementById('duChart'), {
                type: 'line',
                data: {
                    labels: @json($duChart -> pluck('status') ?? []),
                    datasets: [{
                        label: 'Jumlah Siswa',
                        data: @json($duChart -> pluck('nominal') ?? []),
                        borderColor: '#34d399',
                        backgroundColor: 'rgba(52, 211, 153, 0.2)',
                        fill: true,
                        tension: 0.4,
                        borderWidth: 2,
                        pointRadius: 4,
                        pointBackgroundColor: '#34d399'
                    }]
                }
            });

            // Grafik SPP
            new Chart(document.getElementById('sppChart'), {
                type: 'line',
                data: {
                    labels: @json($sppLabels ?? []),
                    datasets: [{
                        label: 'Total Bayar (Rp)',
                        data: @json($sppData ?? []),
                        borderColor: '#3b82f6',
                        backgroundColor: 'rgba(59, 130, 246, 0.2)',
                        fill: true,
                        tension: 0.4,
                        borderWidth: 2,
                        pointRadius: 4,
                        pointBackgroundColor: '#3b82f6'
                    }]
                }
            });
            @endif
        });
    </script>
</x-app-layout>