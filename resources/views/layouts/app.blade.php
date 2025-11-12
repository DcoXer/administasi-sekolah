<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ open: true }" x-cloak>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

    @vite('resources/css/app.css', 'resources/js/app.js')
    @livewireStyles
</head>

<body class="bg-gray-50 font-sans antialiased">
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

        {{-- Sidebar + Main --}}
        @include('layouts.sidebar')

        <main class="pt-20 px-6 transition-all duration-500 ease-in-out text-gray-800"
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

</html>