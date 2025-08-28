<header
    x-bind:class="animate ? 'opacity-100 translate-y-0' : 'opacity-0 -translate-y-5'"
    class="fixed top-0 left-0 right-0 h-16 
               bg-gradient-to-r from-white/10 via-white/5 to-white/10
               backdrop-blur-2xl border-b border-white/30
               shadow-[0_4px_30px_rgba(0,0,0,0.1)]
               z-50 flex items-center justify-between px-6
               transition-all duration-700 ease-out opacity-0 -translate-y-5
               animate-float-slow">

    <!-- Toggle Liquid -->
    <button @click="open = !open"
        class="flex items-center justify-center w-10 h-10 rounded-xl
           bg-white/20 backdrop-blur-lg border border-white/30
           text-grey-400 shadow-lg hover:shadow-lg hover:scale-110
           active:scale-95 transition-all duration-300">
        <svg class="w-6 h-6 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path :d="open ? 'M6 18L18 6M6 6l12 12' : 'M4 6h16M4 12h16M4 18h16'" />
        </svg>
    </button>


    <a href="{{ route('dashboard')}}"
        class="ml-3 text-lg md:text-xl md:ml-0 font-extrabold tracking-wider 
          text-gray-700">
        Sistem Administrasi Sekolah
    </a>

    <!-- User -->
    <div class="relative" @click.away="userMenu=false">
        <button @click="userMenu = !userMenu" class="flex items-center gap-2 px-2 md:px-3 py-1 rounded-full hover:bg-white/30 transition">
            <img src="{{ Auth::user()->profile_photo ? asset('storage/profile/' . Auth::user()->profile_photo) : asset('default-avatar.png') }}"
                class="w-8 h-8 md:w-9 md:h-9 rounded-full border border-white/40 shadow-md object-cover">
            <span class="hidden sm:inline text-xs md:text-sm font-extrabold tracking-wider 
                         text-gray-700">{{ Auth::user()->name }}</span>
            <svg class="w-4 h-4 text-gray-600 transition-transform duration-300" :class="userMenu ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M6 9l6 6 6-6" />
            </svg>
        </button>

        <div x-show="userMenu" x-transition.scale.origin.top.right
            class="absolute right-0 mt-2 w-48 bg-white backdrop-blur-xl border border-white/40 shadow-2xl rounded-lg overflow-hidden">
            <a href="{{ route('profile.edit') }}" class="px-4 py-2 hover:bg-indigo-50 flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                Profil</a>
            <form method="POST" action="{{ route('logout') }}">@csrf
                <button class="w-full text-left px-4 py-2 hover:bg-red-50 text-red-600 flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                    </svg>
                    Logout</button>
            </form>
        </div>
    </div>
</header>