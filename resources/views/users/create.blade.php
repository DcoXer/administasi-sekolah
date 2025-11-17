<x-app-layout>
    <div class="py-6">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="liquid-card">
                <div class="mb-8 pb-4 border-b border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-800">Tambah User Baru</h2>
                    <p class="text-sm text-gray-600 mt-1">Buat akun user baru untuk sistem administrasi sekolah</p>
                </div>

                @if ($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                    <ul class="list-disc list-inside space-y-1 text-sm">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('users.store') }}" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block mb-2 font-semibold text-sm text-gray-700">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" 
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                placeholder="Masukkan nama lengkap" required>
                        </div>

                        <div>
                            <label class="block mb-2 font-semibold text-sm text-gray-700">Email <span class="text-red-500">*</span></label>
                            <input type="email" name="email" value="{{ old('email') }}" 
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                placeholder="contoh@email.com" required>
                        </div>

                        <div>
                            <label class="block mb-2 font-semibold text-sm text-gray-700">Password <span class="text-red-500">*</span></label>
                            <input type="password" name="password" 
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                placeholder="Minimal 8 karakter" required>
                        </div>

                        <div>
                            <label class="block mb-2 font-semibold text-sm text-gray-700">Konfirmasi Password <span class="text-red-500">*</span></label>
                            <input type="password" name="password_confirmation" 
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                placeholder="Ulangi password" required>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block mb-2 font-semibold text-sm text-gray-700">Role <span class="text-red-500">*</span></label>
                            <select name="role" 
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                required>
                                <option value="">-- Pilih Role --</option>
                                <option value="operator" {{ old('role') == 'operator' ? 'selected' : '' }}>Operator</option>
                                <option value="kepala_sekolah" {{ old('role') == 'kepala_sekolah' ? 'selected' : '' }}>Kepala Sekolah</option>
                                <option value="staff_keuangan" {{ old('role') == 'staff_keuangan' ? 'selected' : '' }}>Staff Keuangan</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 pt-6 border-t border-gray-200 mt-8">
                        <a href="{{ route('users.index') }}" 
                            class="inline-flex items-center justify-center px-6 py-2.5 bg-white border border-gray-300 rounded-lg font-semibold text-sm text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 shadow-sm hover:shadow">
                            Batal
                        </a>
                        <button type="submit" 
                            class="inline-flex items-center justify-center px-6 py-2.5 bg-blue-600 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 active:bg-blue-800 transition-all duration-200 shadow-sm hover:shadow">
                            Simpan User
                        </button>
                    </div>
                </form>
            </div>
<<<<<<< HEAD
=======
            @endif

            <form method="POST" action="{{ route('users.store') }}" class="space-y-4">
                @csrf

                <h2 class="text-xl font-semibold text-gray-800 mb-3">Tambah User</h2>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                    <input type="register-password-confirm" name="password_confirmation" class="w-full border rounded px-3 py-2" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Role</label>
                    <select name="role" class="w-full border rounded px-3 py-2" required>
                        <option value="operator">Operator</option>
                        <option value="kepala_sekolah">Kepala Sekolah</option>
                        <option value="staff_keuangan">Staff Keuangan</option>
                    </select>
                </div>

                <div class="flex justify-between items-center pt-4">
                    <a href="{{ route('users.index') }}" class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded">Kembali</a>
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Simpan</button>
                </div>
            </form>

>>>>>>> 7881684e027466948b9fc35eb8f243bc2c31e810
        </div>
    </div>
</x-app-layout>