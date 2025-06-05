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
<section class="flex flex-col lg:flex-row items-center mt-9 justify-between px-10 py-16 ">
    <div data-aos-duration="1000" data-aos="fade-up" class=" max-w-xl mt-7 space-y-6">
        <h1 class="text-5xl font-bold leading-tight">
            {{ $judul1 ?? 'Temukan Mobil Impian Anda' }}
        </h1>
        <p class="text-gray-700 text-lg max-w-xl break-words whitespace-normal">
            {!! nl2br(e($deskripsi1 ?? 'Selamat Datang di Panji Shoorom
Temukan mobil impian Anda di tempat yang tepat! Kami menghadirkan berbagai pilihan mobil berkualitas dengan harga kompetitif, pelayanan ramah, dan proses transaksi yang mudah.')) !!}
        </p>
        <a href="/katalog" class="inline-flex items-center bg-black text-white px-6 py-3 rounded hover:bg-gray-800 transition-all duration-300 ease-in-out transform hover:scale-105 hover:rotate-3">
            TEMUKAN MOBIL
            <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10.293 15.707a1 1 0 010-1.414L13.586 11H4a1 1 0 110-2h9.586l-3.293-3.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"/>
            </svg>
        </a>
        <a href="#contact" class="inline-flex items-center bg-black text-white px-6 py-3 rounded hover:bg-gray-800 transition-all duration-300 ease-in-out transform hover:scale-105 hover:rotate-3">
            KONTAK KAMI
            <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10.293 15.707a1 1 0 010-1.414L13.586 11H4a1 1 0 110-2h9.586l-3.293-3.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"/>
            </svg>
        </a>
    </div>
   <div data-aos="fade-down" data-aos-duration="1000" class="mt-10 lg:mt-0 w-full max-w-md lg:max-w-xl">
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



@php
    use Illuminate\Support\Str;
    function fixImagePath($path) {
        return Str::startsWith($path, ['http://', 'https://']) ? $path : asset('storage/' . $path);
    }
@endphp

<div class="container mx-auto px-4 py-12">
    <!-- What We Do Section -->
    <section class="mb-2" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 text-gray-800">
            {{ $judulsec3 ?? 'Judul Default Section 3' }}
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            {{-- Gambarsec3 --}}
            @if($gambarsec3)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ fixImagePath($gambarsec3) }}" alt="Gambar Section 3" class="w-full h-48 object-cover">
                <div class="p-6">
                    <span class="text-sm font-semibold text-indigo-600">01</span>
                    <h3 class="text-xl font-bold mt-2 mb-3 text-gray-800">Unit Berkualitas</h3>
                    <p class="text-gray-600">Setiap unit telah melalui proses inspeksi menyeluruh untuk memastikan kualitas mesin dan bodi terbaik.</p>
                </div>
            </div>
            @endif

            {{-- Gambarsec4 --}}
            @if($gambarsec4)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="200">
                <img src="{{ fixImagePath($gambarsec4) }}" alt="Gambar Section 4" class="w-full h-48 object-cover">
                <div class="p-6">
                    <span class="text-sm font-semibold text-indigo-600">02</span>
                    <h3 class="text-xl font-bold mt-2 mb-3 text-gray-800">Harga Kompetitif</h3>
                    <p class="text-gray-600">Kami menawarkan harga mobil bekas yang masuk akal dan transparan, tanpa biaya tersembunyi.</p>
                </div>
            </div>
            @endif

            {{-- Gambarsec5 --}}
            @if($gambarsec5)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ fixImagePath($gambarsec5) }}" alt="Gambar Section 5" class="w-full h-48 object-cover">
                <div class="p-6">
                    <span class="text-sm font-semibold text-indigo-600">03</span>
                    <h3 class="text-xl font-bold mt-2 mb-3 text-gray-800">Proses Cepat & Aman</h3>
                    <p class="text-gray-600">Beli mobil jadi lebih simpel dengan layanan cepat, tanpa ribet</p>
                </div>
            </div>
            @endif

            {{-- Gambarsec6 --}}
            @if($gambarsec6)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="400">
                <img src="{{ fixImagePath($gambarsec6) }}" alt="Gambar Section 6" class="w-full h-48 object-cover">
                <div class="p-6">
                    <span class="text-sm font-semibold text-indigo-600">04</span>
                    <h3 class="text-xl font-bold mt-2 mb-3 text-gray-800">Pilihan Beragam</h3>
                    <p class="text-gray-600">Tersedia berbagai merek dan tipe mobil yang bisa disesuaikan dengan kebutuhan dan budget Anda.</p>
                </div>
            </div>
            @endif
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
        {{-- Left Column: Title, Text, Button, and Lower Image --}}
        <div class="flex flex-col justify-between">
            <div data-aos="fade-down-right" data-aos-duration="800" class="bg-black text-white p-6 rounded-md flex flex-col justify-between h-full">
                <div>
                    <h2 class="text-2xl font-bold mb-4">{{ $judul2 ?? 'About Our Company' }}</h2>
                    <p class="text-sm leading-relaxed text-gray-300">
                        {!! nl2br(e($deskripsi2 ?? 'We are an interior design company that prioritizes creativity and functionality to create your dream space. With high experience and dedication, we not only design, but also provide innovative solutions that enhance the comfort and aesthetics of your space. Every project we work on with full attention to detail, because we believe that every space has its own story.')) !!}
                    </p>
                </div>
                    @php
                            $noWa = preg_replace('/^0/', '62', $nomor ?? '');
                        @endphp
                    
                <a href="https://wa.me/{{ $nomor ?? '' }}" 
                   class="mt-6 bg-white text-black text-xs font-semibold px-6 py-3 rounded-full self-start hover:bg-gray-200 transition-all duration-300 ease-in-out transform hover:scale-105 hover:rotate-3">
                    CONTACT US!
                </a>
            </div>

            {{-- Optional Second Image (e.g. smaller car) --}}
            <div  data-aos="fade-up-right" data-aos-duration="800" class="mt-4">
                @php
                    $srcSmall = Str::startsWith($gambar1 ?? '', ['http://', 'https://'])
                        ? $gambar1
                        : asset('storage/gambarberanda/' . ($gambar1 ?? ''));
                @endphp

                @if(!empty($gambar1))
                    <img src="{{ $srcSmall }}" alt="Small Car Image" class="rounded-md shadow-md w-full object-cover">
                @else
                    <img src="https://via.placeholder.com/300x200" alt="Dummy Car" class="rounded-md shadow-md w-full object-cover">
                @endif
            </div>
        </div>

        {{-- Middle Column: Main Car Image --}}
        <div data-aos="zoom-in" data-aos-duration="800" >
            @php
                $src = Str::startsWith($gambar2, ['http://', 'https://'])
                    ? $gambar2
                    : asset('storage/gambarberanda/' . $gambar2);
            @endphp

            @if($gambar2)
                <img src="{{ $src }}" alt="Main Car Image" class="w-full h-full object-cover rounded-md shadow">
            @else
                <img src="https://via.placeholder.com/600x400" alt="Dummy Main Car" class="w-full h-full object-cover rounded-md shadow">
            @endif
        </div>

        {{-- Right Column: Contact Info & Heading --}}
        <div data-aos="fade-down-left" data-aos-duration="800" class="flex flex-col justify-between bg-white border border-gray-200 rounded-xl p-6 shadow space-y-6">
            {{-- Contact Info --}}
            <div >
                <h3 class="text-xl font-bold mb-4">Contact Us For More Information</h3>
                <ul class="text-sm space-y-2 text-gray-700">
                   
                    <li>
                        📧 <strong>Email:</strong> <a href="mailto:{{ $email }}">{{ $email }}</a>
                    </li>
                    <li>
                        📍 <strong>Alamat:</strong> {{ $alamat }}
                    </li>
                    <li>
                        💬 
                        @php
                            $noWa = preg_replace('/^0/', '62', $nomor ?? '');
                        @endphp
                        <strong>WhatsApp:</strong> 
                        <a href="https://wa.me/{{ $noWa }}" class="text-black font-semibold hover:text-green-600 hover:underline">
                            +{{ $noWa ?: 'No WA' }}
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Promo Text --}}
            <div>
                <h3 class="text-2xl font-bold text-gray-800">Discover<br><span class="text-pink-600">Your Perfect<br><span class="text-yellow-600">Dream Home</span></span></h3>
                <p class="text-sm mt-2 text-gray-600">
                    We will help you find the ideal interior design concept for your home.
                </p>
            </div>
        </div>
    </div>
</section>


