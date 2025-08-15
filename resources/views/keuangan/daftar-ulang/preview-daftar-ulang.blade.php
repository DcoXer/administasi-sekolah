<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Preview Bukti Pembayaran SPP') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto bg-white p-8 rounded shadow relative">

            {{-- Konten bukti pembayaran --}}
            @include('keuangan.daftar-ulang._daftar-ulang-content', ['buktiDaftarUlang' => $buktiDaftarUlang, 'qrCodeBase64' => $qrCodeBase64])

            {{-- Tombol download, tampil hanya di preview --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
                <x-back-button/>
                <a href="{{ route('daftar-ulang.download', $buktiDaftarUlang->id) }}"
                    class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                    Download PDF
                </a>
            </div>
        </div>
    </div>
</x-app-layout>