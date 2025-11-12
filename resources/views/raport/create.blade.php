<x-app-layout>
    <div class="p-8 max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Buat Raport</h1>

        <form action="{{ route('raport.store') }}" method="POST" class="bg-white rounded-lg shadow border border-gray-200 p-6 space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Siswa</label>
                <select name="siswa_id" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                    <option value="">-- Pilih Siswa --</option>
                    @foreach ($siswas as $siswa)
                        <option value="{{ $siswa->id }}">{{ $siswa->nama }} ({{ $siswa->nisn }})</option>
                    @endforeach
                </select>
                @error('siswa_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Semester</label>
                    <select name="semester" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        <option value="">-- Pilih --</option>
                        @foreach ($semesters as $semester)
                            <option value="{{ $semester }}">Semester {{ $semester }}</option>
                        @endforeach
                    </select>
                    @error('semester') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tahun Ajaran</label>
                    <input type="number" name="tahun_ajaran" value="{{ old('tahun_ajaran', $tahunAjaran) }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                    @error('tahun_ajaran') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Wali Kelas</label>
                <select name="wali_kelas_id" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                    <option value="">-- Pilih Wali Kelas --</option>
                    @foreach ($siswas as $siswa)
                        <option value="{{ auth()->user()->id }}">{{ auth()->user()->name }}</option>
                    @endforeach
                </select>
                @error('wali_kelas_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                    Buat Raport
                </button>
                <a href="{{ route('raport.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
