<div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full lg:col-span-3">
    <div class="liquid-card">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Grafik Daftar Ulang</h3>
        <canvas id="duChart" class="w-full h-64"></canvas>
        <div class="mt-4 flex justify-between text-sm">
            <div class="flex items-center space-x-2">
                <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                <span class="text-gray-700">Sudah Bayar: <b>{{ $duSudah ?? 0 }}</b></span>
            </div>
            <div class="flex items-center space-x-2">
                <span class="w-3 h-3 bg-red-500 rounded-full"></span>
                <span class="text-gray-700">Belum Bayar: <b>{{ $duBelum ?? 0 }}</b></span>
            </div>
            <div class="flex items-center space-x-2">
                <span class="w-3 h-3 bg-blue-500 rounded-full"></span>
                <span class="text-gray-700">Total: <b>Rp.{{ number_format($duTotalSudah ?? 0,0,',','.') }}</b></span>
            </div>
        </div>
    </div>

    <div class="liquid-card">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Grafik Pembayaran SPP</h3>
        <canvas id="sppChart" class="w-full h-64"></canvas>
        <div class="mt-4 flex justify-between text-sm">
            <div class="flex items-center space-x-2">
                <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                <span class="text-gray-700">Sudah Bayar: <b>{{ $sppSudah ?? 0 }}</b></span>
            </div>
            <div class="flex items-center space-x-2">
                <span class="w-3 h-3 bg-red-500 rounded-full"></span>
                <span class="text-gray-700">Belum Bayar: <b>{{ $sppBelum ?? 0 }}</b></span>
            </div>
            <div class="flex items-center space-x-2">
                <span class="w-3 h-3 bg-blue-500 rounded-full"></span>
                <span class="text-gray-700">Total: <b>Rp.{{ number_format($sppTotalSudah ?? 0,0,',','.') }}</b></span>
            </div>
        </div>
    </div>
</div>
