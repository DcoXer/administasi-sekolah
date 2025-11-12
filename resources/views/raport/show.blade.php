<x-app-layout>
    <div class="p-8 max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Raport Semester {{ $raport->semester }}</h1>
                <p class="text-gray-600 mt-2">
                    <span class="font-semibold">Siswa:</span> {{ $raport->siswa->nama }}<br>
                    <span class="font-semibold">Tahun Ajaran:</span> {{ $raport->tahun_ajaran }}<br>
                    <span class="font-semibold">Rata-Rata Nilai:</span> <span class="text-xl font-bold">{{ number_format($raport->nilai_rata_rata, 2) }}</span>
                </p>
            </div>
            <div class="space-y-2">
                <a href="{{ route('raport.print', $raport) }}" target="_blank" class="block text-center bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition">
                    🖨️ Cetak PDF
                </a>
                <a href="{{ route('raport.index') }}" class="block text-center bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition">
                    ← Kembali
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
                <h3 class="font-semibold text-gray-700 mb-3">Informasi Siswa</h3>
                <p class="text-sm text-gray-600 mb-2"><span class="font-semibold">NISN:</span> {{ $raport->siswa->nisn }}</p>
                <p class="text-sm text-gray-600 mb-2"><span class="font-semibold">NIK:</span> {{ $raport->siswa->nik }}</p>
                <p class="text-sm text-gray-600"><span class="font-semibold">Kelas:</span> {{ $raport->siswa->kelas }}</p>
            </div>

            <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
                <h3 class="font-semibold text-gray-700 mb-3">Wali Kelas</h3>
                <p class="text-sm text-gray-600">{{ $raport->waliKelas->nama ?? 'Belum diatur' }}</p>
            </div>

            <div class="bg-blue-50 rounded-lg shadow border border-blue-200 p-6">
                <h3 class="font-semibold text-gray-700 mb-3">Status</h3>
                @if ($raport->sudah_dicetak)
                    <p class="text-sm text-green-700 font-semibold">✓ Sudah Dicetak</p>
                    <p class="text-xs text-gray-600 mt-2">{{ $raport->tanggal_cetak->format('d M Y H:i') }}</p>
                @else
                    <p class="text-sm text-yellow-700 font-semibold">Draft</p>
                @endif
            </div>
        </div>

        <div class="bg-white rounded-lg shadow border border-gray-200 overflow-hidden mb-8">
            <div class="bg-gray-50 border-b border-gray-200 px-6 py-3">
                <h2 class="font-bold text-gray-900">Nilai Siswa</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700">Bidang Studi</th>
                            <th class="px-6 py-3 text-center font-semibold text-gray-700">Tugas</th>
                            <th class="px-6 py-3 text-center font-semibold text-gray-700">UTS</th>
                            <th class="px-6 py-3 text-center font-semibold text-gray-700">UAS</th>
                            <th class="px-6 py-3 text-center font-semibold text-gray-700">Nilai Akhir</th>
                            <th class="px-6 py-3 text-center font-semibold text-gray-700">Grade</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700">Catatan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($nilaiSiswa as $nilai)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-3 font-medium text-gray-900">
                                    {{ $nilai->guruBidang->bidang->nama_bidang }}
                                    <p class="text-xs text-gray-600">{{ $nilai->guruBidang->guru->nama }}</p>
                                </td>
                                <td class="px-6 py-3 text-center">{{ $nilai->nilai_tugas ?? '-' }}</td>
                                <td class="px-6 py-3 text-center">{{ $nilai->nilai_uts ?? '-' }}</td>
                                <td class="px-6 py-3 text-center">{{ $nilai->nilai_uas ?? '-' }}</td>
                                <td class="px-6 py-3 text-center font-bold text-lg">
                                    @if ($nilai->nilai_akhir)
                                        {{ number_format($nilai->nilai_akhir, 2) }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="px-6 py-3 text-center font-bold">
                                    @if ($nilai->grade)
                                        <span class="bg-{{ $nilai->grade == 'A' ? 'green' : ($nilai->grade == 'B' ? 'blue' : ($nilai->grade == 'C' ? 'yellow' : 'red')) }}-100 text-{{ $nilai->grade == 'A' ? 'green' : ($nilai->grade == 'B' ? 'blue' : ($nilai->grade == 'C' ? 'yellow' : 'red')) }}-800 px-3 py-1 rounded-full text-sm">
                                            {{ $nilai->grade }}
                                        </span>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="px-6 py-3 text-sm text-gray-600">{{ $nilai->catatan_guru }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-8 text-center text-gray-500">Belum ada nilai</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6">
            <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
                <h3 class="font-semibold text-gray-900 mb-3">Catatan Wali Kelas</h3>
                <textarea name="catatan_wali_kelas" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500" placeholder="Catatan wali kelas...">{{ $raport->catatan_wali_kelas }}</textarea>
            </div>

            <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
                <h3 class="font-semibold text-gray-900 mb-3">Catatan Kepala Sekolah</h3>
                <textarea name="catatan_kepala_sekolah" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500" placeholder="Catatan kepala sekolah...">{{ $raport->catatan_kepala_sekolah }}</textarea>
            </div>
        </div>

        <div class="mt-8 flex gap-4">
            <a href="{{ route('raport.edit', $raport) }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                ✏️ Edit
            </a>
            <a href="{{ route('raport.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition">
                Kembali
            </a>
        </div>
    </div>
</x-app-layout>
