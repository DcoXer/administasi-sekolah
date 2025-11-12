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
                <tr class="hover:bg-gray-50">
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