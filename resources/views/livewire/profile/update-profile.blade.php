<div class="max-w-lg mx-auto liquid-table p-6">
    <h2 class="text-xl text-center font-bold mb-4">Update Profil</h2>

    @if (session('success'))
    <div class="mb-4 p-3 text-green-800 bg-green-100 rounded">
        {{ session('success') }}
    </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-4">
        {{-- Foto Profil --}}
        <div>
            <label class="block font-medium">Foto Profil</label>
            @if(Auth::user()->profile_photo)
            <img src="{{ Storage::url('profile/' . Auth::user()->profile_photo) }}"
                class="w-24 h-24 rounded-full object-cover mb-2">
            @endif
            @if ($photo)
            <p class="text-sm text-gray-500 mb-1">Preview foto baru:</p>
            <img src="{{ $photo->temporaryUrl() }}" class="w-24 h-24 rounded-full object-cover mb-2">
            @endif
            <input type="file" wire:model="photo" class="mt-1 block w-full">
            @error('photo') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Nama --}}
        <div>
            <label class="block font-medium">Nama</label>
            <input type="text" wire:model="name" class="mt-1 block w-full border rounded p-2">
            @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Email --}}
        <div>
            <label class="block font-medium">Email</label>
            <input type="email" wire:model="email" class="mt-1 block w-full border rounded p-2">
            @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Tombol --}}
        <div class="justify-between flex">
            <x-back-button/>
            <button type="submit"
                class="bg-blue-600 text-white px-6 py-3 rounded-2xl hover:bg-blue-700">
                Simpan
            </button>
        </div>
    </form>
</div>