<x-app-layout>
<<<<<<< HEAD
    <div class="py-6">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="liquid-card">
                <div class="mb-8 pb-4 border-b border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-800">Tambah Data Siswa</h2>
                    <p class="text-sm text-gray-600 mt-1">Lengkapi form di bawah untuk menambahkan data siswa baru</p>
                </div>

                <x-alert-success />
                <x-alert-error />
                
                @if ($errors->any())
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded-lg">
                    <p class="font-semibold mb-2">Terdapat kesalahan pada form:</p>
                    <ul class="list-disc list-inside space-y-1 text-sm">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
=======
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
>>>>>>> 7881684e027466948b9fc35eb8f243bc2c31e810
                </div>
                @endif

<<<<<<< HEAD
                <form action="{{ route('siswa.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        {{-- Kolom 1 --}}
                        <div class="space-y-5">
                            <div>
                                <label class="block mb-2 font-semibold text-sm text-gray-700">NISN <span class="text-red-500">*</span></label>
                                <input type="text" name="nisn" value="{{ old('nisn') }}" 
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                    placeholder="Masukkan NISN" required>
                                @error('nisn')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block mb-2 font-semibold text-sm text-gray-700">NIK <span class="text-red-500">*</span></label>
                                <input type="text" name="nik" value="{{ old('nik') }}" 
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                    placeholder="Masukkan NIK" required>
                                @error('nik')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block mb-2 font-semibold text-sm text-gray-700">Nama Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" name="nama_siswa" value="{{ old('nama_siswa') }}" 
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                    placeholder="Masukkan nama lengkap" required>
                                @error('nama_siswa')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block mb-2 font-semibold text-sm text-gray-700">Kelas <span class="text-red-500">*</span></label>
                                <select name="kelas_id" 
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                    required>
                                    <option value="">-- Pilih Kelas --</option>
                                    @foreach(\App\Models\Kelas::all() as $kelas)
                                        <option value="{{ $kelas->id }}" {{ old('kelas_id') == $kelas->id ? 'selected' : '' }}>
                                            {{ $kelas->nama_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('kelas_id')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        {{-- Kolom 2 --}}
                        <div class="space-y-5">
                            <div>
                                <label class="block mb-2 font-semibold text-sm text-gray-700">Tempat Lahir <span class="text-red-500">*</span></label>
                                <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" 
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                    placeholder="Masukkan tempat lahir" required>
                                @error('tempat_lahir')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block mb-2 font-semibold text-sm text-gray-700">Tanggal Lahir <span class="text-red-500">*</span></label>
                                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" 
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                    required>
                                @error('tanggal_lahir')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block mb-2 font-semibold text-sm text-gray-700">Jenis Kelamin <span class="text-red-500">*</span></label>
                                <select name="jenis_kelamin" 
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                    required>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block mb-2 font-semibold text-sm text-gray-700">Alamat</label>
                                <textarea name="alamat" rows="3" 
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 resize-none" 
                                    placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
                                @error('alamat')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        {{-- Kolom 3 --}}
                        <div class="space-y-5">
                            <div>
                                <label class="block mb-2 font-semibold text-sm text-gray-700">Nama Ayah</label>
                                <input type="text" name="nama_ayah" value="{{ old('nama_ayah') }}" 
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                    placeholder="Masukkan nama ayah">
                                @error('nama_ayah')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block mb-2 font-semibold text-sm text-gray-700">Nama Ibu</label>
                                <input type="text" name="nama_ibu" value="{{ old('nama_ibu') }}" 
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                    placeholder="Masukkan nama ibu">
                                @error('nama_ibu')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block mb-2 font-semibold text-sm text-gray-700">Nama Wali</label>
                                <input type="text" name="nama_wali" value="{{ old('nama_wali') }}" 
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                    placeholder="Masukkan nama wali (jika ada)">
                                @error('nama_wali')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                            </div>
                        </div>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="flex justify-end gap-3 pt-6 border-t border-gray-200 mt-8">
                        <a href="{{ route('siswa.index') }}" 
                            class="inline-flex items-center justify-center px-6 py-2.5 bg-white border border-gray-300 rounded-lg font-semibold text-sm text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 shadow-sm hover:shadow">
                            Batal
                        </a>
                        <button type="submit" 
                            class="inline-flex items-center justify-center px-6 py-2.5 bg-blue-600 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 active:bg-blue-800 transition-all duration-200 shadow-sm hover:shadow">
                            Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
=======
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
>>>>>>> 7881684e027466948b9fc35eb8f243bc2c31e810
    </div>
</x-app-layout>