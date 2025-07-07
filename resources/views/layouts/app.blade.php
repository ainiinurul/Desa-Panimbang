<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Panimbang - {{ $title ?? 'Beranda' }}</title>

    {{-- Aset dari Vite (untuk CSS & JS utama) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Link CDN jika dibutuhkan (misal: FontAwesome) --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    {{-- INI BAGIAN YANG PALING PENTING UNTUK DITAMBAHKAN --}}
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="font-sans antialiased text-gray-800">
    <x-navbar></x-navbar>

    <main>
        @yield('content')
    </main>

    <x-footer></x-footer>
</body>
</html>