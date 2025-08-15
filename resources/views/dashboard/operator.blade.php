<x-app-layout>
    <x-slot name="header">
        <h2 id="headerTitle" class="text-3xl font-extrabold text-gray-800 tracking-tight opacity-0 translate-x-[-50px]">
            🎯 Dashboard Sekolah
        </h2>
    </x-slot>

    <!-- ✅ GSAP + VanillaTilt CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.3/vanilla-tilt.min.js"></script>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- ✅ Profile Card -->
            <div id="profileCard" class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100 opacity-0 translate-y-6 transform">
                <div class="flex items-center space-x-4">
                    <img class="w-10 h-10 rounded-full object-cover border-2 border-indigo-500 shadow-md hover:scale-105 transition-transform duration-300"
                        src="{{ Auth::user()->profile_photo ? asset('storage/profile/' . Auth::user()->profile_photo) : asset('images/default-avatar.png') }}"
                        alt="{{ Auth::user()->name }}">
                    <div>
                        <h3 class="text-xl font-bold text-gray-800">Halo, {{ Auth::user()->name }}</h3>
                        <p class="text-gray-600 text-sm">Peran Anda:
                            <span class="px-2 py-0.5 text-xs rounded bg-indigo-100 text-indigo-700 font-semibold">
                                {{ strtoupper(Auth::user()->role) }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- ✅ Grid Menu dengan Tilt -->
            <div id="dashboardCards" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 opacity-0">

                <!-- Card -->
                <a href="{{ route('siswa.index') }}" class="dashboard-card group bg-white p-6 rounded-xl shadow-xl border border-gray-100 hover:shadow-2xl transition-transform duration-500" data-tilt data-tilt-max="12" data-tilt-speed="400">
                    <div class="flex items-center space-x-3 mb-3">
                        <svg class="w-8 h-8 text-blue-600 transition-transform group-hover:scale-125" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M12 14l9-5-9-5-9 5 9 5z" />
                        </svg>
                        <h3 class="text-xl font-semibold text-blue-700">Manajemen Siswa</h3>
                    </div>
                    <p class="text-gray-600">Kelola data siswa dengan UI interaktif dan filter canggih.</p>
                </a>

                <!-- Card lainnya sama konsep -->
                <a href="{{ route('guru.index') }}" class="dashboard-card group bg-white p-6 rounded-xl shadow-xl border border-gray-100 hover:shadow-2xl transition-transform duration-500" data-tilt data-tilt-max="12" data-tilt-speed="400">
                    <div class="flex items-center space-x-3 mb-3">
                        <svg class="w-8 h-8 text-green-600 group-hover:scale-125 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M4 19V7a2 2 0 012-2h12a2 2 0 012 2v12" />
                        </svg>
                        <h3 class="text-xl font-semibold text-green-700">Manajemen Guru</h3>
                    </div>
                    <p class="text-gray-600">Tambah dan kelola data guru dengan tampilan elegan.</p>
                </a>

                @if(Auth::user()->role === 'operator')
                <a href="{{ route('users.index') }}" class="dashboard-card group bg-white p-6 rounded-xl shadow-xl border border-gray-100 hover:shadow-2xl transition-transform duration-500" data-tilt data-tilt-max="12" data-tilt-speed="400">
                    <div class="flex items-center space-x-3 mb-3">
                        <svg class="w-8 h-8 text-yellow-600 group-hover:scale-125 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5z" />
                        </svg>
                        <h3 class="text-xl font-semibold text-yellow-700">Manajemen User</h3>
                    </div>
                    <p class="text-gray-600">Kelola akun pengguna sistem sekolah.</p>
                </a>
                @endif

                @if(Auth::user()->role === 'staff_keuangan')
                <a href="{{ route('keuangan.index') }}" class="dashboard-card group bg-white p-6 rounded-xl shadow-xl border border-gray-100 hover:shadow-2xl transition-transform duration-500" data-tilt data-tilt-max="12" data-tilt-speed="400">
                    <div class="flex items-center space-x-3 mb-3">
                        <svg class="w-8 h-8 text-purple-600 group-hover:scale-125 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M12 8c-3.8 0-7 1.8-7 4v2c0 2.2 3.1 4 7 4s7-1.8 7-4v-2c0-2.2-3.1-4-7-4z" />
                        </svg>
                        <h3 class="text-xl font-semibold text-purple-700">Keuangan Sekolah</h3>
                    </div>
                    <p class="text-gray-600">Pantau transaksi dan laporan keuangan sekolah.</p>
                </a>
                @endif

            </div>
        </div>
    </div>

    <!-- ✅ GSAP + Tilt Init -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            gsap.timeline()
                .to("#headerTitle", {
                    opacity: 1,
                    x: 0,
                    duration: 0.7,
                    ease: "power3.out"
                })
                .to("#profileCard", {
                    opacity: 1,
                    y: 0,
                    duration: 0.7,
                    ease: "power3.out"
                }, "-=0.3")
                .to("#dashboardCards", {
                    opacity: 1,
                    duration: 0.5,
                    ease: "power2.out"
                }, "-=0.3")
                .from(".dashboard-card", {
                    y: 40,
                    opacity: 0,
                    scale: 0.9,
                    stagger: 0.15,
                    ease: "back.out(1.7)",
                    duration: 0.6
                }, "-=0.2");

            VanillaTilt.init(document.querySelectorAll("[data-tilt]"), {
                scale: 1.05,
                glare: true,
                "max-glare": 0.2
            });
        });
    </script>
</x-app-layout>