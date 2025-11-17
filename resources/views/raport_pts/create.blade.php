<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Input Data Raport PTS') }}
        </h2>
    </x-slot>
<div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 rounded-2xl shadow-md p-8 mt-10">
    <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Input Data Raport PTS</h2>

    <form action="{{ route('raport-pts.store') }}" method="POST">
        @csrf

        {{-- Pilih Siswa --}}
        <div class="mb-4">
            <label for="siswa_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Siswa</label>
            <select name="siswa_id" id="siswa_id" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                <option value="">-- Pilih Siswa --</option>
                @foreach ($siswas as $siswa)
                    <option value="{{ $siswa->id }}">{{ $siswa->nama_siswa }} - {{ $siswa->kelas->nama_kelas ?? '' }}</option>
                @endforeach
            </select>
        </div>

        {{-- Kepribadian --}}
        <h3 class="text-lg font-semibold text-gray-700 dark:text-white mt-6 mb-2">A. Kepribadian</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="kelakuan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kelakuan</label>
                <select name="kelakuan" id="kelakuan" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm dark:bg-gray-700 dark:text-white">
                    <option value="Baik">Baik</option>
                    <option value="Cukup">Cukup</option>
                    <option value="Kurang">Kurang</option>
                </select>
            </div>

            <div>
                <label for="kerajinan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kerajinan</label>
                <select name="kerajinan" id="kerajinan" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm dark:bg-gray-700 dark:text-white">
                    <option value="Baik">Baik</option>
                    <option value="Cukup">Cukup</option>
                    <option value="Kurang">Kurang</option>
                </select>
            </div>

            <div>
                <label for="kerapian" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kerapian</label>
                <select name="kerapian" id="kerapian" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm dark:bg-gray-700 dark:text-white">
                    <option value="Baik">Baik</option>
                    <option value="Cukup">Cukup</option>
                    <option value="Kurang">Kurang</option>
                </select>
            </div>
        </div>

        {{-- Absensi --}}
        <h3 class="text-lg font-semibold text-gray-700 dark:text-white mt-6 mb-2">B. Absensi</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="sakit" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Sakit (hari)</label>
                <input type="number" name="sakit" id="sakit" min="0" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm dark:bg-gray-700 dark:text-white" />
            </div>
            <div>
                <label for="izin" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Izin (hari)</label>
                <input type="number" name="izin" id="izin" min="0" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm dark:bg-gray-700 dark:text-white" />
            </div>
            <div>
                <label for="tanpa_keterangan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanpa Keterangan (hari)</label>
                <input type="number" name="tanpa_keterangan" id="tanpa_keterangan" min="0" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm dark:bg-gray-700 dark:text-white" />
            </div>
        </div>

        {{-- Catatan --}}
        <h3 class="text-lg font-semibold text-gray-700 dark:text-white mt-6 mb-2">C. Catatan untuk Orang Tua/Wali</h3>
        <textarea name="catatan" id="catatan" rows="3" class="w-full border-gray-300 rounded-lg shadow-sm dark:bg-gray-700 dark:text-white"></textarea>

        {{-- Tombol --}}
        <div class="mt-6 flex justify-end">
            <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow">
                Simpan Data Raport
            </button>
        </div>
    </form>
</div>
</x-app-layout>
