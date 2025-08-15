<x-app-layout>
    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                {{-- Kartu: Pembayaran Daftar Ulang --}}
                <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition">
                    <h3 class="text-lg font-semibold text-gray-700 text-center mb-6">Pembayaran Daftar Ulang</h3>
                    <a href="{{ route('daftar-ulang.index') }}"
                        class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-lg transition">
                        Input Data Disini
                    </a>
                </div>

                {{-- Kartu: Pembayaran SPP --}}
                <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition">
                    <h3 class="text-lg font-semibold text-gray-700 text-center mb-6">Pembayaran Bulanan SPP</h3>
                    <a href="{{ route('pembayaran-spp.index') }}"
                        class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-lg transition">
                        Input Data Disini
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>