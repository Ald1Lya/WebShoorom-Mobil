<section class="mt-7 py-12 px-4 mx-auto max-w-screen-xl" x-data="{ openModalId: null }">
  <div class="text-center mt-7 mx-auto mb-12 max-w-2xl">
    <h2 class="text-4xl font-bold text-gray-900 mb-3">Model Mobil</h2>
    <div class="w-20 h-1 bg-blue-600 mx-auto mb-4"></div>
    <p class="text-gray-600 text-lg font-light">Temukan mobil impianmu dengan harga terbaik dan kondisi terbaik</p>
  </div>

  
<div class="space-y-2 mb-7">
  <label class="block text-gray-700 font-semibold">Pilih Merek Mobil</label>
  <input type="hidden" name="merek_id" id="merek_id">

  <div class="flex flex-wrap gap-2" id="merek-options">
    <button type="button" id="btn-semua" 
        class="px-4 py-2 border border-gray-300 rounded-lg text-sm text-gray-700 hover:bg-blue-100 transition">
      Semua Merek
    </button>

    @foreach ($mereks as $merek)
      <button type="button" 
          class="merek-btn px-4 py-2 border border-gray-300 rounded-lg text-sm text-gray-700 hover:bg-blue-100 transition" 
          data-id="{{ $merek->id }}">
        {{ $merek->nama_merek }}
      </button>
    @endforeach
  </div>
</div>





  <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
    @foreach ($katalogs as $katalog)
      <div class="group bg-white rounded-xl overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-1 border border-gray-100">
        <!-- Image -->
        <div class="relative overflow-hidden h-60">
          <img 
            src="{{ asset('storage/' . $katalog->foto_utama) }}" 
            alt="{{ $katalog->nama }}" 
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
          >
          <!-- Status badge -->
          <div class="absolute top-3 right-3">
            <span class="px-3 py-1 text-xs font-medium rounded-full {{ $katalog->status == 'tersedia' ? 'bg-black text-white' : 'bg-red-100 text-red-800' }}">
              {{ ucfirst($katalog->status) }}
            </span>
          </div>
        </div>

        <!-- Content -->
        <div class="p-5 space-y-3">
          <div class="flex justify-between items-start">
            <div>
              <h3 class="text-lg font-semibold text-gray-900">{{ $katalog->nama }}</h3>
              <p class="text-gray-500 text-sm">{{ $katalog->tahun }} || {{ ( $katalog->merek->nama_merek ) }}</p>
            </div>
            <span class="text-blue-600 font-bold">Rp{{ number_format($katalog->harga, 0, ',', '.') }}</span>
          </div>

          <div class="pt-2 border-t border-gray-100">
            <button 
              @click="openModalId = {{ $katalog->id }}" 
              class="w-full flex items-center justify-center px-4 py-2.5 text-sm font-medium text-white bg-gray-900 rounded-lg hover:bg-gray-800 transition duration-300"
            >
              <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
              Lihat Detail
            </button>
          </div>
        </div>
      </div>

      <!-- Modal Detail -->
      <div 
        x-show="openModalId === {{ $katalog->id }}" 
        @click.outside="openModalId = null"
        x-transition
        class="fixed inset-0 z-50 flex items-center justify-center p-4 backdrop-blur-sm"
        style="display: none;"
      >
        <div class="bg-white w-full max-w-4xl rounded-xl shadow-2xl overflow-hidden relative max-h-[90vh] overflow-y-auto transform transition-all duration-300 scale-100">
          <!-- Close button -->
          <button 
            @click="openModalId = null"
            class="absolute top-4 right-4 z-10 p-2 rounded-full bg-white shadow-md hover:bg-gray-100 transition"
          >
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>

          <div class="flex flex-col lg:flex-row">
            <!-- Image Slider -->
            <div class="lg:w-1/2 bg-gray-100 relative" 
                 x-data="{
                    current: 0,
                    images: [
                      { src: '{{ asset('storage/' . $katalog->foto_utama) }}', label: 'Foto Depan' },
                      @if($katalog->foto1) { src: '{{ asset('storage/' . $katalog->foto1) }}', label: 'Foto Samping' }, @endif
                      @if($katalog->foto2) { src: '{{ asset('storage/' . $katalog->foto2) }}', label: 'Interior' }, @endif
                      @if($katalog->foto3) { src: '{{ asset('storage/' . $katalog->foto3) }}', label: 'Mesin / Belakang' }, @endif
                    ],
                    next() { this.current = (this.current + 1) % this.images.length },
                    prev() { this.current = (this.current - 1 + this.images.length) % this.images.length }
                 }"
            >
              <template x-if="images.length">
                <img :src="images[current].src" alt="Foto Mobil"
                     class="w-full h-80 lg:h-full object-cover transition duration-500" />
              </template>

              <div class="absolute bottom-4 left-4 bg-white bg-opacity-80 text-gray-700 px-3 py-1 text-sm rounded-lg shadow"
                   x-text="images[current].label"></div>

              <button @click="prev"
                      class="absolute left-3 top-1/2 -translate-y-1/2 bg-white bg-opacity-60 p-2 rounded-full shadow hover:bg-opacity-90 transition">
                &#8592;
              </button>
              <button @click="next"
                      class="absolute right-3 top-1/2 -translate-y-1/2 bg-white bg-opacity-60 p-2 rounded-full shadow hover:bg-opacity-90 transition">
                &#8594;
              </button>
            </div>

            <!-- Detail Info -->
            <div class="lg:w-1/2 p-6 lg:p-8 space-y-5">
              <div>
                <h2 class="text-2xl font-bold text-gray-900">{{ $katalog->nama }}</h2>
                <p class="text-blue-600 font-bold text-xl mt-1">Rp{{ number_format($katalog->harga, 0, ',', '.') }}</p>
              </div>

              <div class="grid grid-cols-2 gap-4 pt-3">
                <div class="space-y-1">
                  <p class="text-sm text-gray-500">Tahun</p>
                  <p class="font-medium">{{ $katalog->tahun }}</p>
                </div>
                <div class="space-y-1">
                  <p class="text-sm text-gray-500">Transmisi</p>
                  <p class="font-medium">{{ $katalog->transmisi }}</p>
                </div>
                <div class="space-y-1">
                  <p class="text-sm text-gray-500">Merek</p>
                  <p class="font-medium">{{ $katalog->merek->nama_merek }}</p>
                </div>
                <div class="space-y-1">
                  <p class="text-sm text-gray-500">Bahan Bakar</p>
                  <p class="font-medium">{{ $katalog->bahan_bakar }}</p>
                </div>
                <div class="space-y-1">
                  <p class="text-sm text-gray-500">Kilometer</p>
                  <p class="font-medium">{{ number_format($katalog->kilometer) }} KM</p>
                </div>
              </div>

              <div class="pt-4 border-t border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Deskripsi</h3>
                <p class="text-gray-600 leading-relaxed">{{ $katalog->deskripsi }}</p>
              </div>

              <div class="pt-4">
                <button class="w-full bg-black hover:bg-white hover:text-black text-white font-medium py-3 px-4 rounded-lg transition duration-300">
                  Hubungi Penjual
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</section>


<script>
  const merekBtns = document.querySelectorAll('.merek-btn');
  const merekIdInput = document.getElementById('merek_id');
  const btnSemua = document.getElementById('btn-semua');

  // Fungsi reset pilihan
  function resetSelection() {
    merekBtns.forEach(btn => btn.classList.remove('bg-black', 'text-white'));
    merekIdInput.value = '';
    btnSemua.classList.add('bg-black', 'text-white');
  }

  // Saat klik tombol "Semua Merek"
  btnSemua.addEventListener('click', () => {
    resetSelection();
    // TODO: lakukan fetch ulang tanpa filter, atau submit form, tergantung implementasi
    filterByMerek('');
  });

  merekBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      // Hilangkan style "semua merek"
      btnSemua.classList.remove('bg-black', 'text-white');

      // Hilangkan semua pilihan lain dulu
      merekBtns.forEach(b => b.classList.remove('bg-black', 'text-white'));

      // Tandai tombol ini aktif
      btn.classList.add('bg-black', 'text-white');

      // Set hidden input merek_id
      merekIdInput.value = btn.dataset.id;

      // Lakukan pencarian / filter berdasarkan merek dipilih
      filterByMerek(btn.dataset.id);
    });
  });

  function filterByMerek(merekId) {
    if (merekId) {
      window.location.href = `?merek_id=${merekId}`;
    } else {
      window.location.href = window.location.pathname;
    }
  }

  const urlParams = new URLSearchParams(window.location.search);
  const currentMerekId = urlParams.get('merek_id');
  if (currentMerekId) {
    btnSemua.classList.remove('bg-black', 'text-white');
    merekBtns.forEach(btn => {
      if (btn.dataset.id === currentMerekId) {
        btn.classList.add('bg-black', 'text-white');
        merekIdInput.value = currentMerekId;
      }
    });
  } else {
    resetSelection();
  }
</script>

