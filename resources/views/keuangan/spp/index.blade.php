<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto space-y-6">
            @if (session('success'))
            <x-alert-success :message="session('success')" />
            @endif
            <div class="flex items-center justify-between">
                <h2 class="text-sm text-gray-600">Tahun Ajaran 2025/2026</h2>
                <a href="{{ route('pembayaran-spp.create') }}"
                    class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow text-sm transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Data
                </a>
            </div>

            <div class="overflow-x-auto bg-white rounded shadow">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-50">
                        <tr class="text-center text-gray-700 font-medium">
                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">Nama Siswa</th>
                            <th class="px-4 py-3">Tanggal Bayar</th>
                            <th class="px-4 py-3">Tahun Ajaran</th>
                            <th class="px-4 py-3">Bulan</th>
                            <th class="px-4 py-3">Jumlah Uang</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($data as $item)
                        <tr>
                            <td class="px-4 py-2 text-center">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $item->siswa->nama ?? 'Tidak ditemukan' }}</td>
                            <td class="px-4 py-2 text-center">{{ $item->tanggal_bayar }}</td>
                            <td class="px-4 py-2 text-center">{{ $item->tahun }}</td>
                            <td class="px-4 py-2 text-center">{{ $item->bulan }}</td>
                            <td class="px-4 py-2 text-center">Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                            <td class="px-4 py-2">
                                @if ($item->status == 'sudah')
                                <span class="inline-block px-2 py-1 text-xs bg-green-100 text-green-700 rounded-full">
                                    Sudah Bayar
                                </span>
                                @else
                                <span class="inline-block px-2 py-1 text-xs bg-red-100 text-red-700 rounded-full">
                                    Belum Bayar
                                </span>
                                @endif
                            </td>
                            <td class="px-4 py-2 space-x-2">
                                <x-action-buttons
                                    :edit-url="route('pembayaran-spp.edit', $item->id)"
                                    :print-url="route('pembayaran-spp.preview', $item->id)"
                                    :delete-url="route('pembayaran-spp.destroy', $item->id)" />
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-gray-500">Belum ada data pembayaran.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mt-6">
                <div class="p-4 bg-green-50 border-l-4 border-green-500 rounded shadow hover:shadow-md transition duration-300">
                    <div class="text-sm text-green-700 font-medium">Siswa Sudah Bayar</div>
                    <div class="text-2xl font-bold text-green-900 mt-1">{{ $jumlahSudah }} siswa</div>
                </div>

                <div class="p-4 bg-red-50 border-l-4 border-red-500 rounded shadow hover:shadow-md transition duration-300">
                    <div class="text-sm text-red-700 font-medium">Siswa Belum Bayar</div>
                    <div class="text-2xl font-bold text-red-900 mt-1">{{ $jumlahBelum }} siswa</div>
                </div>

                <div class="p-4 bg-blue-50 border-l-4 border-blue-500 rounded shadow hover:shadow-md transition duration-300">
                    <div class="text-sm text-blue-700 font-medium">Total Uang Masuk</div>
                    <div class="text-xl font-bold text-blue-900 mt-1">Rp{{ number_format($totalSudah, 0, ',', '.') }}</div>
                </div>

                <div class="p-4 bg-yellow-50 border-l-4 border-yellow-500 rounded shadow hover:shadow-md transition duration-300">
                    <div class="text-sm text-yellow-700 font-medium">Potensi Belum Masuk</div>
                    <div class="text-xl font-bold text-yellow-900 mt-1">Rp{{ number_format($totalBelum, 0, ',', '.') }}</div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>