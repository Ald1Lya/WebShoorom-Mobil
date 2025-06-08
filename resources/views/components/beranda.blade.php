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
                    <ul class="mt-4 text-sm space-y-2">
                        <li>
                            📍 <strong>Maps:</strong><br>
                            <a href="{{ $beranda->google_maps ?? '#' }}" target="_blank" class="text-blue-500 hover:text-blue-700 font-semibold underline transition">
                                Lihat Lokasi di Google Maps
                            </a>
                        </li>

                        {{-- Konversi URL ke embed --}}
                      @php
function convertGoogleMapsToEmbed($mapUrl)
{
    if (empty($mapUrl) || !filter_var($mapUrl, FILTER_VALIDATE_URL)) {
        return '';
    }

    if (strpos($mapUrl, 'google.com/maps') === false) {
        return '';
    }

    // Tangkap koordinat latitude dan longitude dari bagian @lat,lng,...
    if (preg_match('/@(-?\d+\.\d+),(-?\d+\.\d+),/', $mapUrl, $matches)) {
        $lat = $matches[1];
        $lng = $matches[2];
        return "https://www.google.com/maps?q={$lat},{$lng}&output=embed";
    }

    // Tangkap nama tempat di URL sebagai fallback
    if (preg_match('/place\/([^\/]+)/', $mapUrl, $matches)) {
        $place = urldecode(str_replace('+', ' ', $matches[1]));
        return "https://www.google.com/maps?q={$place}&output=embed";
    }

    // Fallback umum
    return 'https://www.google.com/maps?q=' . urlencode($mapUrl) . '&output=embed';
}

$embedUrl = convertGoogleMapsToEmbed($beranda->google_maps ?? '');
@endphp


                        <li>
                            <div class="w-full h-64 rounded-xl overflow-hidden shadow-lg border border-gray-300 dark:border-gray-600 mt-4">
                                @if (!empty($embedUrl))
                                    <iframe
                                        src="{{ $embedUrl }}"
                                        width="100%"
                                        height="400"
                                        style="border:0;"
                                        allowfullscreen=""
                                        loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"
                                    ></iframe>
                                @else
                                    <p>Peta tidak tersedia</p>
                                @endif
                            </div>
                        </li>
                    </ul>
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
</section>


