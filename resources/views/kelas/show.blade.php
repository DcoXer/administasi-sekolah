<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-alert-success />
            <x-alert-error />

            <!-- Header -->
            <div class="mb-6 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Detail Kelas: {{ $kelas->nama_kelas }}</h1>
                    <p class="text-sm text-gray-600 mt-1">Informasi kelas & daftar siswa</p>
                </div>

                <a href="{{ route('kelas.index') }}" 
                    class="inline-flex items-center justify-center px-4 py-2.5 bg-gray-600 text-white rounded-lg font-semibold text-sm hover:bg-gray-700 transition-all duration-200 shadow-sm">
                    Kembali
                </a>
            </div>

            <!-- Card Layout -->
            <div class="liquid-card">
                <div class="bg-white border border-gray-200 rounded-lg p-6 mb-6">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Informasi Kelas</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                        <div>
                            <p class="text-gray-600">Nama Kelas</p>
                            <p class="font-medium text-gray-900">{{ $kelas->nama_kelas }}</p>
                        </div>

                        <div>
                            <p class="text-gray-600">Wali Kelas</p>
                            <p class="font-medium text-gray-900">{{ $kelas->waliKelas->name ?? '-' }}</p>
                        </div>

                        <div>
                            <p class="text-gray-600">Jumlah Siswa</p>
                            <p class="font-medium text-gray-900">{{ $kelas->siswas->count() }} siswa</p>
                        </div>
                    </div>
                </div>

                <!-- Table Siswa -->
                <div class="overflow-x-auto rounded-lg border border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200 bg-white">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">No</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Nama</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">NISN</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Jenis Kelamin</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($kelas->siswas as $siswa)
                                <tr class="hover:bg-gray-50 transition-colors duration-150">
                                    <td class="px-4 py-3 text-sm text-gray-700">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3 text-sm font-medium text-gray-900">{{ $siswa->nama_siswa }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-700">{{ $siswa->nisn }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-700">{{ $siswa->jenis_kelamin }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-8 text-center text-gray-500">
                                        <div class="flex flex-col items-center">
                                            <svg class="w-12 h-12 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                            </svg>
                                            <p class="text-sm">Belum ada siswa di kelas ini</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
