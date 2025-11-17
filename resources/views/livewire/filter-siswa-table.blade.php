<div
    x-data="{ animate: false }"
    x-init="setTimeout(() => animate = true, 100)"
    x-bind:class="animate ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-5'"
    class="transition-all duration-700 ease-out p-5 liquid-table">

    {{-- Toolbar Actions --}}
    <x-toolbar-action
        :create-route="route('siswa.create')"
        :export-route="route('siswa.export')"
        :import-route="route('siswa.import')" />

    <div class="flex flex-wrap items-center gap-3 mb-4">
        {{-- Filter Kelas --}}
        <div class="w-full sm:w-auto">
            <select
                wire:model.live.debounce.300ms="kelas"
                class="w-full sm:w-48 md:w-56 px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 
               focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
               transition-all duration-200">
                <option value="">Semua Kelas</option>
                @foreach($kelasList as $kelas)
                <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- Tabel Data --}}
    <div class="overflow-x-auto rounded-lg border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200 bg-white">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">NISN</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Kelas</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">JK</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Alamat</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($siswas as $siswa)
<<<<<<< HEAD
                <tr class="hover:bg-gray-50 transition-colors duration-150">
                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">{{ ($siswas->currentPage()-1)*$siswas->perPage() + $loop->iteration }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">{{ $siswa->nama_siswa }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">{{ $siswa->nisn }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm text-center text-gray-700">{{ $siswa->kelas->nama_kelas ?? '-' }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm text-center text-gray-700">{{ $siswa->jenis_kelamin }}</td>
                    <td class="px-4 py-3 text-sm text-gray-700">{{ Str::limit($siswa->alamat, 30) }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm">
=======
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2">{{ ($siswas->currentPage()-1)*$siswas->perPage() + $loop->iteration }}</td>
                    <td class="font-semibold px-4 py-2">{{ $siswa->nama }}</td>
                    <td class="px-4 py-2">{{ $siswa->nisn }}</td>
                    <td class="text-center px-4 py-2">{{ $siswa->kelas }}</td>
                    <td class="px-4 py-2">{{ $siswa->jenis_kelamin }}</td>
                    <td class="px-4 py-2">{{ $siswa->alamat }}</td>
                    <td>
>>>>>>> 7881684e027466948b9fc35eb8f243bc2c31e810
                        <x-action-buttons
                            :edit-url="route('siswa.edit',$siswa->id)"
                            :delete-url="route('siswa.destroy',$siswa->id)" />
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-gray-500">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="overflow-x-auto mt-6 flex justify-center">
        {{ $siswas->links('components.pagination') }}
    </div>
</div>