<div class="space-y-6 fade-in delay-3">

    <!-- Total Siswa, Guru, Mutasi -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="liquid-card flex items-center justify-between p-4">
            <div>
                <h3 class="text-sm font-medium text-blue-600">Total Siswa</h3>
                <p class="text-lg font-bold text-blue-800">{{ $totalSiswa ?? 0 }}</p>
            </div>
            <svg class="w-10 h-10 text-blue-500" ...>...</svg>
        </div>
        <div class="liquid-card flex items-center justify-between p-4">
            <div>
                <h3 class="text-sm font-medium text-blue-600">Total Guru</h3>
                <p class="text-lg font-bold text-blue-800">{{ $totalGuru ?? 0 }}</p>
            </div>
            <svg class="w-10 h-10 text-blue-500" ...>...</svg>
        </div>
        <div class="liquid-card flex items-center justify-between p-4">
            <div>
                <h3 class="text-sm font-medium text-amber-600">Total Pengajuan Mutasi</h3>
                <p class="text-lg font-bold text-amber-800">{{ $totalMutasi ?? 0 }}</p>
            </div>
            <svg class="w-10 h-10 text-amber-500" ...></svg>
        </div>
    </div>

    <!-- Status Mutasi Detail -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-4">
        <!-- Menunggu Persetujuan -->
        <div class="liquid-card flex items-center justify-between p-4 border-l-4 border-yellow-400">
            <div>
                <h3 class="text-sm font-medium text-yellow-600">Menunggu Persetujuan</h3>
                <p class="text-lg font-bold text-yellow-800">{{ $totalMutasiMenunggu ?? 0 }}</p>
            </div>
            <svg class="w-10 h-10 text-yellow-500" ...></svg>
        </div>
        <!-- Disetujui -->
        <div class="liquid-card flex items-center justify-between p-4 border-l-4 border-green-400">
            <div>
                <h3 class="text-sm font-medium text-green-600">Disetujui</h3>
                <p class="text-lg font-bold text-green-800">{{ $totalMutasiDisetujui ?? 0 }}</p>
            </div>
            <svg class="w-10 h-10 text-green-500" ...></svg>
        </div>
        <!-- Ditolak -->
        <div class="liquid-card flex items-center justify-between p-4 border-l-4 border-red-400">
            <div>
                <h3 class="text-sm font-medium text-red-600">Ditolak</h3>
                <p class="text-lg font-bold text-red-800">{{ $totalMutasiDitolak ?? 0 }}</p>
            </div>
            <svg class="w-10 h-10 text-red-500" ...></svg>
        </div>
    </div>

    <!-- Grafik Mutasi -->
    <div class="liquid-card mt-8 p-4 h-96">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Grafik Status Pengajuan Mutasi</h3>
        <canvas id="mutasiChart" class="w-full h-64 sm:h-80 md:h-96"></canvas>
    </div>
</div>