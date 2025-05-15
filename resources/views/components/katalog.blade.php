<section class="bg-white py-10 mt-7 px-4 mx-auto max-w-screen-xl lg:px-6">
  <div class="text-center mt-7 mx-auto mb-12 max-w-screen-md">
    <h2 class="text-4xl font-bold text-gray-800 mb-4"> Model Mobil</h2>
    <p class="text-gray-500 text-lg">Temukan mobil impianmu dengan harga terbaik dan kondisi terbaik</p>
  </div>

  <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
    @foreach ($katalogs as $katalog)
      <div class="bg-white rounded-2xl overflow-hidden transform hover:scale-[1.02] transition duration-300">

        <!-- Image -->
        <div class="w-full h-56 bg-gray-100 overflow-hidden">
          <img 
            src="{{ asset('storage/' . $katalog->foto_utama) }}" 
            alt="{{ $katalog->nama }}" 
            class="w-full h-full object-cover object-center rounded-t-2xl"
          >
        </div>

        <!-- Content -->
        <div class="p-5 space-y-3">
          <!-- Nama Mobil -->
          <h3 class="text-xl font-semibold text-gray-800">{{ $katalog->nama }}</h3>

          <!-- Harga & Tombol dalam satu baris -->
          <div class="flex items-center justify-between">
            <p class="text-gray-700 font-semibold text-sm">
              Rp{{ number_format($katalog->harga, 0, ',', '.') }}
            </p>
            <a href="#" class="inline-flex items-center px-4 py-1.5 text-sm font-medium text-white bg-black rounded-md hover:bg-gray-800 transition duration-300">
              <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H3m0 0l4-4m-4 4l4 4m13-4h-6" />
              </svg>
              Lihat Detail
            </a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</section>
