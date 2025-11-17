<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

<<<<<<< HEAD
<body class="font-sans antialiased">
    <x-loading />
    <div x-data="{
        open: window.innerWidth > 768,
        userMenu: false,
        animate: false,
        scrollY: 0,
        active: '{{ request()->routeIs("dashboard") ? "dashboard" : (request()->is("siswa*") ? "siswa" : (request()->is("guru*") ? "guru" : "")) }}'
    }"
        x-init="
        setTimeout(() => animate = true, 100);
        window.addEventListener('resize', () => open = window.innerWidth > 768);
        window.addEventListener('scroll', () => scrollY = window.scrollY);
    "
        class="relative">
        {{-- Header --}}
        @include('layouts.navigation')
=======
        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />
>>>>>>> 7881684e027466948b9fc35eb8f243bc2c31e810

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

<<<<<<< HEAD
        <main class="pt-20 px-6 transition-all duration-500 ease-in-out text-gray-900"
            :class="open ? 'md:ml-64' : 'md:ml-0'">
            {{ $slot }}
        </main>
    </div>
    @livewireScripts
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('loader', () => ({
                show: true,
                init() {
                    // ilangin loading setelah page selesai render
                    window.addEventListener('load', () => {
                        setTimeout(() => {
                            this.show = false
                        }, 1500) // delay 0.5 detik biar animasi keliatan
                    })

                    // event global buat munculin loading
                    window.addEventListener('loading', () => {
                        this.show = true
                    })

                    // event global buat ngilangin loading
                    window.addEventListener('loading-done', () => {
                        this.show = false
                    })
                }
            }))
        })
    </script>
</body>
=======
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
>>>>>>> 7881684e027466948b9fc35eb8f243bc2c31e810

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
