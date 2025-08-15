<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Preview Bukti Pembayaran SPP') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto bg-white p-8 rounded shadow relative">

            @if (session('success'))
            <x-alert-success :message="session('success')" />
            @endif

            {{-- Konten bukti pembayaran --}}
            @include('keuangan.spp._spp-content', ['buktiSpp' => $buktiSpp, 'qrCodeBase64' => $qrCodeBase64])

            {{-- Tombol download, tampil hanya di preview --}}
            <div class="mt-8 text-right">
                <a href="{{ route('pembayaran-spp.download', $buktiSpp->id) }}"
                    class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                    Download PDF
                </a>
            </div>
        </div>
    </div>
</x-app-layout>