<x-app-layout>
    <div class="p-8 max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Daftar Raport</h1>
            <a href="{{ route('raport.create') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                + Buat Raport
            </a>
        </div>

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow border border-gray-200 overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold text-gray-700">Siswa</th>
                        <th class="px-6 py-3 text-left font-semibold text-gray-700">NISN</th>
                        <th class="px-6 py-3 text-left font-semibold text-gray-700">Semester</th>
                        <th class="px-6 py-3 text-left font-semibold text-gray-700">Tahun Ajaran</th>
                        <th class="px-6 py-3 text-center font-semibold text-gray-700">Rata-Rata</th>
                        <th class="px-6 py-3 text-center font-semibold text-gray-700">Status</th>
                        <th class="px-6 py-3 text-center font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($raports as $raport)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-3 font-medium text-gray-900">{{ $raport->siswa->nama }}</td>
                            <td class="px-6 py-3">{{ $raport->siswa->nisn }}</td>
                            <td class="px-6 py-3">
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold">
                                    Semester {{ $raport->semester }}
                                </span>
                            </td>
                            <td class="px-6 py-3">{{ $raport->tahun_ajaran }}</td>
                            <td class="px-6 py-3 text-center">
                                <span class="font-bold text-lg">{{ number_format($raport->nilai_rata_rata, 2) }}</span>
                            </td>
                            <td class="px-6 py-3 text-center">
                                @if ($raport->sudah_dicetak)
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold">✓ Dicetak</span>
                                @else
                                    <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-semibold">Draft</span>
                                @endif
                            </td>
                            <td class="px-6 py-3 text-center space-x-2">
                                <a href="{{ route('raport.show', $raport) }}" class="text-blue-600 hover:text-blue-800 font-medium text-xs">Lihat</a>
                                <a href="{{ route('raport.edit', $raport) }}" class="text-green-600 hover:text-green-800 font-medium text-xs">Edit</a>
                                <a href="{{ route('raport.print', $raport) }}" target="_blank" class="text-purple-600 hover:text-purple-800 font-medium text-xs">PDF</a>
                                <form action="{{ route('raport.destroy', $raport) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 hover:text-red-800 font-medium text-xs" onclick="return confirm('Hapus raport ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-gray-500">Tidak ada raport</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $raports->links() }}
        </div>
    </div>
</x-app-layout>
