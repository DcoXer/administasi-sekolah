<x-guest-layout>
    <div class="min-h-screen flex flex-col md:flex-row">
        {{-- Kiri - Gambar --}}
        <div class="hidden md:flex w-1/2 bg-gradient-to-br from-[#243b55] to-[#141e30] items-center justify-center">
            <img
                src="{{ asset('images/school.jpg') }}"
                alt="Register Illustration"
                class="max-w-[80%] rounded-xl shadow-2xl" />
        </div>

        {{-- Kanan - Form --}}
        <div class="flex w-full md:w-1/2 items-center justify-center bg-[#141e30] p-8">
            <form method="POST" action="{{ route('register') }}"
                class="bg-white/10 backdrop-blur-xl rounded-2xl shadow-lg p-8 w-full max-w-md border border-white/20 space-y-4">
                @csrf

                <h2 class="text-3xl font-bold text-white mb-6 text-center">Daftar Akun Baru</h2>

                {{-- Nama --}}
                <div>
                    <label for="name" class="block text-white mb-1">Nama</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                        class="w-full px-4 py-2 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="Masukkan nama lengkap">
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-white mb-1">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-2 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="Masukkan email">
                </div>

                {{-- Password --}}
                <div class="relative">
                    <label for="password" class="block text-white mb-1">Kata Sandi</label>
                    <input id="register-password" type="password" name="password" required
                        class="w-full px-4 py-2 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 pr-10"
                        placeholder="Masukkan kata sandi">
                    <button type="button" onclick="toggleRegisterPassword()" class="absolute top-9 right-3">
                        <svg id="register-eye-open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg id="register-eye-closed" xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-gray-300 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.955 9.955 0 012.293-3.95M6.223 6.223A9.956 9.956 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.96 9.96 0 01-4.293 5.293M6.223 6.223L18 18" />
                        </svg>
                    </button>
                </div>

                {{-- Konfirmasi Password --}}
                <div class="relative">
                    <label for="password_confirmation" class="block text-white mb-1">Konfirmasi Kata Sandi</label>
                    <input id="register-password-confirm" type="password" name="password_confirmation" required
                        class="w-full px-4 py-2 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 pr-10"
                        placeholder="Ulangi kata sandi">
                    <button type="button" onclick="toggleRegisterPasswordConfirm()" class="absolute top-9 right-3">
                        <svg id="register-eye-open-confirm" xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg id="register-eye-closed-confirm" xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-gray-300 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.955 9.955 0 012.293-3.95M6.223 6.223A9.956 9.956 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.96 9.96 0 01-4.293 5.293M6.223 6.223L18 18" />
                        </svg>
                    </button>
                </div>

                {{-- Role User --}}
                <div>
                    <label for="role" class="block text-white mb-1">Role User</label>
                    <select id="role" name="role"
                        class="w-full px-4 py-2 rounded-lg bg-white/20 text-white focus:outline-none focus:ring-2 focus:ring-blue-400 appearance-auto"
                        style="background-color: rgba(255,255,255,0.1);"
                        required>
                        <option class="bg-gray-800 text-white" value="operator">Operator Sekolah</option>
                        <option class="bg-gray-800 text-white" value="kepala_sekolah">Kepala Sekolah</option>
                        <option class="bg-gray-800 text-white" value="staff_keuangan">Staff Keuangan</option>
                    </select>
                </div>

                {{-- Tombol Submit --}}
                <button type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-lg transition-all duration-300">
                    Daftar
                </button>

                <div class="mt-4 text-sm text-center text-gray-300">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-blue-400 hover:underline">Masuk</a>
                </div>
            </form>
        </div>
    </div>

    {{-- Script Toggle Password --}}
    <script>
        function toggleRegisterPassword() {
            const input = document.getElementById("register-password");
            const openEye = document.getElementById("register-eye-open");
            const closedEye = document.getElementById("register-eye-closed");
            if (input.type === "password") {
                input.type = "text";
                openEye.classList.add("hidden");
                closedEye.classList.remove("hidden");
            } else {
                input.type = "password";
                openEye.classList.remove("hidden");
                closedEye.classList.add("hidden");
            }
        }

        function toggleRegisterPasswordConfirm() {
            const input = document.getElementById("register-password-confirm");
            const openEye = document.getElementById("register-eye-open-confirm");
            const closedEye = document.getElementById("register-eye-closed-confirm");
            if (input.type === "password") {
                input.type = "text";
                openEye.classList.add("hidden");
                closedEye.classList.remove("hidden");
            } else {
                input.type = "password";
                openEye.classList.remove("hidden");
                closedEye.classList.add("hidden");
            }
        }
    </script>
</x-guest-layout>