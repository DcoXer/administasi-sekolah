<div x-data="{ animate: false }"
    x-init="setTimeout(() => animate = true, 100)"
    x-bind:class="animate ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-5'"
    class="transition-all duration-700 ease-out p-5 mb-8 liquid-table">

    @if (session()->has('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-4 text-sm text-gray-900">
        <div>
            <label class="block text-sm mb-1 font-medium text-gray-600">Pilih Siswa</label>
            <select wire:model="siswa_id" class="w-full rounded border border-gray-300 bg-gray-50 text-gray-900 p-2 focus:ring-transparent">
                <option value="">-- Pilih Siswa --</option>
                @foreach ($siswas as $s)
                    <option value="{{ $s->id }}">{{ $s->nama }}</option>
                @endforeach
            </select>
            @error('siswa_id')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-sm mb-1 font-medium text-gray-600">Alasan Mutasi</label>
            <textarea wire:model="alasan" class="w-full rounded border border-gray-300 bg-gray-50 text-gray-900 p-2 focus:ring-transparent" rows="3"></textarea>
            @error('alasan')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-sm mb-1 font-medium text-gray-600">Tujuan Sekolah</label>
            <input wire:model="tujuan_sekolah" type="text" class="w-full rounded border border-gray-300 bg-gray-50 text-gray-900 p-2 focus:ring-transparent" />
            @error('tujuan_sekolah')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-end pt-2">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition duration-200 shadow-sm">
                Kirim Pengajuan
            </button>
        </div>
    </form>
</div>
