<div>
    <!-- Search & Pagination -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-4">
        <input type="text" wire:model.debounce.500ms="search"
               placeholder="Cari nama siswa..."
               class="mb-2 md:mb-0 p-2 border rounded-md w-full md:w-1/3">
        <select wire:model="perPage" class="p-2 border rounded-md">
            <option value="5">5 / halaman</option>
            <option value="10">10 / halaman</option>
            <option value="20">20 / halaman</option>
        </select>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-gray-900">
            <thead class="text-gray-600 text-center border-b">
                <tr>
                    <th class="px-4 py-3">Nama Siswa</th>
                    <th class="px-4 py-3">Kelas</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Tanggal Pengajuan</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-center">
                @forelse($mutasi as $m)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $m->siswa->name }}</td>
                    <td class="px-4 py-2">{{ $m->siswa->kelas }}</td>
                    <td class="px-4 py-2">{{ ucfirst($m->status) }}</td>
                    <td class="px-4 py-2">{{ $m->created_at->format('d M Y') }}</td>
                    <td class="px-4 py-2">
                        @if($m->status === 'pending')
                        <button wire:click="approve({{ $m->id }})"
                                class="px-2 py-1 bg-green-500 text-white rounded-md">Setujui</button>
                        <button wire:click="reject({{ $m->id }})"
                                class="px-2 py-1 bg-red-500 text-white rounded-md">Tolak</button>
                        @else
                        <span class="text-gray-500">-</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-gray-500 py-3">Belum ada pengajuan mutasi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $mutasi->links() }}
    </div>
</div>
