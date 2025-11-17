<x-app-layout>
    <div class="p-8 max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Edit Raport</h1>

        <form action="{{ route('raport.update', $raport) }}" method="POST" class="bg-white rounded-lg shadow border border-gray-200 p-6 space-y-6">
            @csrf @method('PUT')

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Wali Kelas</label>
                <select name="wali_kelas_id" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                    <option value="">-- Pilih Wali Kelas --</option>
                    @foreach ($gurus as $guru)
                        <option value="{{ $guru->id }}" {{ $raport->wali_kelas_id == $guru->id ? 'selected' : '' }}>
                            {{ $guru->nama }}
                        </option>
                    @endforeach
                </select>
                @error('wali_kelas_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Catatan Wali Kelas</label>
                <textarea name="catatan_wali_kelas" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('catatan_wali_kelas', $raport->catatan_wali_kelas) }}</textarea>
                @error('catatan_wali_kelas') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Catatan Kepala Sekolah</label>
                <textarea name="catatan_kepala_sekolah" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('catatan_kepala_sekolah', $raport->catatan_kepala_sekolah) }}</textarea>
                @error('catatan_kepala_sekolah') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                    Simpan
                </button>
                <a href="{{ route('raport.show', $raport) }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
