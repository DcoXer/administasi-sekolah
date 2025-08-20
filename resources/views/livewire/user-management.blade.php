<div
    x-data="{ animate: false }"
    x-init="setTimeout(() => animate = true, 100)"
    x-bind:class="animate ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-5'"
    class="transition-all duration-700 ease-out p-5 liquid-table">

    {{-- Toolbar Actions --}}
    <div class="flex flex-wrap gap-2 mb-3 justify-between">
        <a href="{{ route('users.create') }}" class="btn-ultimate">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M12 4v16m8-8H4" />
            </svg> Tambah Users
        </a>

        <a href="{{ route('users.export') }}" class="btn-ultimate">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M4 4v16h16V4H4zm4 8h8" />
            </svg> Export Excel
        </a>

        <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data" class="flex items-center gap-2">
            @csrf
            <input type="file" name="file" required class="input-ultimate w-40">
            <button type="submit" class="btn-ultimate">Import Excel</button>
        </form>

    </div>

    <table class="min-w-full text-sm text-gray-900">
        <thead class="text-center">
            <tr>
                <th class="px-4 py-3 whitespace-nowrap">No</th>
                <th class="px-4 py-3 whitespace-nowrap">Nama User</th>
                <th class="px-4 py-3 whitespace-nowrap">Email</th>
                <th class="px-4 py-3 whitespace-nowrap">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach ($users as $user)
            <tr class="hover:bg-white/20">
                <th class="px-4 py-2">{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td>
                <th class="px-4 py-2 text-left">{{ $user->name }}</td>
                <th class="px-4 py-2">{{ $user->email }}</td>
                <th class="px-4 py-2 flex justify-center">
                    <x-action-buttons
                        :edit-url="route('users.edit',$user->id)"
                        :delete-url="route('users.destroy',$user->id)" />
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-6 flex justify-center">
        {{ $users->links('components.pagination') }}
    </div>

</div>