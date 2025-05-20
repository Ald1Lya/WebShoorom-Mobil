@extends('layouts.admin')

@section('content')
    <h1 class="text-4xl font-extrabold text-gray-800 mb-2">🎛️ Admin Panel</h1>
    <p class="text-gray-500 text-lg mb-6">Kelola konten website</p>

    <!-- Tabs Navigasi -->
    <div class="flex flex-wrap gap-3 mb-8">
        <button data-tab="beranda" onclick="switchTab('beranda')"
            class="tab-button px-5 py-2 text-sm rounded-lg border border-gray-600 bg-blue hover:bg-blue-100">Beranda
        </button>
        <button data-tab="katalog" onclick="switchTab('katalog')"
            class="tab-button px-5 py-2 text-sm rounded-lg border border-gray-600 bg-blue hover:bg-blue-100">Katalog
        </button>
        <button data-tab="statuspembelian" onclick="switchTab('statuspembelian')"
            class="tab-button px-5 py-2 text-sm rounded-lg border border-gray-600 bg-blue hover:bg-blue-100">Status Pembelian
        </button>
    </div>

    <!-- Tab Content -->
    <div id="beranda" class="tab-content">
        @include('admin.konten.beranda')
    </div>
        
    <div id="katalog" class="tab-content">
       @include('admin.konten.katalog', ['mereks' => $mereks])
    </div>

    <div id="statuspembelian" class="tab-content">
         @include('admin.konten.statuspembelian', ['pembelians' => $pembelians])
    </div>

    
@endsection

@section('scripts')
    <script>
        // Fungsi untuk mengubah tab
        function switchTab(tabName) {
            // Sembunyikan semua konten tab
            const tabContents = document.querySelectorAll('.tab-content');
            tabContents.forEach(content => {
                content.classList.add('hidden');
            });

            // Tampilkan konten tab yang dipilih
            const selectedTabContent = document.getElementById(tabName);
            selectedTabContent.classList.remove('hidden');

            // Update gaya tab yang aktif
            const tabButtons = document.querySelectorAll('.tab-button');
            tabButtons.forEach(button => {
                button.classList.remove('bg-blue-100', 'text-blue');
                button.classList.add('border-gray-600', 'text-gray-600');
            });
            const activeButton = document.querySelector(`.tab-button[data-tab="${tabName}"]`);
            activeButton.classList.add('bg-blue-100', 'text-blue');
        }

        // Menampilkan tab 'beranda' secara default saat halaman dimuat
        document.addEventListener("DOMContentLoaded", function() {
            switchTab('beranda');
        });
    </script>
@endsection
