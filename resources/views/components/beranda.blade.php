{{-- Notifikasi jika ada --}}
@if(session('success') || $errors->any())
<div class="fixed top-5 right-5 z-50">
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded shadow mb-4 flex items-start gap-2 animate-fade-in">
        <i class="fas fa-check-circle mt-1"></i>
        <div>
            <p class="font-semibold">{{ session('success') }}</p>
        </div>
        <button onclick="this.parentElement.remove()" class="ml-auto text-green-600 hover:text-green-900">
            <i class="fas fa-times"></i>
        </button>
    </div>
    @endif

    @if($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded shadow flex items-start gap-2 animate-fade-in">
        <i class="fas fa-exclamation-triangle mt-1"></i>
        <div>
            <p class="font-semibold">Terjadi kesalahan:</p>
            <ul class="list-disc pl-4 text-sm">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <button onclick="this.parentElement.remove()" class="ml-auto text-red-600 hover:text-red-900 ">
            <i class="fas fa-times"></i>
        </button>
    </div>
    @endif
</div>
@endif

{{-- SECTION 1 --}}
<section class="flex flex-col lg:flex-row items-center mt-9 justify-between px-10 py-16">
    <div class="max-w-xl mt-7 space-y-6">
        <h1 class="text-5xl font-bold leading-tight">
            {{ $judul1 ?? 'Temukan Mobil Impian Anda' }}
        </h1>
        <p class="text-gray-700 text-lg">
            {!! nl2br(e($deskripsi1 ?? 'Selamat Datang di Panji Shoorom
Temukan mobil impian Anda di tempat yang tepat! Kami menghadirkan berbagai pilihan mobil berkualitas dengan harga kompetitif, pelayanan ramah, dan proses transaksi yang mudah.')) !!}
        </p>
        <a href="/katalog" class="inline-flex items-center bg-black text-white px-6 py-3 rounded hover:bg-gray-800 transition-all duration-300 ease-in-out transform hover:scale-105 hover:rotate-3">
            TEMUKAN MOBIL
            <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10.293 15.707a1 1 0 010-1.414L13.586 11H4a1 1 0 110-2h9.586l-3.293-3.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"/>
            </svg>
        </a>
    </div>
   <div class="mt-10 lg:mt-0 w-full max-w-md lg:max-w-xl">
    @php
        $src = Str::startsWith($gambar1, ['http://', 'https://'])
            ? $gambar1
            : asset('storage/gambarberanda/' . $gambar1);
    @endphp

    @if($gambar1)
        <img src="{{ $src }}"
             alt="Gambar Section 1"
             class="rounded-xl shadow-lg w-full max-h-[500px] object-cover transition duration-300 hover:scale-105">
    @else
        <p>No image available</p>
    @endif
</div>

</section>

{{-- SECTION 2 --}}
<section class="max-w-7xl mx-auto my-16 px-4 md:px-8">
    <div class="bg-white rounded-2xl shadow-xl flex flex-col md:flex-row gap-8 overflow-hidden">
        <div class="bg-black text-white p-8 flex flex-col justify-between w-full md:w-1/3">
            <div>
                <h2 class="text-3xl font-bold mb-4">{{ $judul2 ?? 'About Our Company' }}</h2>
                <p class="text-sm md:text-base leading-relaxed text-gray-300">
                    {!! nl2br(e($deskripsi2 ?? 'We are an interior design company that prioritizes creativity and functionality to create your dream space. With high experience and dedication, we not only design, but also provide innovative solutions that enhance the comfort and aesthetics of your space. Every project we work on with full attention to detail, because we believe that every space has its own story.')) !!}
                </p>
            </div>
           
            <a href="https://wa.me/{{ $nomor ?? '' }}" 
                class="mt-6 bg-white text-black text-xs font-semibold px-7 py-5 rounded-full self-start hover:bg-gray-200 transition-all duration-300 ease-in-out transform hover:scale-105 hover:rotate-3">
                CONTACT US!
            </a>
            
        </div>
        <div class="w-full md:w-2/3 p-4 flex items-center justify-center">
            @php
                // Cek apakah $gambar1 sudah URL lengkap
                $src = Str::startsWith($gambar2, ['http://', 'https://'])
                    ? $gambar2
                    : asset('storage/gambarberanda/' . $gambar2);
            @endphp

            @if($gambar2)
                <img src="{{ $src }}"
                    alt="Gambar Section 1"
                    class="rounded-lg shadow-md w-full h-auto max-h-80 object-cover">
            @else
                <p>No image available</p>
            @endif  
        </div>
<div class="flex-1 bg-white border border-gray-200 rounded-xl p-6 shadow-md space-y-4">
    <h3 class="text-2xl font-semibold text-gray-800 border-b border-gray-300 pb-2">Hubungi Kami</h3>

    <p class="flex items-center text-base text-gray-700">
        📧 <span class="ml-3"><strong>Email:</strong> <a href="mailto:{{ $email }}">{{ $email }}</a></span>
    </p>
    <p class="flex items-center text-base text-gray-700">
        📍 <span class="ml-3"><strong>Alamat:</strong> {{ $alamat }}</span>
    </p>
       @php
            $noWa = preg_replace('/^0/', '62', $nomor ?? '');
        @endphp

        <p class="flex items-center text-base text-gray-700">
            💬 
            <span class="ml-3">
                <strong>WhatsApp:</strong>
                <a href="https://wa.me/{{ $noWa }}"
                class="text-black font-semibold transition-all duration-300 ease-in-out hover:text-green-600 hover:scale-105 hover:underline">
                +{{ $noWa ?: 'No WA' }}
                </a> 
            </span>
        </p>


</div>



    </div>
</section>
