<x-app-layout>
    <div class="p-8 max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Input Nilai</h1>
                <p class="text-gray-600 mt-2">
                    <span class="font-semibold">Bidang:</span> {{ $guruBidang->bidang->nama_bidang }}<br>
                    <span class="font-semibold">Kelas:</span> {{ $guruBidang->kelas }}<br>
                    <span class="font-semibold">Guru:</span> {{ $guruBidang->guru->nama }}
                </p>
            </div>
            <a href="{{ route('nilai.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition">
                ← Kembali
            </a>
        </div>

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('nilai.store', $guruBidang->id) }}" method="POST" class="bg-white rounded-lg shadow border border-gray-200 overflow-hidden">
            @csrf

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700">No</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700">NISN</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700">Nama Siswa</th>
                            <th class="px-6 py-3 text-center font-semibold text-gray-700">Tugas<br>(0-100)</th>
                            <th class="px-6 py-3 text-center font-semibold text-gray-700">UTS<br>(0-100)</th>
                            <th class="px-6 py-3 text-center font-semibold text-gray-700">UAS<br>(0-100)</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700">Catatan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($siswas as $siswa)
                            @php
                                $nilai = $nilais->where('siswa_id', $siswa->id)->first();
                            @endphp
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 font-medium">{{ $siswa->nisn }}</td>
                                <td class="px-6 py-4">{{ $siswa->nama }}</td>
                                <td class="px-6 py-4">
                                    <input type="hidden" name="nilai[{{ $loop->index }}][siswa_id]" value="{{ $siswa->id }}">
                                    <input type="number" name="nilai[{{ $loop->index }}][nilai_tugas]" value="{{ old('nilai.' . $loop->index . '.nilai_tugas', $nilai?->nilai_tugas) }}" min="0" max="100" class="w-20 border border-gray-300 rounded px-2 py-1 text-center focus:ring-2 focus:ring-blue-500">
                                </td>
                                <td class="px-6 py-4">
                                    <input type="number" name="nilai[{{ $loop->index }}][nilai_uts]" value="{{ old('nilai.' . $loop->index . '.nilai_uts', $nilai?->nilai_uts) }}" min="0" max="100" class="w-20 border border-gray-300 rounded px-2 py-1 text-center focus:ring-2 focus:ring-blue-500">
                                </td>
                                <td class="px-6 py-4">
                                    <input type="number" name="nilai[{{ $loop->index }}][nilai_uas]" value="{{ old('nilai.' . $loop->index . '.nilai_uas', $nilai?->nilai_uas) }}" min="0" max="100" class="w-20 border border-gray-300 rounded px-2 py-1 text-center focus:ring-2 focus:ring-blue-500">
                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="nilai[{{ $loop->index }}][catatan_guru]" value="{{ old('nilai.' . $loop->index . '.catatan_guru', $nilai?->catatan_guru) }}" class="w-full border border-gray-300 rounded px-2 py-1 text-sm focus:ring-2 focus:ring-blue-500">
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-8 text-center text-gray-500">Tidak ada siswa di kelas ini</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="bg-gray-50 border-t border-gray-200 px-6 py-4 flex gap-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                    💾 Simpan Nilai
                </button>
                <a href="{{ route('nilai.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
