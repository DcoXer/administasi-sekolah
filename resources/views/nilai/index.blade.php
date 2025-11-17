<x-app-layout>
    <div class="p-8 max-w-6xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Input Nilai Siswa</h1>

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if ($guruBidangs->isEmpty())
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-8 text-center">
                <p class="text-gray-600">Anda belum ditugaskan untuk mengajar bidang studi apapun.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($guruBidangs as $guruBidang)
                    <div class="bg-white rounded-lg shadow border border-gray-200 p-6 hover:shadow-lg transition">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $guruBidang->bidang->nama_bidang }}</h3>
                        <p class="text-sm text-gray-600 mb-4">
                            <span class="font-semibold">Kelas:</span> {{ $guruBidang->kelas }}<br>
                            <span class="font-semibold">Kode:</span> {{ $guruBidang->bidang->kode_bidang }}
                        </p>
                        <a href="{{ route('nilai.input', $guruBidang->id) }}" class="block text-center bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                            Input Nilai
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
