<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <!-- Pastikan ini ditaruh di <head> atau sebelum penutup </body> -->
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <title>ShooromJMB</title>
</head>

<body>

    <x-navbar></x-navbar>

    {{-- Panggil Komponen katalog --}}
    <x-katalog :katalogs="$katalogs" :mereks="$mereks" :pesan="$pesan" :makelars="$makelars"></x-katalog>

    <x-footer></x-footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</html>
