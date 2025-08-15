<x-app-layout>
    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div
                x-data="{ animate: false }"
                x-init="setTimeout(() => animate = true, 100)"
                x-bind:class="animate ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-5'"
                class="transition-all duration-700 ease-out bg-white/80 backdrop-blur-xl shadow-2xl rounded-xl border border-gray-200 p-6 opacity-0 translate-y-5">

                <h1 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                    <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Guru
                </h1>

                {{-- ✅ Error Handling --}}
                @if ($errors->any())
                <div class="mb-4 bg-red-100 text-red-700 p-4 rounded-lg shadow">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- ✅ Form Create Guru --}}
                <form x-data="{ isSubmitting: false }" @submit="isSubmitting = true"
                    action="{{ route('guru.store') }}" method="POST"
                    class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @csrf

                    {{-- Nama --}}
                    <div>
                        <label class="block mb-1 font-medium text-gray-700">Nama</label>
                        <input type="text" name="nama" required
                            class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-green-300 focus:border-green-500">
                    </div>

                    {{-- NIP --}}
                    <div>
                        <label class="block mb-1 font-medium text-gray-700">NIP</label>
                        <input type="text" name="nip"
                            class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-green-300 focus:border-green-500">
                    </div>

                    {{-- Jabatan --}}
                    <div>
                        <label class="block mb-1 font-medium text-gray-700">Jabatan</label>
                        <input type="text" name="jabatan"
                            class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-green-300 focus:border-green-500">
                    </div>

                    {{-- Mata Pelajaran --}}
                    <div>
                        <label class="block mb-1 font-medium text-gray-700">Mata Pelajaran</label>
                        <input type="text" name="mapel"
                            class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-green-300 focus:border-green-500">
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div>
                        <label class="block mb-1 font-medium text-gray-700">Jenis Kelamin</label>
                        <select name="jenis_kelamin"
                            class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-green-300 focus:border-green-500">
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    {{-- No HP --}}
                    <div>
                        <label class="block mb-1 font-medium text-gray-700">No HP</label>
                        <input type="text" name="no_hp"
                            class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-green-300 focus:border-green-500">
                    </div>

                    {{-- Tombol Simpan --}}
                    <div class="md:col-span-2 flex justify-end mt-4">
                        <a href="{{ route('guru.index') }}"
                            class="flex items-center gap-2 bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg shadow transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M15 19l-7-7 7-7" />
                            </svg>
                            Kembali
                        </a>
                        <button type="submit"
                            :disabled="isSubmitting"
                            class="ml-3 flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg shadow transition"
                            :class="isSubmitting ? 'opacity-50 cursor-not-allowed' : ''">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M12 4v16m8-8H4" />
                            </svg>
                            Simpan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>