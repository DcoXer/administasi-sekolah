@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-xl font-bold mb-4">Siswa Kelas {{ $kelas }}</h2>

    <a href="{{ route('kelas.index') }}" class="text-sm text-blue-600 hover:underline mb-4 inline-block">← Kembali ke daftar kelas</a>

    <table class="table-auto w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 border">No</th>
                <th class="px-4 py-2 border">Nama</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($siswas as $index => $siswa)
                <tr>
                    <td class="px-4 py-2 border text-center">{{ $index + 1 }}</td>
                    <td class="px-4 py-2 border">{{ $siswa->nama }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="px-4 py-2 border text-center">Tidak ada siswa di kelas ini.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
