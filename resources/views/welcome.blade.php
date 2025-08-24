<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome — Sistem Administrasi Sekolah</title>
    @vite('resources/css/app.css')

    <style>
        html {
            scroll-behavior: smooth;
            scrollbar-width: none;
        }

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
                <div class="flex text-end gap-4">
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 rounded-full bg-transparant hover:bg-indigo-500 transition-colors duration-300 text-black hover:text-white font-semibold shadow hover:shadow-lg hidden md:flex">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-4 py-2 rounded-full bg-indigo-800 hover:bg-indigo-400 transition-colors duration-300 text-white hover:text-black font-semibold shadow hover:shadow-lg hidden md:flex">
                        Daftar
                    </a>
                </div>
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
                class="mega-card rounded-3xl p-6 sm:p-8 lg:p-12 min-h-[82vh] flex flex-col gap-8" data-reveal="up">
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
                    <div class="lg:col-span-2 space-y-6" data-reveal="left">
                        <div
                            class="rounded-2xl p-6 sm:p-8 bg-white/60 border border-white/60 shadow card-hover"
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
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6" data-reveal="right">
                            <div class="rounded-2xl p-5 bg-white/55 border border-white/60 shadow card-hover">
                                <h3 class="font-semibold text-slate-800 mb-1">Program Unggulan</h3>
                                <p class="text-slate-700 text-sm">Kegiatan literasi, sains, seni, dan olahraga yang
                                    dirancang adaptif.</p>
                            </div>
                            <div class="rounded-2xl p-5 bg-white/55 border border-white/60 shadow card-hover">
                                <h3 class="font-semibold text-slate-800 mb-1">Fasilitas</h3>
                                <p class="text-slate-700 text-sm">Perpustakaan, lab komputer, ruang multimedia, dan
                                    area hijau.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom kanan: quick links -->
                    <aside class="space-y-6">
                        <a href="#about"
                            class="block rounded-2xl p-5 bg-white/55 border border-white/60 shadow card-hover" data-reveal="up">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-slate-800 font-semibold">Tentang Sekolah</p>
                                    <p class="text-slate-600 text-sm">Profil & visi misi.</p>
                                </div>
                                <p class="text-slate-500 text-sm flex gap-2">
                                    Go To
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </p>
                            </div>
                        </a>
                        <a href="#informasi"
                            class="block rounded-2xl p-5 bg-white/55 border border-white/60 shadow card-hover" data-reveal="down">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-slate-800 font-semibold">Informasi Sekolah</p>
                                    <p class="text-slate-600 text-sm">Pengumuman & event.</p>
                                </div>
                                <p class="text-slate-500 text-sm flex gap-2">
                                    Go To
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </p>
                            </div>
                        </a>
                        <a href="#kontak"
                            class="block rounded-2xl p-5 bg-white/55 border border-white/60 shadow card-hover" data-reveal="up">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-slate-800 font-semibold">Kontak</p>
                                    <p class="text-slate-600 text-sm">Email & nomor telp.</p>
                                </div>
                                <p class="text-slate-500 text-sm flex gap-2">
                                    Go To
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </p>
                            </div>
                        </a>
                    </aside>
                </div>
            </div>
        </section>

        <!-- About Section: Image + Sejarah + Prestasi di satu kolom kiri -->
        <section id="about" class="mx-auto max-w-[1400px] mb-20">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                <!-- Kolom Kiri: Image + Sejarah + Prestasi -->
                <div class="lg:col-span-7 flex flex-col gap-8">

                    <!-- Large Image -->
                    <div class="relative">
                        <img src="https://plus.unsplash.com/premium_photo-1663040225613-98b7801c48a2?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            class="w-full h-full rounded-3xl shadow-2xl object-cover"
                            alt="SekolahKu Environment" data-reveal="left">

                        <!-- Card Sejarah -->
                        <div class="absolute -bottom-16 left-1/2 transform -translate-x-1/2 w-11/12 md:w-10/12 p-6 rounded-3xl bg-white/70 shadow-2xl">
                            <h4 class="text-xl font-bold text-slate-800 mb-2">Sejarah SekolahKu</h4>
                            <p class="text-slate-600 text-sm leading-relaxed">
                                SekolahKu berdiri sejak tahun 1990 dengan visi mencetak generasi unggul yang berkarakter.
                                Dengan komitmen kuat pada pendidikan berkualitas, inovasi kurikulum, dan pengembangan guru profesional,
                                SekolahKu telah berhasil bertahan dan berkembang hingga saat ini.
                            </p>
                        </div>
                    </div>

                    <!-- Card Prestasi -->
                    <div class="w-11/12 md:w-10/12 mx-auto mt-28 p-6 rounded-3xl bg-white/70 shadow-2xl" data-reveal="left">
                        <h4 class="text-xl font-bold text-slate-800 mb-3">Prestasi & Kegiatan Siswa</h4>
                        <p class="text-slate-600 text-sm leading-relaxed mb-2">
                            Siswa kami aktif mengikuti berbagai lomba akademik dan non-akademik di tingkat kota hingga nasional, meraih prestasi gemilang di bidang sains, seni, dan olahraga.
                        </p>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            Program-program inovatif mendorong kreativitas, kerjasama tim, dan kepemimpinan, sehingga siswa siap menghadapi tantangan abad 21 dengan percaya diri.
                        </p>
                    </div>

                </div>

                <!-- Kolom Kanan: 6 Feature Cards -->
                <div class="lg:col-span-5 grid grid-rows-6 gap-6">

                    <!-- Feature 1 -->
                    <div class="row-span-1 flex items-start gap-4 p-4 rounded-2xl bg-white/60 shadow-lg">
                        <svg class="w-6 h-6 text-indigo-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.84 5.422C18 21 12 19 12 19s-6 2-7-3a12.083 12.083 0 01.84-5.422L12 14z" />
                        </svg>
                        <div>
                            <h4 class="font-semibold text-slate-800">Fasilitas Modern</h4>
                            <p class="text-slate-600 text-sm leading-snug">
                                Laboratorium, perpustakaan digital, ruang seni, dan area hijau untuk belajar dan berekspresi.
                            </p>
                        </div>
                    </div>

                    <!-- Feature 2 (double height) -->
                    <div class="row-span-2 flex items-start gap-4 p-4 rounded-2xl bg-white/60 shadow-lg">
                        <svg class="w-6 h-6 text-pink-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-3-3v6m0-9v1a9 9 0 100 18v1" />
                        </svg>
                        <div>
                            <h4 class="font-semibold text-slate-800">Kurikulum Kreatif</h4>
                            <p class="text-slate-600 text-sm leading-snug">
                                Program literasi, STEM, seni, dan olahraga dikemas interaktif, siswa bisa memilih sesuai minat dan bakat.
                            </p>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="row-span-1 flex items-start gap-4 p-4 rounded-2xl bg-white/60 shadow-lg">
                        <svg class="w-6 h-6 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <div>
                            <h4 class="font-semibold text-slate-800">Guru Berpengalaman</h4>
                            <p class="text-slate-600 text-sm leading-snug">
                                Tim pengajar profesional dan berkompeten, siap membimbing siswa meraih prestasi akademik & non-akademik.
                            </p>
                        </div>
                    </div>

                    <!-- Feature 4 -->
                    <div class="row-span-1 flex items-start gap-4 p-4 rounded-2xl bg-white/60 shadow-lg">
                        <svg class="w-6 h-6 text-purple-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c1.657 0 3-1.343 3-3S13.657 2 12 2s-3 1.343-3 3 1.343 3 3 3zM6 20v-2a6 6 0 0112 0v2" />
                        </svg>
                        <div>
                            <h4 class="font-semibold text-slate-800">Pengembangan Karakter</h4>
                            <p class="text-slate-600 text-sm leading-snug">
                                Program karakter & leadership agar siswa memiliki soft skill dan kepemimpinan yang matang.
                            </p>
                        </div>
                    </div>

                    <!-- Feature 5 -->
                    <div class="row-span-1 flex items-start gap-4 p-4 rounded-2xl bg-white/60 shadow-lg">
                        <svg class="w-6 h-6 text-yellow-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7 12l5 5 7-7" />
                        </svg>
                        <div>
                            <h4 class="font-semibold text-slate-800">Kegiatan Ekstrakurikuler</h4>
                            <p class="text-slate-600 text-sm leading-snug">
                                Olahraga, musik, seni, dan klub akademik mendukung minat & bakat siswa secara menyeluruh.
                            </p>
                        </div>
                    </div>

                    <!-- Feature 6 -->
                    <div class="row-span-1 flex items-start gap-4 p-4 rounded-2xl bg-white/60 shadow-lg">
                        <svg class="w-6 h-6 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <div>
                            <h4 class="font-semibold text-slate-800">Teknologi Digital</h4>
                            <p class="text-slate-600 text-sm leading-snug">
                                Penggunaan software edukatif dan platform online untuk mendukung proses belajar interaktif.
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- Informasi Section -->
        <section id="informasi" class="mx-auto max-w-[1400px] mb-16" data-reveal="up">
            <div class="grid md:grid-cols-3 gap-8">
                <div class="p-6 rounded-3xl bg-gradient-to-br from-indigo-100 to-indigo-200 shadow-lg card-hover" data-reveal="left">
                    <div class="w-20 h-20 mask mask-hexagon bg-indigo-500 text-white flex items-center justify-center mx-auto text-2xl mb-4">📅</div>
                    <h4 class="font-bold text-center">Penerimaan</h4>
                    <p class="text-center text-sm text-slate-600">Mulai Juli 2025</p>
                </div>
                <div class="p-6 rounded-3xl bg-gradient-to-br from-pink-100 to-pink-200 shadow-lg card-hover" data-reveal="up">
                    <div class="w-20 h-20 mask mask-circle bg-pink-500 text-white flex items-center justify-center mx-auto text-2xl mb-4">🏆</div>
                    <h4 class="font-bold text-center">Lomba</h4>
                    <p class="text-center text-sm text-slate-600">Semester ini</p>
                </div>
                <div class="p-6 rounded-3xl bg-gradient-to-br from-green-100 to-green-200 shadow-lg card-hover" data-reveal="right">
                    <div class="w-20 h-20 mask mask-diamond bg-green-500 text-white flex items-center justify-center mx-auto text-2xl mb-4">📢</div>
                    <h4 class="font-bold text-center">Jadwal Ujian</h4>
                    <p class="text-center text-sm text-slate-600">Portal Online</p>
                </div>
            </div>
        </section>

        <!-- Kontak Section -->
        <section id="kontak" class="mx-auto max-w-[1400px] mb-16" data-reveal="up">
            <div class="grid md:grid-cols-3 gap-8">
                <div class="group p-6 rounded-3xl bg-white/40 backdrop-blur shadow-lg card-hover hover:scale-105 transition" data-reveal="left">
                    <div class="w-16 h-16 mask mask-circle bg-indigo-500 text-white flex items-center justify-center mx-auto mb-4 group-hover:rotate-6 transition">📧</div>
                    <h4 class="font-bold text-center">Email</h4>
                    <p class="text-center text-sm text-slate-600">info@sekolahku.sch.id</p>
                </div>
                <div class="group p-6 rounded-3xl bg-white/40 backdrop-blur shadow-lg card-hover hover:scale-105 transition" data-reveal="up">
                    <div class="w-16 h-16 mask mask-parallelogram bg-pink-500 text-white flex items-center justify-center mx-auto mb-4 group-hover:rotate-6 transition">📞</div>
                    <h4 class="font-bold text-center">Telepon</h4>
                    <p class="text-center text-sm text-slate-600">(021) 123456</p>
                </div>
                <div class="group p-6 rounded-3xl bg-white/40 backdrop-blur shadow-lg card-hover hover:scale-105 transition" data-reveal="right">
                    <div class="w-16 h-16 mask mask-hexagon bg-green-500 text-white flex items-center justify-center mx-auto mb-4 group-hover:rotate-6 transition">📍</div>
                    <h4 class="font-bold text-center">Alamat</h4>
                    <p class="text-center text-sm text-slate-600">Jl. Pendidikan No. 45</p>
                </div>
            </div>
        </section>



    </main>


    <!-- ===== Footer ===== -->
    <footer class="py-6 text-center text-slate-600">
        <p>&copy; {{ date('Y') }} SekolahKu. All rights reserved.</p>
    </footer>

    <script>
        // Mobile menu toggle (tetap)
        const toggleBtn = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        if (toggleBtn) toggleBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));

        // === Intersection Observer untuk animasi arah ===
        const els = document.querySelectorAll('[data-reveal]');
        const io = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                const el = entry.target;
                if (entry.isIntersecting) {
                    const delay = el.getAttribute('data-delay');
                    if (delay) el.style.setProperty('--reveal-delay', `${parseInt(delay, 10)}ms`);
                    el.classList.add('show');
                } else {
                    el.classList.remove('show');
                }
            });
        }, {
            threshold: 0.08
        });

        els.forEach(el => {
            io.observe(el);
            // ✅ auto show kalau elemen udah ada di viewport pas awal load
            if (el.getBoundingClientRect().top < window.innerHeight) {
                el.classList.add('show');
            }
        });
    </script>


</body>

</html>