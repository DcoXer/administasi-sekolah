<x-app-layout>
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

            <form method="POST" action="{{ route('users.update', $user->id) }}" class="space-y-4">
                @csrf
                @method('PUT')

                <h2 class="text-xl font-semibold text-gray-800 mb-3">Edit User</h2>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Password (Kosongkan jika tidak diganti)</label>
                    <input type="password" name="password" class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Role</label>
                    <select name="role" class="w-full border rounded px-3 py-2" required>
                        <option value="operator" {{ $user->role == 'operator' ? 'selected' : '' }}>Operator</option>
                        <option value="kepala_sekolah" {{ $user->role == 'kepala_sekolah' ? 'selected' : '' }}>Kepala Sekolah</option>
                        <option value="staff_keuangan" {{ $user->role == 'staff_keuangan' ? 'selected' : '' }}>Staff Keuangan</option>
                    </select>
                </div>

                <div class="flex justify-between items-center pt-4">
                    <a href="{{ route('users.index') }}" class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded">Kembali</a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Update</button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>