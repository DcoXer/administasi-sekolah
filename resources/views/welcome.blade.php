<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome — Sistem Administrasi Sekolah</title>
    @vite('resources/css/app.css')

    <style>
        /* ===== Soft Liquid Background (ringan) ===== */
        body {
            background: radial-gradient(at 30% 30%, #a5b4fc, transparent 60%),
                radial-gradient(at 70% 70%, #f9a8d4, transparent 60%),
                radial-gradient(at 50% 90%, #93c5fd, transparent 60%), #fdfdfd;
            background-attachment: fixed;
        }

        /* ===== Glass Mega Card ===== */
        .mega-card {
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.25));
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.45);
            box-shadow:
                0 10px 30px rgba(28, 33, 61, .12),
                inset 0 1px 0 rgba(255, 255, 255, .35);
        }

        /* ===== Animasi smooth (tanpa library) ===== */
        .reveal {
            opacity: 0;
            transform: translateY(12px) scale(.98);
            transition: opacity .7s ease, transform .7s cubic-bezier(.22, .61, .36, 1);
            will-change: opacity, transform;
        }

        .reveal.show {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        /* Shine tipis saat hover card kecil */
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 40px rgba(30, 41, 59, .18);
        }

        .card-hover {
            transition: transform .35s ease, box-shadow .35s ease, background .35s ease;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col">

    <!-- ===== Header / Navbar ===== -->
    <header class="fixed top-0 left-0 right-0 z-50">
        <div
            class="mx-auto max-w-[1400px] px-4 sm:px-6 lg:px-8 py-3 rounded-2xl shadow-[0_10px_30px_rgba(0,0,0,.06)]"
            style="background: linear-gradient(135deg, rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 0.15));">
            <div class="flex items-center justify-between">
                <!-- Logo (kanan) -->
                <div class="flex items-center gap-2">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/a/a7/React-icon.svg" alt="Logo"
                        class="w-9 h-9">
                    <span
                        class="text-lg sm:text-xl font-extrabold bg-gradient-to-r from-blue-600 via-violet-600 to-pink-500 bg-clip-text text-transparent tracking-wide">SekolahKu</span>
                </div>
                <!-- Menu tengah -->
                <nav class="hidden md:flex items-center gap-8 text-slate-700 font-medium">
                    <a href="#home" class="hover:text-indigo-600 transition">Home</a>
                    <a href="#about" class="hover:text-indigo-600 transition">About</a>
                    <a href="#kontak" class="hover:text-indigo-600 transition">Kontak</a>
                    <a href="#informasi" class="hover:text-indigo-600 transition">Informasi</a>
                </nav>
                <!-- Tombol Login (kiri) -->
                <a href="{{ route('login') }}"
                    class="px-4 py-2 rounded-full bg-transparant hover:bg-indigo-500 transition-colors duration-300 text-dark hover:text-white font-semibold shadow hover:shadow-lg hidden md:flex">
                    Login
                </a>
                <!-- Hamburger (mobile) -->
                <button id="menu-toggle"
                    class="md:hidden p-2 rounded-lg hover:bg-white/60 transition text-slate-700">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Mobile menu -->
            <div id="mobile-menu" class="hidden md:hidden flex-col gap-3 pt-3 bg-white/50 backdrop-blur-sm font-semibold">
                <a href="#home" class="block px-3 py-2 rounded-lg hover:bg-white/70">Home</a>
                <a href="#about" class="block px-3 py-2 rounded-lg hover:bg-white/70">About</a>
                <a href="#kontak" class="block px-3 py-2 rounded-lg hover:bg-white/70">Kontak</a>
                <a href="#informasi" class="block px-3 py-2 rounded-lg hover:bg-white/70">Informasi</a>
                <a href="{{ route('login') }}" class="block px-3 py-2 rounded-lg bg-white/80 hover:bg-white">login</a>
            </div>
        </div>
    </header>

    <!-- Spacer untuk header -->
    <div class="h-24"></div>

    <!-- ===== Mega Card (hampir full screen) ===== -->
    <main class="flex-1 px-4 sm:px-6 lg:px-8 pb-10">
        {{-- Home Section --}}
        <section class="mx-auto max-w-[1400px] mb-12" id="home">
            <div
                class="mega-card rounded-3xl p-6 sm:p-8 lg:p-12 min-h-[82vh] flex flex-col gap-8 reveal">
                <!-- Title bar -->
                <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
                    <div>
                        <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-800">
                            Sistem Administrasi Sekolah
                        </h1>
                        <p class="text-slate-600 mt-1">Selamat datang di portal resmi SekolahKu.</p>
                    </div>
                    <div
                        class="px-4 py-2 rounded-xl bg-gradient-to-r from-blue-500/15 to-pink-500/15 border border-white/50">
                        <span class="text-sm font-semibold text-slate-700">Versi Publik</span>
                    </div>
                </div>

                <!-- Grid konten -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">
                    <!-- Kolom kiri -->
                    <div class="lg:col-span-2 space-y-6">
                        <div
                            class="rounded-2xl p-6 sm:p-8 bg-white/60 border border-white/60 shadow card-hover reveal"
                            style="background-image: radial-gradient(1200px 200px at 0% 0%, rgba(99,102,241,.08), transparent 40%);">
                            <h2 class="text-xl sm:text-2xl font-bold text-slate-800 mb-2">
                                Pendidikan Berkualitas, Lingkungan Nyaman
                            </h2>
                            <p class="text-slate-700 leading-relaxed">
                                Kami berkomitmen memberikan pengalaman belajar terbaik melalui kurikulum
                                yang relevan, guru berpengalaman, dan fasilitas yang mendukung.
                            </p>
                        </div>

                        <!-- Info cards -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="rounded-2xl p-5 bg-white/55 border border-white/60 shadow card-hover reveal">
                                <h3 class="font-semibold text-slate-800 mb-1">Program Unggulan</h3>
                                <p class="text-slate-700 text-sm">Kegiatan literasi, sains, seni, dan olahraga yang
                                    dirancang adaptif.</p>
                            </div>
                            <div class="rounded-2xl p-5 bg-white/55 border border-white/60 shadow card-hover reveal">
                                <h3 class="font-semibold text-slate-800 mb-1">Fasilitas</h3>
                                <p class="text-slate-700 text-sm">Perpustakaan, lab komputer, ruang multimedia, dan
                                    area hijau.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom kanan: quick links -->
                    <aside class="space-y-6">
                        <a href="#about"
                            class="block rounded-2xl p-5 bg-white/55 border border-white/60 shadow card-hover reveal">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-slate-800 font-semibold">Tentang Sekolah</p>
                                    <p class="text-slate-600 text-sm">Profil & visi misi.</p>
                                </div>
                                <svg class="w-6 h-6 text-slate-500" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </a>
                        <a href="#informasi"
                            class="block rounded-2xl p-5 bg-white/55 border border-white/60 shadow card-hover reveal">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-slate-800 font-semibold">Informasi Sekolah</p>
                                    <p class="text-slate-600 text-sm">Pengumuman & event.</p>
                                </div>
                                <svg class="w-6 h-6 text-slate-500" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </a>
                        <a href="#kontak"
                            class="block rounded-2xl p-5 bg-white/55 border border-white/60 shadow card-hover reveal">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-slate-800 font-semibold">Kontak</p>
                                    <p class="text-slate-600 text-sm">Email & nomor telp.</p>
                                </div>
                                <svg class="w-6 h-6 text-slate-500" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </a>
                    </aside>
                </div>
            </div>
        </section>

        {{-- Tentang Section --}}
        <section id="about" class="mx-auto max-w-[1400px] mb-12">
            <div class="rounded-3xl p-6 sm:p-8 bg-white/55 border border-white/60 shadow reveal">
                <h3 class="text-xl font-bold text-slate-800 mb-2">Tentang Kami</h3>
                <p class="text-slate-700 leading-relaxed">
                    SekolahKu berdiri sejak 1990, berfokus pada pengembangan karakter dan kompetensi abad 21.
                </p>
            </div>
        </section>

        {{-- Informasi Section --}}
        <section id="informasi" class="mx-auto max-w-[1400px] mb-12">
            <div class="rounded-3xl p-6 sm:p-8 bg-white/55 border border-white/60 shadow reveal">
                <h3 class="text-xl font-bold text-slate-800 mb-2">Informasi</h3>
                <p class="text-slate-700 leading-relaxed">
                    Cek pengumuman terbaru seputar penerimaan siswa baru, jadwal kegiatan, dan agenda penting.
                </p>
            </div>
        </section>

        {{-- Kontak Section --}}
        <section id="kontak" class="mx-auto max-w-[1400px]">
            <div class="rounded-3xl p-6 sm:p-8 bg-white/55 border border-white/60 shadow reveal">
                <h3 class="text-xl font-bold text-slate-800 mb-2">Kontak</h3>
                <p class="text-slate-700">
                    Email: info@sekolahku.sch.id &nbsp;|&nbsp; Telp: (021) 123456
                </p>
            </div>
        </section>
    </main>


    <!-- ===== Footer ===== -->
    <footer class="py-6 text-center text-slate-600">
        <p>&copy; {{ date('Y') }} SekolahKu. All rights reserved.</p>
    </footer>

    <script>
        // Mobile menu toggle
        const toggleBtn = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        if (toggleBtn) {
            toggleBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
        }

        // Intersection Observer untuk animasi smooth saat scroll
        const io = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) e.target.classList.add('show');
                else e.target.classList.remove('show'); // biar bisa animasi lagi saat scroll naik-turun
            });
        }, {
            threshold: .08
        });

        document.querySelectorAll('.reveal').forEach(el => io.observe(el));
    </script>
</body>

</html>