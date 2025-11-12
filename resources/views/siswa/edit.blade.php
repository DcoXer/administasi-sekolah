<x-app-layout>
    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 bg-white p-6 shadow-md rounded">

            <!-- ✅ Alert Error -->
            @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-700 p-4 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- ✅ Form Edit -->
            <form method="POST" action="{{ route('siswa.update', $siswa->id) }}" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                <h2 class="text-xl font-semibold text-gray-800 mb-4">Edit Data Siswa</h2>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="nama" value="{{ old('nama', $siswa->nama) }}" class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">NISN</label>
                    <input type="text" name="nisn" value="{{ old('nisn', $siswa->nisn) }}" class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Kelas</label>
                    <input type="text" name="kelas" value="{{ old('kelas', $siswa->kelas) }}" class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200" required>
                        <option value="Laki-laki" {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Alamat</label>
                    <textarea name="alamat" rows="3" class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">{{ old('alamat', $siswa->alamat) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Foto Siswa (Opsional)</label>
                    <input type="file" name="foto" class="w-full border rounded px-3 py-2">
                    @if($siswa->foto)
                    <img src="{{ asset('storage/siswa/'.$siswa->foto) }}" class="w-20 mt-2 rounded shadow border">
                    @endif
                </div>

                <!-- ✅ Tombol Aksi -->
                <div class="flex justify-between items-center pt-4">
                    <a href="{{ route('siswa.index') }}"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-5 py-2 rounded transition">
                        Kembali
                    </a>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded transition">
                        Simpan Perubahan
                    </button>
                </div>

            </form>

        </div>
    </div>
</x-app-layout>