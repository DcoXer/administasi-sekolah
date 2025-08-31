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
                <div class="liquid-card flex items-center justify-between">
                    <div>
                        <h3 class="text-sm font-medium text-green-600">Total Guru</h3>
                        <p class="text-lg font-bold text-green-800">
                            {{ $totalGuru ?? '' }} Guru
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

                {{-- Staff Keuangan --}}
                @if(($user->role ?? '') === 'staff_keuangan')
                <!-- Grafik Daftar Ulang -->
                <div class="liquid-card md:col-span-1">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Grafik Daftar Ulang</h3>
                    <canvas id="duChart" class="w-full h-64"></canvas>
                </div>

                <!-- Grafik SPP -->
                <div class="liquid-card md:col-span-1">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Grafik Pembayaran SPP</h3>
                    <canvas id="sppChart" class="w-full h-64"></canvas>
                </div>
                @endif

                {{-- Operator --}}
                @if(($user->role ?? '') === 'operator')
                <!-- Bagian Siswa -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 w-full lg:col-span-3">

                    <!-- ✅ Tabel Jumlah Siswa -->
                    <div class="liquid-card overflow-x-auto lg:col-span-2">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Tabel Jumlah Siswa per Kelas</h3>
                        <table class="min-w-full text-sm text-gray-900">
                            <thead class="text-gray-600 text-center border-b">
                                <tr>
                                    <th class="px-4 py-3">Kelas</th>
                                    <th class="px-4 py-3">Jumlah Siswa</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 text-center">
                                @forelse($jumlahSiswa ?? [] as $kelas => $total)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-2 font-semibold">{{ $kelas }}</td>
                                    <td class="px-4 py-2">{{ $total }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2" class="text-gray-500 py-3">Data siswa tidak tersedia.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- ✅ Grafik Jumlah Siswa -->
                    <div class="liquid-card">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Grafik Jumlah Siswa per Kelas</h3>
                        <canvas id="siswaChart" class="w-full h-64"></canvas>
                    </div>
                </div>

                <!-- Bagian Guru -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 w-full lg:col-span-3 mt-6">

                    <!-- ✅ Tabel Jumlah Guru -->
                    <div class="liquid-card overflow-x-auto lg:col-span-2">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Tabel Jumlah Guru per Mapel</h3>
                        <table class="min-w-full text-sm text-gray-900">
                            <thead class="text-gray-600 text-center border-b">
                                <tr>
                                    <th class="px-4 py-3">Mata Pelajaran</th>
                                    <th class="px-4 py-3">Jumlah Guru</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 text-center">
                                @forelse($jumlahGuru ?? [] as $mapel => $total)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-2 font-semibold">{{ $mapel }}</td>
                                    <td class="px-4 py-2">{{ $total }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2" class="text-gray-500 py-3">Data guru tidak tersedia.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- ✅ Grafik Jumlah Guru -->
                    <div class="liquid-card">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Grafik Jumlah Guru per Mapel</h3>
                        <canvas id="guruChart" class="w-full h-64"></canvas>
                    </div>
                </div>
                @endif
            </div>

        </div>
    </div>

    <!-- ChartJS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            // ==================== STAFF KEUANGAN ====================
            @if(($user -> role ?? '') === 'staff_keuangan')
            // Grafik Daftar Ulang (Line Chart)
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
                        borderWidth: 3,
                        pointRadius: 5,
                        pointHoverRadius: 8,
                        pointBackgroundColor: '#34d399'
                    }]
                },
                options: {
                    responsive: true,
                    animation: {
                        duration: 1500,
                        easing: 'easeInOutQuart'
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#065f46'
                            }
                        }
                    }
                }
            });

            // Grafik SPP (Bar Chart → biar beda)
            new Chart(document.getElementById('sppChart'), {
                type: 'bar',
                data: {
                    labels: @json($sppLabels ?? []),
                    datasets: [{
                        label: 'Total Setiap Bulan',
                        data: @json($sppData ?? []),
                        backgroundColor: 'rgba(59, 130, 246, 0.6)',
                        borderColor: '#3b82f6',
                        borderWidth: 1,
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    animation: {
                        duration: 1200,
                        easing: 'easeOutBounce'
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            @endif

            // ==================== OPERATOR ====================
            @if(($user -> role ?? '') === 'operator')
            // Grafik Jumlah Siswa per Kelas (Area Chart/Line with fill)
            new Chart(document.getElementById('siswaChart'), {
                type: 'line',
                data: {
                    labels: @json(array_keys($jumlahSiswa ?? [])),
                    datasets: [{
                        label: 'Jumlah Siswa',
                        data: @json(array_values($jumlahSiswa ?? [])),
                        fill: true,
                        backgroundColor: 'rgba(99, 102, 241, 0.3)',
                        borderColor: '#6366f1',
                        borderWidth: 3,
                        tension: 0.3,
                        pointRadius: 5,
                        pointHoverRadius: 8,
                        pointBackgroundColor: '#6366f1'
                    }]
                },
                options: {
                    responsive: true,
                    animation: {
                        duration: 1800,
                        easing: 'easeInOutCubic'
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#312e81'
                            }
                        }
                    }
                }
            });

            // Grafik Jumlah Guru per Mapel (Doughnut Chart)
            new Chart(document.getElementById('guruChart'), {
                type: 'doughnut',
                data: {
                    labels: @json(array_keys($jumlahGuru ?? [])),
                    datasets: [{
                        label: 'Jumlah Guru',
                        data: @json(array_values($jumlahGuru ?? [])),
                        backgroundColor: [
                            '#3b82f6', '#10b981', '#f59e0b', '#ef4444',
                            '#8b5cf6', '#ec4899', '#14b8a6'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    animation: {
                        animateScale: true,
                        animateRotate: true,
                        duration: 1500,
                        easing: 'easeOutElastic'
                    },
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
            @endif
        });
    </script>

</x-app-layout>