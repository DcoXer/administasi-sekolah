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

    <style>
        [x-cloak] {
            display: none !important;
        }

        .glass {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
        }

        .transition-width {
            transition: width 0.3s ease;
        }

        .menu-hover:hover {
            background: rgba(99, 102, 241, 0.1);
            box-shadow: inset 0 0 10px rgba(99, 102, 241, 0.2);
        }

        .ripple {
            position: relative;
            overflow: hidden;
        }

        .ripple::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            transform: scale(0);
            background: rgba(99, 102, 241, 0.3);
            animation: ripple 0.6s linear;
        }

        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }

        @keyframes gradientFlow {
            0% {
                background-position: 0% 50%
            }

            50% {
                background-position: 100% 50%
            }

            100% {
                background-position: 0% 50%
            }
        }

        /* 🌟 Tombol Ultimate++ */
        .btn-ultimate {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 22px;
            border-radius: 9999px;
            font-weight: 600;
            font-size: 1rem;
            color: #fff;
            background: linear-gradient(270deg, #4f46e5, #9333ea, #06b6d4);
            background-size: 300% 300%;
            animation: gradientFlow 6s ease infinite;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .2);
            backdrop-filter: blur(10px);
            border: none;
            overflow: hidden;
            transition: all .3s ease;
            cursor: pointer;
        }

        .btn-ultimate:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 10px 25px rgba(0, 0, 0, .3);
        }

        .btn-ultimate:active {
            transform: scale(.95);
        }

        /* 💥 Ripple */
        .btn-ultimate::after {
            content: "";
            position: absolute;
            width: 120px;
            height: 120px;
            top: 50%;
            left: 50%;
            transform: scale(0);
            background: rgba(255, 255, 255, .5);
            border-radius: 50%;
            opacity: 0;
            pointer-events: none;
        }

        .btn-ultimate:active::after {
            transform: scale(4);
            opacity: 0;
            transition: transform .6s ease, opacity .6s ease;
        }

        /* 🪄 Input & Select */
        .input-ultimate {
            border: 1px solid #d1d5db;
            border-radius: 8px;
            padding: 8px 12px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, .05);
            transition: all .3s ease;
            font-size: .9rem;
        }

        .input-ultimate:focus {
            border-color: #6366f1;
            box-shadow: 0 0 5px rgba(99, 102, 241, .5);
            outline: none;
        }

        /* 📄 Tabel */
        .table-ultimate {
            width: 100%;
            border-collapse: collapse;
            font-size: .9rem;
            background: #fff;
        }

        .table-ultimate th {
            background: #f3f4f6;
            text-align: center;
            padding: 10px;
            border-bottom: 2px solid #e5e7eb;
        }

        .table-ultimate td {
            padding: 10px;
            border-bottom: 1px solid #e5e7eb;
        }

        .table-ultimate tr:hover {
            background: #eef2ff;
            transition: .3s;
        }

        /* 🔥 Pagination Premium */
        .pagination {
            display: flex;
            gap: 5px;
            justify-content: center;
            padding: 10px 0;
        }

        .pagination a,
        .pagination span {
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 500;
            transition: .3s;
        }

        .pagination a {
            background: #f3f4f6;
            color: #4b5563;
        }

        .pagination a:hover {
            background: #4f46e5;
            color: #fff;
            transform: scale(1.05);
            box-shadow: 0 3px 8px rgba(0, 0, 0, .2);
        }

        .pagination .active {
            background: #4f46e5;
            color: #fff;
        }

        /* 🎨 Badge Tahun Ajaran */
        .badge-year {
            background: rgba(99, 102, 241, .1);
            color: #4f46e5;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 8px;
        }
    </style>

    @vite('resources/css/app.css', 'resources/js/app.js')
    @livewireStyles
</head>

<body class="bg-gray-100 font-sans antialiased">
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
        {{-- ✅ Header --}}
        @include('layouts.navigation')

        {{-- ✅ Sidebar + Main --}}
        @include('layouts.sidebar')

        <main class="pt-20 px-6 transition-all duration-500 ease-in-out text-gray-900"
            :class="open ? 'md:ml-64' : 'md:ml-0'">
            {{ $slot }}
        </main>
    </div>
    @livewireScripts
</body>

</html>