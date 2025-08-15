<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Administrasi Sekolah') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    {{ $slot }}
</body>
<script>
    function toggleRegisterPassword() {
        const input = document.getElementById('register-password');
        const eyeOpen = document.getElementById('register-eye-open');
        const eyeClosed = document.getElementById('register-eye-closed');

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

    function toggleRegisterPasswordConfirm() {
        const input = document.getElementById('register-password-confirm');
        const eyeOpen = document.getElementById('register-eye-open-confirm');
        const eyeClosed = document.getElementById('register-eye-closed-confirm');

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

</html>