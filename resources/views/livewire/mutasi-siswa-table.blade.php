<div x-data="{ animate: false }"
    x-init="setTimeout(() => animate = true, 100)"
    x-bind:class="animate ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-5'"
    class="transition-all duration-700 ease-out p-5 liquid-table">
    <h2 class="text-lg font-semibold mb-3 text-gray-700">Daftar Pengajuan Mutasi</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-gray-900 sm:text-xs">
            <thead class="text-gray-600">
                <tr>
                    <th class="p-2">No</th>
                    <th class="p-2">Nama Siswa</th>
                    <th class="p-2">Tujuan Sekolah</th>
                    <th class="p-2">Status</th>
                    <th class="p-2">Tanggal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-center">
                @foreach ($mutasi as $m)
                <tr class="border-b border-gray-700 hover:bg-gray-50 transition">
                    <td class="p-2">{{ $loop->iteration }}</td>
                    <td class="p-2">{{ $m->siswa->nama ?? '-' }}</td>
                    <td class="p-2">{{ $m->tujuan_sekolah }}</td>
                    <td class="p-2">
                        @if ($m->status === 'pending')
                        <span class="bg-yellow-500 text-black px-2 py-1 rounded">Pending</span>
                        @elseif ($m->status === 'disetujui')
                        <span class="bg-green-600 px-2 py-1 rounded">Disetujui</span>
                        @else
                        <span class="bg-red-600 px-2 py-1 rounded">Ditolak</span>
                        @endif
                    </td>
                    <td class="p-2">{{ $m->tanggal_pengajuan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>