<div
    x-data="{ animate: false }"
    x-init="setTimeout(() => animate = true, 100)"
    x-bind:class="animate ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-5'"
    class="transition-all duration-700 ease-out p-5 liquid-table">

    {{-- Toolbar Actions --}}
    <x-toolbar-action
        :create-route="route('daftar-ulang.create')"
        :export-route="route('daftar-ulang.export')"
        :import-route="route('daftar-ulang.import')" />

    {{-- Search --}}
    <div class="flex justify-between items-center flex-wrap gap-3 mb-4">
        <div class="relative w-full sm:w-64">
            <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400 pointer-events-none"
                fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M21 21l-4.35-4.35M11 4a7 7 0 100 14 7 7 0 000-14z" />
            </svg>

            <input type="text"
                wire:model.live.debounce.300ms="search"
                placeholder="Cari siswa..."
                class="w-full pl-10 pr-3 py-2 rounded-xl 
               bg-transparent border border-white/30 
               backdrop-blur-md 
               text-gray-900 placeholder-gray-400
               focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400
               transition-all duration-300" />
        </div>

        <div class="badge-year flex gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd" />
            </svg> Tahun Ajaran: {{ date('Y') }}/{{ date('Y')+1 }}
        </div>
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto liquid-table">
        <table class="min-w-full text-sm text-gray-900">
            <thead class="text-gray-600 text-center">
                <tr>
                    <th class="px-4 py-3 whitespace-nowrap">No</th>
                    <th class="px-4 py-3 whitespace-nowrap">Nama Lengkap Siswa</th>
                    <th class="px-4 py-3 whitespace-nowrap">Tahun Ajaran</th>
                    <th class="px-4 py-3 whitespace-nowrap">Jumlah Uang</th>
                    <th class="px-4 py-3 whitespace-nowrap">Status</th>
                    <th class="px-4 py-3 whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($pembayaran as $item)
                <tr class="hover:bg-white/20">
                    <td class="px-4 py-2 text-center">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $item->siswa->nama ?? 'Tidak ditemukan' }}</td>
                    <td class="px-4 py-2 text-center">{{ $item->tahun_ajaran }}</td>
                    <td class="px-4 py-2 text-center">Rp {{ number_format($item->nominal, 0, ',', '.') }}</td>
                    <td class="px-4 py-2 text-center">
                        @if ($item->status == 'sudah_bayar')
                        <span class="inline-block px-2 py-1 bg-green-100 text-green-700 rounded text-xs font-medium">
                            Sudah Bayar
                        </span>
                        @else
                        <span class="inline-block px-2 py-1 bg-red-100 text-red-700 rounded text-xs font-medium">
                            Belum Bayar
                        </span>
                        @endif
                    </td>
                    <td class="px-4 py-2 space-x-2 flex justify-center">
                        <x-action-buttons
                            :edit-url="route('daftar-ulang.edit', $item->id)"
                            :print-url="route('daftar-ulang.preview', $item->id)"
                            :delete-url="route('daftar-ulang.destroy', $item->id)" />
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-gray-500">Belum ada data pembayaran.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6 flex justify-center">
        {{ $pembayaran->links('components.pagination') }}
    </div>

</div>