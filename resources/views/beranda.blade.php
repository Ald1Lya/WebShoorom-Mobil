<!DOCTYPE html>
<html lang="en"  class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <title>ShooromJMB</title>
</head>

<body class="scroll-smooth" >

    <x-navbar></x-navbar>

    {{-- Panggil Komponen Beranda --}}
<x-beranda
    :judul1="$judul1"
    :deskripsi1="$deskripsi1"
    :gambar1="$gambar1"
    :judul2="$judul2"
    :deskripsi2="$deskripsi2"
    :gambar2="$gambar2"
    :alamat="$alamat"
    :email="$email"
    :nomor="$nomor"
    :google_maps="$google_maps"
    :judulsec3="$judulsec3"
    :gambarsec3="$gambarsec3"
    :gambarsec4="$gambarsec4"
    :gambarsec5="$gambarsec5"
    :gambarsec6="$gambarsec6"
    :embed-url="$embedUrl"
    :events="$events"
/>

    <x-footer></x-footer>
</body>
<!-- Sebelum </body> -->

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init();
</script>

</html>
