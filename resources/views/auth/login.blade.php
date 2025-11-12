<x-guest-layout>
    <div class="min-h-screen grid grid-cols-1 lg:grid-cols-2 bg-white overflow-hidden relative">

        <!-- Particles -->
        <canvas id="particles" class="absolute inset-0 z-0"></canvas>

        <!-- Left Side: Image -->
        <div
            x-data="{ show: false }"
            x-init="setTimeout(() => show = true, 200)"
            x-bind:class="show ? 'opacity-100 translate-y-0 lg:translate-x-0' : 'opacity-0 translate-y-5 lg:-translate-x-10'"
            class="flex items-center justify-center p-6 sm:p-8 transition-all duration-700 ease-out z-10 order-2 lg:order-1">
            <img src="{{ asset('images/school.jpg') }}"
                alt="School Illustration"
                class="w-full max-w-sm sm:max-w-md lg:max-w-lg rounded-2xl shadow-2xl border border-white/20 object-cover">
        </div>

        <!-- Right Side: Login Form -->
        <div class="flex items-center justify-center p-6 sm:p-8 z-10 relative order-1 lg:order-2">
            <div
                x-data="{ show: false }"
                x-init="setTimeout(() => show = true, 400)"
                x-bind:class="show ? 'opacity-100 translate-y-0 scale-100' : 'opacity-0 translate-y-5 scale-95'"
                class="transition-all duration-700 ease-out w-full max-w-full sm:max-w-lg lg:max-w-2xl bg-white rounded-2xl shadow-lg p-6 sm:p-8 border border-gray-200">

                <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-6 text-center tracking-wide">
                    Masuk ke <span class="text-blue-600">Sistem Sekolah</span>
                </h2>

                @if (session('status'))
                <div class="mb-4 text-green-600 text-sm text-center">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm text-gray-700 mb-1">Email</label>
                        <input id="email" type="email" name="email" required autofocus
                            class="w-full border border-gray-300 bg-white text-gray-800 placeholder-gray-500 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            placeholder="Masukkan email Anda">
                    </div>

                    <div class="relative">
                        <label for="password" class="block text-sm text-gray-700 mb-1">Kata Sandi</label>
                        <input id="password" type="password" name="password" required
                            class="w-full border border-gray-300 bg-white text-gray-800 placeholder-gray-500 rounded-lg px-3 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            placeholder="••••••••">
                        <button type="button" onclick="togglePassword()" class="absolute right-3 top-9 text-gray-600 hover:text-gray-800 transition">
                            <!-- Eye Icons -->
                            <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.955 9.955 0 012.293-3.95M6.223 6.223A9.956 9.956 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.96 9.96 0 01-4.293 5.293M6.223 6.223L18 18" />
                            </svg>
                        </button>
                    </div>

                    <div class="flex items-center justify-between text-sm text-gray-700 flex-wrap gap-2">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="remember" class="accent-blue-600">
                            <span>Ingat saya</span>
                        </label>
                        <a href="{{ route('password.request') }}" class="hover:underline hover:text-blue-600 transition">Lupa sandi?</a>
                    </div>

                    <div>
                        <x-button-spinner class="w-full">
                            Masuk
                        </x-button-spinner>
                    </div>
                </form>

                <div class="mt-6 text-sm text-gray-600 text-center">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="font-medium hover:text-blue-600 hover:underline transition">
                        Daftar
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Toggle Password -->
    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const eyeOpen = document.getElementById('eyeOpen');
            const eyeClosed = document.getElementById('eyeClosed');
            if (input.type === 'password') {
                input.type = 'text';
                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');
            } else {
                input.type = 'password';
                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');
            }
        }
    </script>

    <!-- Script Particles -->
    <script>
        const canvas = document.getElementById('particles');
        const ctx = canvas.getContext('2d');
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        const particlesArray = [];
        const particleCount = 50;

        class Particle {
            constructor() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.size = Math.random() * 3 + 1;
                this.speedX = Math.random() * 1 - 0.5;
                this.speedY = Math.random() * 1 - 0.5;
            }
            update() {
                this.x += this.speedX;
                this.y += this.speedY;
                if (this.x < 0 || this.x > canvas.width) this.speedX *= -1;
                if (this.y < 0 || this.y > canvas.height) this.speedY *= -1;
            }
            draw() {
                ctx.fillStyle = 'rgba(255, 255, 255, 0.6)';
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
            }
        }

        function initParticles() {
            for (let i = 0; i < particleCount; i++) {
                particlesArray.push(new Particle());
            }
        }

        function animateParticles() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particlesArray.forEach(p => {
                p.update();
                p.draw();
            });
            requestAnimationFrame(animateParticles);
        }

        initParticles();
        animateParticles();

        window.addEventListener('resize', () => {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        });
    </script>
</x-guest-layout>