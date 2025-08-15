<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Website Sekolah</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gradient-to-br from-blue-100 to-white min-h-screen flex items-center justify-center">

    <div class="text-center px-6 py-10 bg-white rounded-lg shadow-xl max-w-xl">
        <img src="{{ asset('img/logo.png') }}" alt="Logo Sekolah" class="mx-auto w-24 h-24 mb-4">
        <h1 class="text-3xl font-bold text-blue-700 mb-4">Selamat Datang di Portal Sekolah</h1>
        <p class="text-gray-600 mb-6">
            Sistem administrasi sekolah berbasis Laravel. Silakan login untuk mengakses fitur-fitur manajemen data siswa, guru, dan keuangan.
        </p>

        <a href="{{ route('login') }}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
            Masuk ke Sistem
        </a>
    </div>

</body>
</html>
