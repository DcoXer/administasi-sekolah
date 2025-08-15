@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-xl font-bold mb-4">Daftar Kelas</h2>
    <ul class="space-y-2">
        @foreach ($kelasList as $item)
            <li>
                <a href="{{ route('kelas.show', $item->kelas) }}"
                   class="text-blue-600 hover:underline">{{ $item->kelas }}</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
