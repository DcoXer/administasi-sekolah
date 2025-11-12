<x-app-layout>
    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8 liquid-table">

            @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-700 p-4 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
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

        </div>
    </div>
</x-app-layout>