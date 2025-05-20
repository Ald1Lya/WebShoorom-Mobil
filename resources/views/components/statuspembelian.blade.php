<div class="max-w-6xl mx-auto p-6 bg-white rounded-xl shadow-lg mt-8">
  <h2 class="text-3xl font-bold mt-6 mb-8 text-center text-white bg-gradient-to-r from-gray-800 to-black py-4 px-6 rounded-lg shadow-md">
    Status Pembelian Mobil
  </h2>

  <div class="grid grid-cols-1 gap-6">
    @forelse ($pembelians as $pembelian)
      @php $katalog = $pembelian->katalog; @endphp

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 border border-gray-200 rounded-xl p-6 hover:shadow-lg transition-all duration-300">
        <div class="relative group overflow-hidden rounded-lg">
          <img src="{{ asset('storage/' . $katalog->foto_utama) }}" alt="{{ $katalog->nama }}" 
               class="w-full h-64 md:h-72 object-cover rounded-lg transform group-hover:scale-105 transition-transform duration-500">
        </div>

        <div class="flex flex-col justify-between">
          <div>
            <div class="flex justify-between items-start mb-3">
              <h3 class="text-2xl font-bold text-gray-800">{{ $katalog->nama }}</h3>
              <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full">
                #{{ $pembelian->nomor_order }}
              </span>
            </div>

            <div class="flex flex-wrap gap-2 mb-4">
              <span class="bg-gray-100 text-gray-800 text-sm px-3 py-1 rounded-full">
                {{ $katalog->merek->nama_merek }}
              </span>
              <span class="bg-gray-100 text-gray-800 text-sm px-3 py-1 rounded-full">
                {{ $katalog->tahun }}
              </span>
            </div>

            <p class="text-2xl font-bold text-blue-600 mb-4">
              Rp {{ number_format($katalog->harga, 0, ',', '.') }}
            </p>

            <div class="space-y-3 text-gray-700">
              <div class="flex items-center">
                <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                {{ \Carbon\Carbon::parse($pembelian->tanggal_pembelian)->format('d M Y') }}
              </div>

              <div class="flex items-center">
                <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                </svg>
                {{ $pembelian->metode_pembayaran }}
              </div>

              <div class="flex items-center">
                <span class="font-medium mr-2">Status:</span>
                <span class="px-3 py-1 rounded-full text-xs font-semibold
                  {{ 
                    $pembelian->status == 'disetujui' ? 'bg-green-100 text-green-800' :
                    ($pembelian->status == 'ditolak' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800')
                  }}">
                  {{ strtoupper($pembelian->status) }}
                </span>
              </div>
            </div>
          </div>

          <div class="mt-6">
            @if ($pembelian->status === 'menunggu')
              <button class="w-full px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition-colors duration-300 text-sm font-medium" disabled>
                MENUNGGU KONFIRMASI
              </button>

            @elseif ($pembelian->status === 'disetujui')
              <button 
                data-modal-target="buktiModal{{ $pembelian->id }}" 
                data-modal-toggle="buktiModal{{ $pembelian->id }}"
                class="w-full px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition-colors duration-300 text-sm font-medium">
                CETAK BUKTI PEMBAYARAN
              </button>

              <!-- Modal -->
              <div id="buktiModal{{ $pembelian->id }}" tabindex="-1" aria-hidden="true" 
                   class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full inset-0 h-modal h-full">
                <div class="relative p-4 w-full max-w-lg h-full md:h-auto mx-auto">
                  <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-5 rounded-t border-b">
                      <h3 class="text-xl font-semibold text-gray-900">
                        Bukti Pembayaran
                      </h3>
                      <button type="button" 
                              class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" 
                              data-modal-hide="buktiModal{{ $pembelian->id }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                      </button>
                    </div>

                    <!-- Modal body -->
                    <div class="p-6 space-y-4 text-gray-700">
                      <!-- Isi modal sesuai kebutuhan, misal detail pembayaran -->
                      <p>Detail pembayaran untuk order #{{ $pembelian->nomor_order }}.</p>
                      <p>Nama Mobil: {{ $katalog->nama }}</p>
                      <p>Harga: Rp {{ number_format($katalog->harga, 0, ',', '.') }}</p>
                      <p>Tanggal Pembelian: {{ \Carbon\Carbon::parse($pembelian->tanggal_pembelian)->format('d M Y') }}</p>
                      <p>Metode Pembayaran: {{ $pembelian->metode_pembayaran }}</p>
                    </div>

                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200">
                      <a href="{{ url('cetak-bukti/'.$pembelian->id) }}" target="_blank"
                         class="text-white bg-black hover:bg-gray-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Cetak PDF
                      </a>
                      <button data-modal-hide="buktiModal{{ $pembelian->id }}" type="button" 
                              class="text-gray-500 bg-white hover:bg-gray-100 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5">
                        Tutup
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            @endif
          </div>
        </div>
      </div>
    @empty
      <p class="text-center text-gray-500 mt-8">Belum ada pembelian mobil.</p>
    @endforelse
  </div>
</div>
