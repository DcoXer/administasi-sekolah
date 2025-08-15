<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 mt-10 bg-white rounded-2xl shadow">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold text-gray-800">Edit Pembayaran SPP</h2>
            <a href="{{ route('pembayaran-spp.index') }}" class="inline-flex items-center text-sm text-indigo-600 hover:text-indigo-800 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali
            </a>
        </div>

        {{-- Error Validation --}}
        @if ($errors->any())
            <div class="mb-4">
                <ul class="list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pembayaran-spp.update', $pembayaranSpp->id) }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf
            @method('PUT')

            {{-- Kolom 1 --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700">Nama Siswa</label>
                <select name="siswa_id" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                    <option value="">-- Pilih Siswa --</option>
                    @foreach ($siswas as $siswa)
                        <option value="{{ $siswa->id }}" {{ $siswa->id == $pembayaranSpp->siswa_id ? 'selected' : '' }}>
                            {{ $siswa->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Kolom 2 --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700">Tahun</label>
                <input type="number" name="tahun" value="{{ old('tahun', $pembayaranSpp->tahun) }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
            </div>

            {{-- Kolom 3 --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700">Bulan</label>
                <input type="text" name="bulan" value="{{ old('bulan', $pembayaranSpp->bulan) }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
            </div>

            {{-- Kolom 4 --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700">Jumlah Bayar (Rp)</label>
                <input type="number" name="jumlah" value="{{ old('jumlah', $pembayaranSpp->jumlah) }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
            </div>

            {{-- Kolom 5 --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700">Tanggal Bayar</label>
                <input type="date" name="tanggal_bayar" value="{{ old('tanggal_bayar', \Carbon\Carbon::parse($pembayaranSpp->tanggal_bayar)->format('Y-m-d')) }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
            </div>

            {{-- Kolom 6 --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700">Status</label>
                <select name="status" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="sudah" {{ old('status', $pembayaranSpp->status) == 'sudah' ? 'selected' : '' }}>Sudah Bayar</option>
                    <option value="belum" {{ old('status', $pembayaranSpp->status) == 'belum' ? 'selected' : '' }}>Belum Bayar</option>
                </select>
            </div>

            {{-- Tombol --}}
            <div class="col-span-2 text-right pt-4">
                <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                    Simpan Perubahan
                </button>
                <a href="{{ route('pembayaran-spp.index') }}" class="ml-3 text-gray-600 hover:underline">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
