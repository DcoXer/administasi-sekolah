<div
    x-data="{ animate: false }"
    x-init="setTimeout(() => animate = true, 100)"
    x-bind:class="animate ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-5'"
    class="transition-all duration-700 ease-out p-5 bg-white/80 backdrop-blur-xl shadow-2xl rounded-xl border border-gray-200 opacity-0 translate-y-5">

    {{-- ✅ Toolbar Actions --}}
    <div class="flex flex-wrap gap-2 mb-3">
        <a href="{{ route('guru.create') }}" class="btn-ultimate">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M12 4v16m8-8H4" />
            </svg>
            Tambah Guru
        </a>

        <a href="{{ route('guru.export') }}" class="btn-ultimate">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M4 4v16h16V4H4zm4 8h8" />
            </svg>
            Export Excel
        </a>

        <form action="{{ route('guru.import') }}" method="POST" enctype="multipart/form-data" class="flex items-center gap-2">
            @csrf
            <input type="file" name="file" required class="input-ultimate w-40">
            <button type="submit" class="btn-ultimate">Import Excel</button>
        </form>

    </div>



    {{-- ✅ Filter & Search --}}
    <div class="flex justify-between items-center flex-wrap gap-3 mb-4">
        <!-- 🎯 Filter Mapel -->
        <select wire:model.live.debounce.300ms="mata_pelajaran" class="input-ultimate w-40">
            <option value="">Semua Mapel</option>
            @foreach($mapelList as $m)
            <option value="{{ trim($m) }}">{{ $m }}</option>
            @endforeach
        </select>

        <!-- 🔍 Search -->
        <div class="relative w-full sm:w-64">
            <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M21 21l-4.35-4.35M11 4a7 7 0 100 14 7 7 0 000-14z" />
            </svg>
            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari guru..." class="input-ultimate pl-10 w-full">
        </div>

        <!-- 🎓 Tahun Ajaran -->
        <div class="badge-year">Tahun Ajaran: {{ date('Y') }}/{{ date('Y')+1 }}</div>
    </div>



    {{-- ✅ Tabel Data Guru --}}
    <div class="overflow-x-auto rounded-lg shadow border border-gray-200">
        <table class="table-ultimate">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Jabatan</th>
                    <th>Mata Pelajaran</th>
                    <th>Jenis Kelamin</th>
                    <th>No Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($gurus as $guru)
                <tr class="text-center">
                    <td>{{ ($gurus->currentPage()-1)*$gurus->perPage() + $loop->iteration }}</td>
                    <td class="font-semibold">{{ $guru->nama }}</td>
                    <td>{{ $guru->nip }}</td>
                    <td>{{ $guru->jabatan }}</td>
                    <td>{{ $guru->mapel }}</td>
                    <td>{{ $guru->jenis_kelamin }}</td>
                    <td>{{ $guru->no_telp }}</td>
                    <td>
                        <x-action-buttons 
                        :edit-url="route('guru.edit',$guru->id)" 
                        :delete-url="route('guru.destroy',$guru->id)" />
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-gray-500">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- ✅ Pagination --}}
    <div class="mt-6 flex justify-center">
        {{ $gurus->links('components.pagination') }}
    </div>
</div>