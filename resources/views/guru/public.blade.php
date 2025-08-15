<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Daftar Guru
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">No</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Nama</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Jabatan</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Mapel</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Jenis Kelamin</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($gurus as $index => $guru)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $guru->nama }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $guru->jabatan }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $guru->mapel }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $guru->jenis_kelamin }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500">Belum ada data guru.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
