<div x-data="{ animate: false }" x-init="setTimeout(()=>animate=true,100)"
    x-bind:class="animate ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-5'"
    class="transition-all duration-700 ease-out bg-white/80 backdrop-blur-xl shadow-2xl rounded-xl border border-gray-200 p-6 max-w-xl mx-auto opacity-0 translate-y-5">

    {{-- ✅ Alert --}}
    @if (session('success'))
    <div class="p-3 bg-green-100 text-green-800 rounded mb-3 shadow">{{ session('success') }}</div>
    @endif

    {{-- ✅ Preview Foto --}}
    <div class="flex flex-col items-center mb-4">
        <div class="relative w-28 h-28">
            <img src="{{ Auth::user()->profile_photo ? asset('storage/profile/'.Auth::user()->profile_photo) : asset('default-avatar.png') }}"
                class="w-28 h-28 rounded-full object-cover border-4 border-white shadow-lg"
                wire:ignore
                id="previewImage">
            <label for="photo" class="absolute bottom-1 right-1 bg-indigo-600 p-2 rounded-full cursor-pointer hover:bg-indigo-700 shadow">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M12 4v16m8-8H4" />
                </svg>
            </label>
        </div>
    </div>

    {{-- ✅ Form --}}
    <form wire:submit.prevent="save" class="space-y-3" enctype="multipart/form-data">
        <input type="file" id="photo" wire:model="photo" class="hidden" onchange="previewFile(event)">

        <div>
            <label class="block text-sm text-gray-600">Nama</label>
            <input type="text" wire:model="name" class="w-full px-3 py-2 border rounded-lg shadow-sm focus:ring focus:ring-indigo-200">
            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm text-gray-600">Email</label>
            <input type="email" wire:model="email" class="w-full px-3 py-2 border rounded-lg shadow-sm focus:ring focus:ring-indigo-200">
            @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-lg shadow hover:bg-indigo-700 transition">💾 Simpan Perubahan</button>
    </form>
</div>

<script>
    function previewFile(event) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewImage').src = e.target.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>