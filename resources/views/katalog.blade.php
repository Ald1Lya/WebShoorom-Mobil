<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <!-- Pastikan ini ditaruh di <head> atau sebelum penutup </body> -->
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <title>PanjiShoorom</title>
</head>

<body>

    <x-navbar></x-navbar>

    {{-- Panggil Komponen katalog --}}
    <x-katalog :katalogs="$katalogs" :mereks="$mereks"></x-katalog>

    <x-footer></x-footer>
</body>

</html>
