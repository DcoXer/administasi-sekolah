<x-app-layout>
    <div class="p-8 max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Kelola Bidang Studi</h1>
            <a href="{{ route('bidang-studi.create') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                + Tambah Bidang Studi
            </a>
        </div>

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow border border-gray-200">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold text-gray-700">No</th>
                        <th class="px-6 py-3 text-left font-semibold text-gray-700">Nama Bidang</th>
                        <th class="px-6 py-3 text-left font-semibold text-gray-700">Kode</th>
                        <th class="px-6 py-3 text-left font-semibold text-gray-700">Deskripsi</th>
                        <th class="px-6 py-3 text-center font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($bidangStudis as $bidang)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-3">{{ $loop->iteration }}</td>
                            <td class="px-6 py-3 font-medium text-gray-900">{{ $bidang->nama_bidang }}</td>
                            <td class="px-6 py-3">
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold">
                                    {{ $bidang->kode_bidang }}
                                </span>
                            </td>
                            <td class="px-6 py-3 text-gray-600">{{ Str::limit($bidang->deskripsi, 50) }}</td>
                            <td class="px-6 py-3 text-center space-x-2">
                                <a href="{{ route('bidang-studi.edit', $bidang) }}" class="text-blue-600 hover:text-blue-800 font-medium">Edit</a>
                                <form action="{{ route('bidang-studi.destroy', $bidang) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 hover:text-red-800 font-medium" onclick="return confirm('Hapus bidang studi ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">Tidak ada data bidang studi</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $bidangStudis->links() }}
        </div>
    </div>
</x-app-layout>
