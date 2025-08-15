<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 leading-tight">
            Edit Data Guru
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8 bg-white p-6 shadow-md rounded">

            @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-700 p-4 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('guru.update', $guru) }}" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="nama" value="{{ $guru->nama }}" class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">NIP</label>
                    <input type="text" name="nip" value="{{ $guru->nip }}" class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" value="{{ old('jabatan', $guru->jabatan ?? '') }}" class="w-full border rounded p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Mata Pelajaran</label>
                    <input type="text" name="mapel" value="{{ $guru->mapel }}" class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="w-full border rounded px-3 py-2">
                        <option value="">-- Pilih --</option>
                        <option value="L" @if($guru->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                        <option value="P" @if($guru->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">No HP</label>
                    <input type="text" name="no_hp" value="{{ $guru->no_hp }}" class="w-full border rounded px-3 py-2">
                </div>

                <div class="text-right">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded transition">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>