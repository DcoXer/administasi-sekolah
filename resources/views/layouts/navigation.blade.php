<header
    x-bind:class="animate ? 'opacity-100 translate-y-0' : 'opacity-0 -translate-y-5'"
    :style="`transform: translateY(${scrollY * 0.1}px)`"
    class="fixed top-0 left-0 right-0 h-16 
               bg-gradient-to-r from-white/10 via-white/5 to-white/10
               backdrop-blur-2xl border-b border-white/30
               shadow-[0_4px_30px_rgba(0,0,0,0.1)]
               z-50 flex items-center justify-between px-6
               transition-all duration-700 ease-out opacity-0 -translate-y-5
               animate-float-slow">

    <!-- Toggle -->
    <button @click="open = !open"
        class="flex items-center justify-center w-10 h-10 rounded-full
                   bg-gradient-to-r from-pink-500 via-purple-500 to-indigo-500
                   text-white shadow-lg hover:shadow-pink-400/70 hover:scale-110 active:scale-95 transition-all duration-300">
        <svg class="w-6 h-6 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path :d="open ? 'M6 18L18 6M6 6l12 12' : 'M4 6h16M4 12h16M4 18h16'" />
        </svg>
    </button>

    <a href="{{ route('dashboard')}}" class="text-xl font-extrabold tracking-wider bg-gradient-to-r from-pink-400 via-purple-400 to-indigo-400 bg-clip-text text-transparent animate-gradient">
        Sistem Administrasi Sekolah
    </a>

    <!-- 👤 User -->
    <div class="relative" @click.away="userMenu=false">
        <button @click="userMenu = !userMenu" class="flex items-center gap-2 px-3 py-1 rounded-full hover:bg-white/30 transition">
            <img src="{{ Auth::user()->profile_photo ? asset('storage/profile/' . Auth::user()->profile_photo) : asset('default-avatar.png') }}"
                class="w-9 h-9 rounded-full border border-white/40 shadow-md object-cover">
            <span class="text-xs font-extrabold tracking-wider bg-gradient-to-r from-pink-400 via-purple-400 to-indigo-400 bg-clip-text text-transparent animate-gradient">{{ Auth::user()->name }}</span>
            <svg class="w-4 h-4 text-grey-400 transition-transform duration-300" :class="userMenu ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M6 9l6 6 6-6" />
            </svg>
        </button>

        <div x-show="userMenu" x-transition.scale.origin.top.right
            class="absolute right-0 mt-2 w-48 bg-white backdrop-blur-xl border border-white/40 shadow-2xl rounded-lg overflow-hidden">
            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-indigo-50">Profil</a>
            <form method="POST" action="{{ route('logout') }}">@csrf
                <button class="w-full text-left px-4 py-2 hover:bg-red-50 text-red-600">Logout</button>
            </form>
        </div>
    </div>
</header>