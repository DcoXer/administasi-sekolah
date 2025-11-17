@if ($paginator->hasPages())
<nav role="navigation" aria-label="Pagination"
    class="flex items-center justify-center space-x-1 sm:space-x-2 text-xs sm:text-sm select-none flex-wrap">

    {{-- Prev --}}
    @if ($paginator->onFirstPage())
    <span class="px-3 sm:px-4 py-1.5 sm:py-2 rounded-full bg-gray-200 text-gray-400 cursor-not-allowed shadow-inner">⟨</span>
    @else
    <a href="{{ $paginator->previousPageUrl() }}"
        class="px-3 sm:px-4 py-1.5 sm:py-2 rounded-lg 
                  bg-blue-100 text-blue-700 
                  font-semibold shadow transition transform 
                  hover:bg-blue-200 hover:shadow-md">
        ⟨
    </a>
    @endif

    {{-- Pages --}}
    {{-- Mobile: hanya current page --}}
    <span class="block sm:hidden px-3 py-1.5 rounded-lg bg-blue-600 text-white font-bold shadow">
        {{ $paginator->currentPage() }} / {{ $paginator->lastPage() }}
    </span>

    {{-- Desktop: tampilkan semua nomor --}}
    <div class="hidden sm:flex space-x-1 sm:space-x-2">
        @foreach ($elements as $element)
        @if (is_string($element))
        <span class="px-3 sm:px-4 py-1.5 sm:py-2 text-gray-400">...</span>
        @endif

        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <span class="px-3 sm:px-4 py-1.5 sm:py-2 rounded-lg bg-blue-600 text-white font-bold shadow">
            {{ $page }}
        </span>
        @else
        <a href="{{ $url }}"
            class="px-3 sm:px-4 py-1.5 sm:py-2 rounded-lg 
                                  bg-white border border-gray-300 hover:bg-blue-50 
                                  text-gray-700 font-semibold shadow transition 
                                  hover:shadow-md">
            {{ $page }}
        </a>
        @endif
        @endforeach
        @endif
        @endforeach
    </div>

    {{-- Next --}}
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}"
        class="px-3 sm:px-4 py-1.5 sm:py-2 rounded-lg 
                  bg-blue-100 text-blue-700 
                  font-semibold shadow transition transform 
                  hover:bg-blue-200 hover:shadow-md">
        ⟩
    </a>
    @else
    <span class="px-3 sm:px-4 py-1.5 sm:py-2 rounded-full bg-gray-200 text-gray-400 cursor-not-allowed shadow-inner">⟩</span>
    @endif
</nav>
@endif