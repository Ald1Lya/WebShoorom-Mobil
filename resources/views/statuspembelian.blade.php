<!DOCTYPE html>
<html lang="en"  class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <title>PanjiShoorom</title>
</head>

<body class="scroll-smooth" >

    <x-navbar></x-navbar>

    <x-statuspembelian :pembelians="$pembelians" />

    <x-footer></x-footer>
</body>
<!-- Sebelum </body> -->

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init();
</script>

</html>
