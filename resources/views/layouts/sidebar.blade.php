<!-- SIDEBAR -->
<aside :class="open ? 'translate-x-0 w-64' : '-translate-x-48 w-20'"
    class="fixed top-16 left-0 h-[calc(100vh-4rem)] 
               bg-gradient-to-r from-white/10 via-white/5 to-white/10
               backdrop-blur-2xl border-b border-white/30
               shadow-[0_4px_30px_rgba(0,0,0,0.1)] z-40 overflow-y-auto transition-all duration-500 ease-in-out">

    <nav class="p-4 space-y-3 font-medium text-gray-700">

        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}"
            class="flex items-center p-3 rounded-lg bg-white/40 hover:bg-blue-100 
                       shadow-sm transition-all duration-300 hover:scale-[1.02]">
            <svg class="w-5 h-5 text-indigo-600 transform transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M3 12l2-2m7-7l7 7-7 7-7-7z" />
            </svg>
            <span x-show="open" x-transition class="ml-3">Dashboard</span>
        </a>

        @if(Auth::user()->role === 'staff_keuangan')
        <a href="{{ route('keuangan.index') }}"
            class="flex items-center p-3 rounded-lg bg-white/40 hover:bg-white/60 
                       shadow-sm transition-all duration-300 hover:scale-[1.02]">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-green-600 transform transition-transform duration-300"">
                <path stroke-linecap=" round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
            </svg>
            <span x-show="open" x-transition class="ml-3">Pengelolaan Keuangan</span>
        </a>
        @endif

        <!-- Dropdown Siswa -->
        <div x-data="{ siswaOpen: false }">
            <button @click="siswaOpen = !siswaOpen"
                class="flex items-center w-full p-3 rounded-lg hover:bg-indigo-100 shadow-sm transition-all duration-300 hover:scale-[1.02]">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                </svg>
                <span x-show="open" class="ml-3">Siswa</span>
                <svg x-show="open" :class="siswaOpen ? 'rotate-90' : ''"
                    class="w-4 h-4 ml-auto transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M9 5l7 7-7 7" />
                </svg>
            </button>
            <div x-show="siswaOpen" x-transition.scale.opacity class="ml-10 space-y-1">
                <a href="{{ route('siswa.public') }}" class="block py-2 text-sm hover:text-indigo-700">Daftar Siswa</a>
                @if(Auth::user()->role === 'operator')
                <a href="{{ route('siswa.index') }}" class="block py-2 text-sm hover:text-indigo-700">Manajemen Siswa</a>
                @endif
            </div>
        </div>

        <!-- Dropdown Guru -->
        <div x-data="{ guruOpen: false }">
            <button @click="guruOpen = !guruOpen"
                class="flex items-center w-full p-3 rounded-lg hover:bg-purple-100 shadow-sm transition-all duration-300 hover:scale-[1.02]">
                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M4 19V7a2 2 0 012-2h12a2 2 0 012 2v12" />
                </svg>
                <span x-show="open" class="ml-3">Guru</span>
                <svg x-show="open" :class="guruOpen ? 'rotate-90' : ''"
                    class="w-4 h-4 ml-auto transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M9 5l7 7-7 7" />
                </svg>
            </button>
            <div x-show="guruOpen" x-transition.scale.opacity class="ml-10 space-y-1">
                <a href="{{ route('guru.public') }}" class="block py-2 text-sm hover:text-purple-700">Daftar Guru</a>
                @if(Auth::user()->role === 'operator')
                <a href="{{ route('guru.index') }}" class="block py-2 text-sm hover:text-purple-700">Manajemen Guru</a>
                @endif
            </div>
        </div>

    </nav>
</aside>