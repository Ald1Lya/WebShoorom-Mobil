@php
    $path = $gambar1 ?? '';
    $isFullUrl = Str::startsWith($path, ['http://', 'https://']);
    $src = $isFullUrl ? $path : asset('storage/gambarberanda/' . $path);
@endphp

<section class="relative overflow-hidden">
    {{-- Background image dengan overlay --}}
    <div class="absolute inset-0 bg-center bg-cover" 
         style="background-image: url('{{ $src }}');">
        <div class="absolute inset-0 bg-black opacity-60"></div>
    </div>

    {{-- Konten yang harus di atas background --}}
<div class="relative z-10 flex flex-col lg:flex-row items-center mb-9 mt-9 justify-between px-6 sm:px-10 py-16 text-white">
    <div data-aos-duration="1000" data-aos="fade-up" class="max-w-xl mt-7 space-y-6 w-full mx-auto px-4 sm:px-0 text-center lg:text-left">
        <h1 class="text-5xl font-bold leading-tight">
            {{ $judul1 ?? 'Temukan Mobil Impian Anda' }}
        </h1>
        <p class="text-lg max-w-xl whitespace-normal break-words mx-auto">
            {!! nl2br(e($deskripsi1 ?? 'Selamat Datang di Panji Shoorom')) !!}
        </p>
        <a href="/katalog" class="inline-flex items-center bg-white text-black px-6 py-3 rounded hover:bg-gray-300 transition-all duration-300 ease-in-out transform hover:scale-105 hover:rotate-3">
            TEMUKAN MOBIL
        </a>
        <a href="#contact" class="inline-flex items-center bg-white text-black px-6 py-3 rounded hover:bg-gray-300 transition-all duration-300 ease-in-out transform hover:scale-105 hover:rotate-3">
            TENTANG KAMI
        </a>
    </div>
    <div data-aos="fade-down" data-aos-duration="1000" class="mt-10 lg:mt-0 w-full max-w-md lg:max-w-xl mx-auto px-4 sm:px-0">
        @if($gambar1)
            <img src="{{ $src }}" 
                 alt="Gambar Section 1"
                 class="rounded-xl shadow-lg w-full max-h-[500px] object-cover transition duration-300 hover:scale-105">
        @else
            <p class="text-white">No image available</p>
        @endif
    </div>
</div>

</section>

@php
    use Illuminate\Support\Str;
    
    function fixImagePath($path) {
        if(empty($path)) {
            return '';
        }
        return Str::startsWith($path, ['http://', 'https://']) ? $path : asset('storage/' . $path);
    }
@endphp

<div class="container mx-auto px-4 py-12">
    <!-- What We Do Section -->
    <section class="mt-9 mb-9" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 text-gray-800">
            {{ $judulsec3 ?? 'Judul Default Section 3' }}
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @isset($gambarsec3)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ fixImagePath($gambarsec3) }}" alt="Gambar Section 3" class="w-full h-48 object-cover">
                <div class="p-6">
                    <span class="text-sm font-semibold text-indigo-600">01</span>
                    <h3 class="text-xl font-bold mt-2 mb-3 text-gray-800">Unit Berkualitas</h3>
                    <p class="text-gray-600">Setiap unit telah melalui proses inspeksi menyeluruh untuk memastikan kualitas mesin dan bodi terbaik.</p>
                </div>
            </div>
            @endisset

            @isset($gambarsec4)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="200">
                <img src="{{ fixImagePath($gambarsec4) }}" alt="Gambar Section 4" class="w-full h-48 object-cover">
                <div class="p-6">
                    <span class="text-sm font-semibold text-indigo-600">02</span>
                    <h3 class="text-xl font-bold mt-2 mb-3 text-gray-800">Harga Kompetitif</h3>
                    <p class="text-gray-600">Kami menawarkan harga mobil bekas yang masuk akal dan transparan, tanpa biaya tersembunyi.</p>
                </div>
            </div>
            @endisset

            @isset($gambarsec5)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ fixImagePath($gambarsec5) }}" alt="Gambar Section 5" class="w-full h-48 object-cover">
                <div class="p-6">
                    <span class="text-sm font-semibold text-indigo-600">03</span>
                    <h3 class="text-xl font-bold mt-2 mb-3 text-gray-800">Proses Cepat & Aman</h3>
                    <p class="text-gray-600">Beli mobil jadi lebih simpel dengan layanan cepat, tanpa ribet</p>
                </div>
            </div>
            @endisset

            @isset($gambarsec6)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="400">
                <img src="{{ fixImagePath($gambarsec6) }}" alt="Gambar Section 6" class="w-full h-48 object-cover">
                <div class="p-6">
                    <span class="text-sm font-semibold text-indigo-600">04</span>
                    <h3 class="text-xl font-bold mt-2 mb-3 text-gray-800">Pilihan Beragam</h3>
                    <p class="text-gray-600">Tersedia berbagai merek dan tipe mobil yang bisa disesuaikan dengan kebutuhan dan budget Anda.</p>
                </div>
            </div>
            @endisset
        </div>
    </section>

    <div class="text-center mt-6">
      <a href="/katalog" class="inline-flex items-center bg-black text-white px-6 py-3 rounded hover:bg-gray-800 transition-all duration-300 ease-in-out transform hover:scale-105 hover:rotate-3">
        LIHAT SEMUA
        <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10.293 15.707a1 1 0 010-1.414L13.586 11H4a1 1 0 110-2h9.586l-3.293-3.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"/>
        </svg>
      </a>
    </div>
</div>




{{-- SECTION 2 --}}
<section id="contact" class="max-w-7xl mx-auto my-16 px-4 md:px-8">
    <div class="grid mt-5 md:grid-cols-3 gap-4">

        {{-- Kolom Kiri --}}
        <div class="flex flex-col justify-between">
            <div data-aos="fade-down-right" data-aos-duration="800" class="bg-black text-white p-6 rounded-md h-full flex flex-col justify-between">
                <div>
                    <h2 class="text-2xl font-bold mb-4">{{ $judul2 ?? 'About Our Company' }}</h2>
                    <p class="text-sm leading-relaxed text-gray-300">
                        {!! nl2br(e($deskripsi2 ?? 'We are an interior design company...')) !!}
                    </p>
                </div>
            </div>

            {{-- Gambar Kecil --}}
            <div data-aos="fade-up-right" data-aos-duration="800" class="mt-4">
                @php
                    $srcSmall = '';
                    if (!empty($gambar1)) {
                        $srcSmall = Str::startsWith($gambar1, ['http://', 'https://'])
                            ? $gambar1
                            : asset('storage/gambarberanda/' . $gambar1);
                    }
                @endphp

                <img src="{{ $srcSmall ?: 'https://via.placeholder.com/300x200' }}" alt="Small Car Image" class="rounded-md shadow-md w-full object-cover">
            </div>
        </div>

        {{-- Kolom Tengah: Gambar Besar --}}
        <div data-aos="zoom-in" data-aos-duration="800">
            @php
                $src = !empty($gambar2)
                    ? (Str::startsWith($gambar2, ['http://', 'https://'])
                        ? $gambar2
                        : asset('storage/gambarberanda/' . $gambar2))
                    : 'https://via.placeholder.com/600x400';
            @endphp

            <img src="{{ $src }}" alt="Main Car Image" class="w-full h-full object-cover rounded-md shadow">
        </div>

        {{-- Kolom Kanan: Kontak --}}
        <div data-aos="fade-down-left" data-aos-duration="800" class="flex flex-col justify-between bg-white border border-gray-200 rounded-xl p-6 shadow space-y-6">
            <div>
                <h3 class="text-xl font-bold mb-4">Contact Us For More Information</h3>
                <ul class="text-sm space-y-2 text-gray-700">
                    <li>
                        📧 <strong>Email:</strong> <a href="mailto:{{ $email ?? '#' }}">{{ $email ?? 'Email tidak tersedia' }}</a>
                    </li>
                    <li>
                        📍 <strong>Alamat:</strong> {{ $alamat ?? 'Alamat tidak tersedia' }}
                    </li>
                </ul>
            </div>

            {{-- Promo --}}
            <div>
                <h3 class="text-2xl font-bold text-gray-800">
                    Discover<br>
                    <span class="text-pink-600">Your Perfect<br>
                        <span class="text-yellow-600">Dream Home</span>
                    </span>
                </h3>
                <p class="text-sm mt-2 text-gray-600">
                    We will help you find the ideal interior design concept for your home.
                </p>
            </div>
        </div>

    </div>



            {{-- Google Maps --}}
        <div class="flex items-center mt-9 justify-center">
            <div class="w-full h-full rounded-xl overflow-hidden shadow-lg ">
                @if (!empty($embedUrl))
            <div class="relative">
                <iframe 
                    src="{{ $embedUrl }}" 
                    width="100%" 
                    height="400" 
                    style="border:0;" 
                    allowfullscreen 
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        @else
        
            <div class="h-96 flex items-center justify-center bg-gray-100 dark:bg-gray-800">
                <p class="text-gray-500 dark:text-gray-400">Peta tidak tersedia</p>
            </div>
        @endif

            </div>
        </div>
</section>



@if($events)
<div id="popupEvent" class="fixed inset-0 bg-black/30 backdrop-blur-sm flex justify-center items-center z-50 opacity-0 pointer-events-none transition-opacity duration-500">
    <div class="bg-white rounded-xl p-6 max-w-md w-full relative shadow-2xl scale-95 transition-transform duration-500">
        <button onclick="hidePopup()" class="absolute top-2 right-2 text-gray-500 hover:text-red-600 text-xl font-bold transition-colors duration-200">&times;</button>

        <div class="text-center mb-4">
            <h2 class="text-2xl font-bold text-gray-800 mb-1 flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ $events->title ?? 'Ada Event Spesial!' }}
            </h2>
            <div class="w-20 h-1 bg-indigo-500 mx-auto rounded-full"></div>
        </div>

        <div class="mb-4 overflow-hidden rounded-lg shadow-md border border-gray-100">
            @if($events->image_url)
                <img src="{{ asset('storage/' . $events->image_url) }}" alt="Event Image"
                     class="w-full h-48 object-cover hover:scale-105 transition-transform duration-500">
            @else
                <div class="bg-gray-100 h-48 flex items-center justify-center">
                    <p class="text-gray-500">Gambar event tidak tersedia</p>
                </div>
            @endif
        </div>

        <div class="space-y-3 text-gray-700">
            <div class="flex items-start gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-800 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div class="whitespace-pre-line">{{ $events->description ?? 'Deskripsi event belum tersedia' }}</div>
            </div>

            <div class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span class="font-medium">{{ $events->event_date ?? 'Tanggal belum ditentukan' }}</span>
            </div>

            <div class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="font-medium">{{ $events->event_time ?? 'Waktu belum ditentukan' }}</span>
            </div>

            <div class="flex items-start gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-800 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>{{ $events->location ?? 'Lokasi belum ditentukan' }}</span>
            </div>
        </div>

        <div class="mt-6 flex justify-center">
            <a href="/berita">
                <button  onclick="hidePopup()" class="px-6 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Lihat Selengkapnya
                </button>
            </a>
        </div>
    </div>
</div>

    <script>
        function hidePopup() {
            const popup = document.getElementById('popupEvent');
            if (popup) {
                popup.classList.add('opacity-0', 'pointer-events-none');
            }
        }

        window.addEventListener('DOMContentLoaded', () => {
            const popup = document.getElementById('popupEvent');
            if (popup) {
                popup.classList.remove('opacity-0', 'pointer-events-none');

                // Durasi tampil, bisa disesuaikan
                setTimeout(() => {
                    hidePopup();
                }, 4000); // 4 detik
            }
        });
    </script>
@endif

 

