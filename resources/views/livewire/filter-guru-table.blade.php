<div
    x-data="{ animate: false }"
    x-init="setTimeout(() => animate = true, 100)"
    x-bind:class="animate ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-5'"
    class="transition-all duration-700 ease-out p-5 liquid-table">

    {{-- Toolbar Actions --}}
    <x-toolbar-action
        :create-route="route('guru.create')"
        :export-route="route('guru.export')"
        :import-route="route('guru.import')" />

    {{-- Filter & Search --}}
    <div class="flex justify-between items-center flex-wrap gap-3 mb-4">
        <select wire:model.live.debounce.300ms="mata_pelajaran" class="input-ultimate w-40">
            <option value="">Semua Mapel</option>
            @foreach($mapelList as $m)
            <option value="{{ trim($m) }}">{{ $m }}</option>
            @endforeach
        </select>
    </div>

    {{-- Responsive Table --}}
    <div class="overflow-x-auto w-full liquid-table">
        <table class="min-w-full text-sm text-gray-900 table-auto border-collapse">
            <thead class="text-center bg-transparant">
                <tr>
                    <th class="px-3 py-2 whitespace-nowrap">No</th>
                    <th class="px-3 py-2 whitespace-nowrap">Nama</th>
                    <th class="px-3 py-2 whitespace-nowrap">NIP</th>
                    <th class="px-3 py-2 whitespace-nowrap">Jabatan</th>
                    <th class="px-3 py-2 whitespace-nowrap">Mata Pelajaran</th>
                    <th class="px-3 py-2 whitespace-nowrap">Jenis Kelamin</th>
                    <th class="px-3 py-2 whitespace-nowrap">No Telepon</th>
                    <th class="px-3 py-2 whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($gurus as $guru)
                <tr class="hover:bg-gray-50">
                    <td class="px-3 py-2 text-center">{{ ($gurus->currentPage()-1)*$gurus->perPage() + $loop->iteration }}</td>
                    <td class="font-semibold px-3 py-2 text-left">{{ $guru->nama }}</td>
                    <td class="px-3 py-2">{{ $guru->nip }}</td>
                    <td class="px-3 py-2">{{ $guru->jabatan }}</td>
                    <td class="px-3 py-2">{{ $guru->mapel }}</td>
                    <td class="px-3 py-2">{{ $guru->jenis_kelamin }}</td>
                    <td class="px-3 py-2">{{ $guru->no_hp }}</td>
                    <td class="px-3 py-2 flex justify-center space-x-2">
                        <x-action-buttons
                            :edit-url="route('guru.edit',$guru->id)"
                            :delete-url="route('guru.destroy',$guru->id)" />
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-gray-500">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-6 flex justify-center">
        {{ $gurus->links('components.pagination') }}
    </div>
</div>