<!-- Statistik Siswa -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 w-full">
    <!-- Tabel Jumlah Siswa -->
    <div class="liquid-card lg:col-span-2 overflow-x-auto flex flex-col justify-between">
        <div>
            <h3 class="text-lg font-bold text-gray-800 mb-4">Tabel Jumlah Siswa per Kelas</h3>
            <table class="min-w-full text-sm text-gray-900">
                <thead class="text-gray-600 text-center border-b bg-transparent">
                    <tr>
                        <th class="px-4 py-3">Kelas</th>
                        <th class="px-4 py-3">Jumlah Siswa</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-center">
                    @forelse($jumlahSiswa ?? [] as $kelas => $total)
                    <tr class="hover:bg-gray-50 transition">
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
    </div>

    <!-- Grafik Jumlah Siswa -->
    <div class="liquid-card flex flex-col justify-between">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Grafik Jumlah Siswa per Kelas</h3>
        <div class="flex-1 flex items-center justify-center">
            <canvas id="siswaChart" class="w-full h-64"></canvas>
        </div>
    </div>
</div>

<!-- Statistik Guru -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 w-full mt-6">
    <!-- Tabel Jumlah Guru -->
    <div class="liquid-card lg:col-span-2 overflow-x-auto flex flex-col justify-between">
        <div>
            <h3 class="text-lg font-bold text-gray-800 mb-4">Tabel Jumlah Guru per Mapel</h3>
            <table class="min-w-full text-sm text-gray-900">
                <thead class="text-gray-600 text-center border-b bg-transparent">
                    <tr>
                        <th class="px-4 py-3">Mata Pelajaran</th>
                        <th class="px-4 py-3">Jumlah Guru</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-center">
                    @forelse($jumlahGuru ?? [] as $mapel => $total)
                    <tr class="hover:bg-gray-50 transition">
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
    </div>

    <!-- Grafik Jumlah Guru -->
    <div class="liquid-card flex flex-col justify-between">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Grafik Jumlah Guru per Mapel</h3>
        <div class="flex-1 flex items-center justify-center">
            <canvas id="guruChart" class="w-full h-64"></canvas>
        </div>
    </div>
</div>