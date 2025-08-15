<x-app-layout>
    <div
        x-data="{ animate: false }"
        x-init="setTimeout(() => animate = true, 100)"
        x-bind:class="animate ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-5'"
        class="transition-all duration-700 ease-out p-6 bg-white/80 backdrop-blur-xl rounded-xl shadow-2xl border border-gray-200 max-w-3xl mx-auto mt-6">

        <h2 class="text-2xl font-bold text-gray-800 mb-4">➕ Tambah Data Siswa</h2>

        <form action="{{ route('siswa.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @csrf

            {{-- Kolom 1 --}}
            <div class="space-y-4">
                <div>
                    <label class="block mb-1 font-medium">NISN</label>
                    <input type="text" name="nisn" value="{{ old('nisn') }}" class="w-full border rounded px-3 py-2 focus:ring focus:ring-indigo-300" required>
                    @error('nisn')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block mb-1 font-medium">NIK</label>
                    <input type="text" name="nik" value="{{ old('nik') }}" class="w-full border rounded px-3 py-2 focus:ring focus:ring-indigo-300" required>
                    @error('nik')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block mb-1 font-medium">Nama Lengkap</label>
                    <input type="text" name="nama" value="{{ old('nama') }}" class="w-full border rounded px-3 py-2 focus:ring focus:ring-indigo-300" required>
                    @error('nama')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block mb-1 font-medium">Kelas</label>
                    <input type="text" name="kelas" value="{{ old('kelas') }}" class="w-full border rounded px-3 py-2 focus:ring focus:ring-indigo-300" required>
                    @error('kelas')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                </div>
            </div>

            {{-- Kolom 2 --}}
            <div class="space-y-4">
                <div>
                    <label class="block mb-1 font-medium">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" class="w-full border rounded px-3 py-2 focus:ring focus:ring-indigo-300" required>
                    @error('tempat_lahir')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block mb-1 font-medium">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="w-full border rounded px-3 py-2 focus:ring focus:ring-indigo-300" required>
                    @error('tanggal_lahir')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block mb-1 font-medium">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="w-full border rounded px-3 py-2 focus:ring focus:ring-indigo-300" required>
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block mb-1 font-medium">Alamat</label>
                    <textarea name="alamat" rows="3" class="w-full border rounded px-3 py-2 focus:ring focus:ring-indigo-300">{{ old('alamat') }}</textarea>
                    @error('alamat')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                </div>
            </div>

            {{-- Kolom 3 --}}
            <div class="space-y-4">
                <div>
                    <label class="block mb-1 font-medium">Nama Ayah</label>
                    <input type="text" name="nama_ayah" value="{{ old('nama_ayah') }}" class="w-full border rounded px-3 py-2 focus:ring focus:ring-indigo-300">
                    @error('nama_ayah')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block mb-1 font-medium">Nama Ibu</label>
                    <input type="text" name="nama_ibu" value="{{ old('nama_ibu') }}" class="w-full border rounded px-3 py-2 focus:ring focus:ring-indigo-300">
                    @error('nama_ibu')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block mb-1 font-medium">Nama Wali</label>
                    <input type="text" name="nama_wali" value="{{ old('nama_wali') }}" class="w-full border rounded px-3 py-2 focus:ring focus:ring-indigo-300">
                    @error('nama_wali')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                </div>
            </div>

            {{-- Tombol --}}
            <div class="col-span-1 md:col-span-3 flex justify-between mt-6">
                <a href="{{ route('siswa.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Simpan</button>
            </div>
        </form>
    </div>
</x-app-layout>