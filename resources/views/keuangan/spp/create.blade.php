<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 mt-10 liquid-table">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold text-gray-800">Tambah Pembayaran SPP</h2>
            <a href="{{ route('pembayaran-spp.index') }}" class="inline-flex items-center text-sm text-indigo-600 hover:text-indigo-800 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali
            </a>
        </div>

        <form action="{{ route('pembayaran-spp.store') }}" 
        x-data="{ isSubmitting: false }" @submit="isSubmitting = true"
        method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf

            {{-- Kolom 1 --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700">Nama Siswa</label>
                <select name="siswa_id" class="w-full border-gray-300 rounded-lg shadow-sm">
                    <option value="">-- Pilih Siswa --</option>
                    @foreach ($siswas as $siswa)
                        <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Kolom 2 --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700">Tahun</label>
                <input type="number" name="tahun" value="{{ old('tahun', date('Y')) }}" class="w-full border-gray-300 rounded-lg shadow-sm">
            </div>

            {{-- Kolom 3 --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700">Bulan</label>
                <select name="bulan" class="w-full border-gray-300 rounded-lg shadow-sm">
                    <option value="">-- Pilih Bulan --</option>
                    @foreach ([
                        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                    ] as $bulan)
                        <option value="{{ $bulan }}">{{ $bulan }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Kolom 4 --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700">Jumlah (Rp)</label>
                <input type="number" name="jumlah" class="w-full border-gray-300 rounded-lg shadow-sm">
            </div>

            {{-- Kolom 5 --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700">Tanggal Bayar</label>
                <input type="date" name="tanggal_bayar" class="w-full border-gray-300 rounded-lg shadow-sm">
            </div>

            {{-- Kolom 6 --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700">Status</label>
                <select name="status" class="w-full border-gray-300 rounded-lg shadow-sm">
                    <option value="">-- Pilih Status --</option>
                    <option value="sudah">Sudah Bayar</option>
                    <option value="belum">Belum Bayar</option>
                </select>
            </div>

            {{-- Tombol --}}
            <div class="col-span-2 text-right pt-4">
                <button type="submit" 
                :disabled="isSubmitting"
                class="bg-green-600 text-white px-5 py-2 rounded-lg shadow hover:bg-green-800 transition"
                :class="isSubmitting ? 'opacity-50 cursor-not-allowed' : ''">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
