<div
    x-data="{ animate: false }"
    x-init="setTimeout(() => animate = true, 100)"
    x-bind:class="animate ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-5'"
    class="transition-all duration-700 ease-out p-5 liquid-table">

    {{-- Toolbar Actions --}}
    <x-toolbar-action
        :create-route="route('users.create')"
        :export-route="route('users.export')"
        :import-route="route('users.import')" />

    {{-- Responsive Table --}}
    <div class="overflow-x-auto w-full liquid-table">
        <table class="min-w-full text-sm text-gray-900 table-auto border-collapse">
            <thead class="text-center bg-transparant">
                <tr>
                    <th class="px-3 py-2 whitespace-nowrap">No</th>
                    <th class="px-3 py-2 whitespace-nowrap">Nama User</th>
                    <th class="px-3 py-2 whitespace-nowrap">Email</th>
                    <th class="px-3 py-2 whitespace-nowrap">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($users as $user)
                <tr class="hover:bg-white/20">
                    <td class="px-3 py-2 text-center">{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td>
                    <td class="px-3 py-2 text-left">{{ $user->name }}</td>
                    <td class="px-3 py-2 text-center">{{ $user->email }}</td>
                    <td class="px-3 py-2 flex justify-center space-x-2">
                        <x-action-buttons
                            :edit-url="route('users.edit',$user->id)"
                            :delete-url="route('users.destroy',$user->id)" />
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-6 flex justify-center">
        {{ $users->links('components.pagination') }}
    </div>
</div>