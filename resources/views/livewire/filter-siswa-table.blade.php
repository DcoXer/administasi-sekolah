<div
    x-data="{ animate: false }"
    x-init="setTimeout(() => animate = true, 100)"
    x-bind:class="animate ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-5'"
    class="transition-all duration-700 ease-out p-5 liquid-table">

    {{-- Toolbar Actions --}}
    <div class="flex flex-wrap gap-2 mb-3 justify-between">
        <a href="{{ route('siswa.create') }}" class="btn-ultimate">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M12 4v16m8-8H4" />
            </svg> Tambah Siswa
        </a>

        <a href="{{ route('siswa.export') }}" class="btn-ultimate">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M4 4v16h16V4H4zm4 8h8" />
            </svg> Export Excel
        </a>

        <form action="{{ route('siswa.import') }}" method="POST" enctype="multipart/form-data" class="flex items-center gap-2">
            @csrf
            <input type="file" name="file" required class="input-ultimate w-40">
            <button type="submit" class="btn-ultimate">Import Excel</button>
        </form>

    </div>



    {{-- Filter, Search & Tahun Ajaran --}}
    <div class="flex justify-between items-center flex-wrap gap-3 mb-4">
        <!-- Filter Kelas -->
        <select wire:model.live.debounce.300ms="kelas" class="input-ultimate w-40">
            <option value="">Semua Kelas</option>
            @foreach($kelasList as $k)
            <option value="{{ trim($k) }}">{{ $k }}</option>
            @endforeach
        </select>

        <!-- Search -->
        <div class="relative w-full sm:w-64">
            <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M21 21l-4.35-4.35M11 4a7 7 0 100 14 7 7 0 000-14z" />
            </svg>
            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari siswa..." class="input-ultimate pl-10 w-full">
        </div>

        <!-- 🎓 Tahun Ajaran -->
        <div class="badge-year flex">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd" />
            </svg>
            Tahun Ajaran: {{ date('Y') }}/{{ date('Y')+1 }}
        </div>
    </div>



    {{-- Tabel Data --}}
    <div class="overflow-x-auto min-w-full text-sm text-gray-900">
        <table class="text-grey-600">
            <thead>
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
                <tr class="hover:bg-white/20">
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
    <div class="mt-6 flex justify-center">
        {{ $siswas->links('components.pagination') }}
    </div>
</div>