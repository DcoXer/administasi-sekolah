<x-app-layout>
    <div
        x-data="{ animate: false }"
        x-init="setTimeout(() => animate = true, 100)"
        x-bind:class="animate ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-5'"
        class="transition-all duration-700 ease-out p-8 liquid-tabel max-w-5xl mx-auto mt-10 liquid-table">

        <h2 class="text-3xl font-bold text-gray-800 mb-10 text-center border-b pb-4">
            Tambah Data Siswa
        </h2>

        <form action="{{ route('siswa.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @csrf

            {{-- Kolom 1 --}}
            <div class="space-y-5">
                <div>
                    <label class="block mb-2 font-semibold text-gray-700">NISN</label>
                    <input type="text" name="nisn" value="{{ old('nisn') }}" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400" required>
                    @error('nisn')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block mb-2 font-semibold text-gray-700">NIK</label>
                    <input type="text" name="nik" value="{{ old('nik') }}" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400" required>
                    @error('nik')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block mb-2 font-semibold text-gray-700">Nama Lengkap</label>
                    <input type="text" name="nama" value="{{ old('nama') }}" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400" required>
                    @error('nama')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block mb-2 font-semibold text-gray-700">Kelas</label>
                    <input type="text" name="kelas" value="{{ old('kelas') }}" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400" required>
                    @error('kelas')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            {{-- Kolom 2 --}}
            <div class="space-y-5">
                <div>
                    <label class="block mb-2 font-semibold text-gray-700">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400" required>
                    @error('tempat_lahir')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block mb-2 font-semibold text-gray-700">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400" required>
                    @error('tanggal_lahir')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block mb-2 font-semibold text-gray-700">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400" required>
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block mb-2 font-semibold text-gray-700">Alamat</label>
                    <textarea name="alamat" rows="3" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400">{{ old('alamat') }}</textarea>
                    @error('alamat')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            {{-- Kolom 3 --}}
            <div class="space-y-5">
                <div>
                    <label class="block mb-2 font-semibold text-gray-700">Nama Ayah</label>
                    <input type="text" name="nama_ayah" value="{{ old('nama_ayah') }}" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400">
                    @error('nama_ayah')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block mb-2 font-semibold text-gray-700">Nama Ibu</label>
                    <input type="text" name="nama_ibu" value="{{ old('nama_ibu') }}" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400">
                    @error('nama_ibu')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block mb-2 font-semibold text-gray-700">Nama Wali</label>
                    <input type="text" name="nama_wali" value="{{ old('nama_wali') }}" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400">
                    @error('nama_wali')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            {{-- Tombol --}}
            <div class="col-span-1 md:col-span-3 flex justify-between mt-10">
                <a href="{{ route('siswa.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg shadow hover:bg-gray-600 transition">
                    Kembali
                </a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>