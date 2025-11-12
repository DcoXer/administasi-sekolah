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

    {{-- Filter, Search & Tahun Ajaran --}}
    <div class="flex justify-between items-center flex-wrap gap-3 mb-4">
        {{-- Filter Kelas --}}
        <select wire:model.live.debounce.300ms="kelas" class="input-ultimate w-40">
            <option value="">Semua Kelas</option>
            @foreach($kelasList as $k)
            <option value="{{ trim($k) }}">{{ $k }}</option>
            @endforeach
        </select>
    </div>

    {{-- Tabel Data --}}
    <div class="overflow-x-auto liquid-table">
        <table class="min-w-full text-sm text-gray-900 sm:text-xs">
            <thead class="text-gray-600 text-center">
                <tr>
                    <th class="px-4 py-3 whitespace-nowrap">No</th>
                    <th class="px-4 py-3 whitespace-nowrap">Nama</th>
                    <th class="px-4 py-3 whitespace-nowrap">NISN</th>
                    <th class="px-4 py-3 whitespace-nowrap">Kelas</th>
                    <th class="px-4 py-3 whitespace-nowrap">JK</th>
                    <th class="px-4 py-3 whitespace-nowrap">Alamat</th>
                    <th class="px-4 py-3 whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($siswas as $siswa)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2">{{ ($siswas->currentPage()-1)*$siswas->perPage() + $loop->iteration }}</td>
                    <td class="font-semibold px-4 py-2">{{ $siswa->nama }}</td>
                    <td class="px-4 py-2">{{ $siswa->nisn }}</td>
                    <td class="text-center px-4 py-2">{{ $siswa->kelas }}</td>
                    <td class="px-4 py-2">{{ $siswa->jenis_kelamin }}</td>
                    <td class="px-4 py-2">{{ $siswa->alamat }}</td>
                    <td>
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