@if ($paginator->hasPages())
<nav role="navigation" aria-label="Pagination" class="flex items-center justify-center space-x-2 text-sm select-none">

    {{-- Prev --}}
    @if ($paginator->onFirstPage())
    <span class="px-4 py-2 rounded-full bg-gray-200 text-gray-400 cursor-not-allowed shadow-inner">⟨</span>
    @else
    <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 rounded-full bg-gradient-to-r from-indigo-100 to-blue-100 text-indigo-700 font-semibold shadow transition transform hover:-translate-y-0.5 hover:shadow-lg hover:from-indigo-200 hover:to-blue-200 relative overflow-hidden group">
        <span class="absolute inset-0 bg-indigo-400 opacity-0 group-hover:opacity-10 transition duration-500 rounded-full"></span>⟨
    </a>
    @endif

    {{-- Pages --}}
    @foreach ($elements as $element)
    @if (is_string($element))
    <span class="px-4 py-2 text-gray-400">...</span>
    @endif

    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <span class="px-4 py-2 rounded-full bg-indigo-600 text-white font-bold shadow-lg transform scale-110 animate-pulse">{{ $page }}</span>
    @else
    <a href="{{ $url }}" class="px-4 py-2 rounded-full bg-white border border-gray-300 hover:bg-indigo-50 text-gray-700 font-semibold shadow transition transform hover:-translate-y-0.5 hover:shadow-lg relative overflow-hidden group">
        <span class="absolute inset-0 bg-indigo-200 opacity-0 group-hover:opacity-10 transition duration-500 rounded-full"></span>{{ $page }}
    </a>
    @endif
    @endforeach
    @endif
    @endforeach

    {{-- Next --}}
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 rounded-full bg-gradient-to-r from-indigo-100 to-blue-100 text-indigo-700 font-semibold shadow transition transform hover:-translate-y-0.5 hover:shadow-lg hover:from-indigo-200 hover:to-blue-200 relative overflow-hidden group">
        <span class="absolute inset-0 bg-indigo-400 opacity-0 group-hover:opacity-10 transition duration-500 rounded-full"></span>⟩
    </a>
    @else
    <span class="px-4 py-2 rounded-full bg-gray-200 text-gray-400 cursor-not-allowed shadow-inner">⟩</span>
    @endif
</nav>
@endif