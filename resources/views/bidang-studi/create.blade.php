<x-app-layout>
    <div class="p-8 max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Tambah Bidang Studi</h1>

        <form action="{{ route('bidang-studi.store') }}" method="POST" class="bg-white rounded-lg shadow border border-gray-200 p-6 space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Bidang Studi</label>
                <input type="text" name="nama_bidang" value="{{ old('nama_bidang') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Contoh: Matematika" required>
                @error('nama_bidang') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Kode Bidang</label>
                <input type="text" name="kode_bidang" value="{{ old('kode_bidang') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Contoh: MTK" required>
                @error('kode_bidang') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                <textarea name="deskripsi" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Deskripsi bidang studi..."></textarea>
                @error('deskripsi') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                    Simpan
                </button>
                <a href="{{ route('bidang-studi.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
