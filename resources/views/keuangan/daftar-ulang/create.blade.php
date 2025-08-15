<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800">Input Pembayaran Daftar Ulang</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('daftar-ulang.store') }}"
            x-data="{ isSubmitting: false }" @submit="isSubmitting = true"
            class="bg-white p-6 rounded-2xl shadow-md space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Dropdown Kelas -->
                <div>
                    <label for="kelas-select" class="block text-sm font-medium text-gray-700 mb-1">Pilih Kelas</label>
                    <select id="kelas-select" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-none">
                        <option value="">-- Pilih Kelas --</option>
                        @foreach($kelas as $k)
                        <option value="{{ $k->kelas }}">{{ $k->kelas }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Dropdown Nama Siswa -->
                <div>
                    <label for="siswa-select" class="block text-sm font-medium text-gray-700 mb-1">Nama Siswa</label>
                    <select name="nama_siswa" id="siswa-select"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-none" disabled>
                        <option value="">-- Pilih Siswa --</option>
                        {{-- options akan diisi via JS --}}
                    </select>
                </div>

                <div>
                    <label for="tahun" class="block text-sm font-medium text-gray-700 mb-1">Tahun Ajaran</label>
                    <input id="tahun" type="text" name="tahun" placeholder="2025"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-none">
                </div>

                <div>
                    <label for="nominal" class="block text-sm font-medium text-gray-700 mb-1">Jumlah (Rp)</label>
                    <input id="nominal" type="number" name="nominal"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-none">
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="">-- Pilih Status --</option>
                        <option value="sudah_bayar">Sudah</option>
                        <option value="belum_bayar">Belum</option>
                    </select>
                </div>

            </div>

            <div class="flex justify-between items-center pt-4">
                <x-back-button />
                <button type="submit"
                    :disabled="isSubmitting"
                    class="bg-green-600 hover:bg-green-700 transition-all text-white px-6 py-2 rounded-lg font-semibold shadow-md"
                    :class="isSubmitting ? 'opacity-50 cursor-not-allowed' : ''">
                    Simpan
                </button>
            </div>

        </form>
    </div>

    <!-- Include jQuery & Select2 CSS/JS dari CDN -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @php
    $siswaOptions = $siswa->map(function($s) {
    return [
    'id' => $s->id,
    'nama' => $s->nama,
    'kelas' => $s->kelas,
    ];
    });
    @endphp
    <script>
        $(document).ready(function() {
            // Data siswa di-parse dari PHP ke JS
            const siswaOptions = @json($siswaOptions);

            // Inisialisasi select2 untuk dropdown siswa
            $('#siswa-select').select2({
                placeholder: "-- Pilih Siswa --",
                allowClear: true,
                width: '100%',
            });

            // Disable dropdown siswa awalnya
            $('#siswa-select').prop('disabled', true);

            $('#kelas-select').on('change', function() {
                const selectedKelas = $(this).val();

                if (!selectedKelas) {
                    // Kalau belum pilih kelas, disable dan kosongkan dropdown siswa
                    $('#siswa-select').empty().append('<option></option>').val(null).trigger('change');
                    $('#siswa-select').prop('disabled', true);
                    return;
                }

                // Enable dropdown siswa
                $('#siswa-select').prop('disabled', false);

                // Filter siswa sesuai kelas
                const filteredSiswa = siswaOptions.filter(s => s.kelas === selectedKelas);

                // Kosongkan dulu option dropdown siswa
                $('#siswa-select').empty().append('<option></option>');

                // Tambahkan opsi yang sesuai kelas
                filteredSiswa.forEach(s => {
                    const newOption = new Option(s.nama, s.id, false, false);
                    $('#siswa-select').append(newOption);
                });

                // Refresh select2
                $('#siswa-select').val(null).trigger('change');
            });
        });
    </script>
</x-app-layout>