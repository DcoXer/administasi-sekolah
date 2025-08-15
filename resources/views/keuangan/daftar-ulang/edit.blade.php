<x-app-layout>
    <div class="py-6">
        <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
            <form method="POST" action="{{ route('daftar-ulang.update', $data->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block">Nama Siswa</label>
                    <input type="text" name="nama_siswa" value="{{ old('nama_siswa', $data->nama_siswa) }}"
                        class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block">Tahun Ajaran</label>
                    <input type="text" name="tahun_ajaran" value="{{ old('tahun_ajaran', $data->tahun_ajaran) }}"
                        class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block">Jumlah Pembayaran</label>
                    <input type="text" name="tahun_ajaran" value="{{ old('jumlah', $data->jumlah) }}"
                        class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block">Tanggal Pembayaran</label>
                    <input type="text" name="tanggal_bayar" value="{{ old('tanggal_bayar', $data->tanggal_bayar) }}"
                        class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block">Status</label>
                    <select name="status" class="w-full border rounded px-3 py-2" required>
                        <option value="sudah" {{ $data->status == 'sudah' ? 'selected' : '' }}>Sudah Bayar</option>
                        <option value="belum" {{ $data->status == 'belum' ? 'selected' : '' }}>Belum Bayar</option>
                    </select>
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">Update</button>
                    <a href="{{ route('daftar-ulang.index') }}"
                        class="ml-2 text-gray-600 hover:underline">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>