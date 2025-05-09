<!-- Header -->
<!-- Tambahkan link Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<nav class="w-full flex items-center justify-between px-8 py-6 bg-white">
    <!-- Tengah: Logo + Brand -->
    <div class="flex items-center space-x-6">
        <img src="{{ asset('images/White And Brown Minimalist Cookies Menu Prototype Tablet (1).png') }}" alt="Logo" class="w-14 h-14 transition-transform transform hover:scale-110">
        <span class="text-4xl font-bold text-black transition-all duration-300 hover:text-gray-600">Panji Shoorom</span>
    </div>

    <!-- Kanan: Menu Desktop -->
    <div class="hidden md:flex items-center space-x-6">
        <a href="/" class="text-lg font-semibold text-black transition-all duration-300 hover:text-gray-400 hover:underline">BERANDA</a>
        <a href="#" class="text-lg font-semibold text-black transition-all duration-300 hover:text-gray-400 hover:underline">KATALOG MOBIL</a>
        <a href="#" class="text-lg font-semibold text-black transition-all duration-300 hover:text-gray-400 hover:underline">STATUS PEMBELIAN</a>
        <a href="#" onclick="toggleLoginModal()" class="bg-black text-white px-6 py-2 rounded-lg transition-all duration-300 hover:bg-gray-300 hover:text-black hover:scale-105">MASUK</a>
    </div>

    <!-- Kiri: Tombol Mobile -->
    <div class="md:hidden">
        <button id="menu-toggle" class="text-black text-2xl focus:outline-none">
            <i class="fas fa-bars"></i>
        </button>
    </div>
</nav>


    <!-- Mobile Dropdown Menu -->
    <div id="mobileMenu" class="md:hidden fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-90 flex flex-col items-center justify-center space-y-6 transform translate-y-[-100%] opacity-0 pointer-events-none transition-all duration-500 ease-in-out z-50">
        <a href="#" class="text-white text-lg font-semibold hover:text-gray-400 pointer-events-auto">Katalog Mobil</a>
        <a href="/" class="text-white text-lg font-semibold hover:text-gray-400 pointer-events-auto">Beranda</a>
        <a href="#" class="text-white text-lg font-semibold hover:text-gray-400 pointer-events-auto">DAFTAR</a>
        <a href="#" onclick="toggleLoginModal()" class="bg-white text-gray-800 px-6 py-2 rounded-lg hover:bg-gray-200 pointer-events-auto">MASUK</a>
    </div>

<!-- Modal Login/Register -->
<div id="loginModal" class="fixed inset-0 backdrop-blur-sm bg-white/30 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300">
    <div class="bg-white w-full max-w-sm p-6 rounded-lg shadow-xl transform scale-95 transition-transform duration-300">
      
      <!-- Login Form -->
      <div id="loginForm">
        <h2 class="text-2xl font-bold text-center text-black mb-4">Login</h2>
        <form>
          <div class="mb-4">
            <label class="block text-black font-semibold mb-1">Email</label>
            <input type="email" class="w-full px-4 py-2 border border-black rounded focus:outline-none focus:border-gray-600" required>
          </div>
          <div class="mb-6">
            <label class="block text-black font-semibold mb-1">Password</label>
            <input type="password" class="w-full px-4 py-2 border border-black rounded focus:outline-none focus:border-gray-600" required>
          </div>
          <button type="submit" class="w-full bg-black text-white py-2 rounded hover:bg-gray-800 transition">Login</button>
        </form>
        <div class="mt-4 flex justify-between items-center text-sm">
          <button onclick="showRegister()" class="text-black hover:text-gray-600">Belum punya akun?</button>
          <button onclick="toggleLoginModal()" class="text-black hover:text-gray-600">Tutup</button>
        </div>
      </div>
  
      <!-- Register Form -->
      <div id="registerForm" class="hidden">
        <h2 class="text-2xl font-bold text-center text-black mb-4">Daftar</h2>
        <form>
          <div class="mb-4">
            <label class="block text-black font-semibold mb-1">Nama</label>
            <input type="text" class="w-full px-4 py-2 border border-black rounded focus:outline-none focus:border-gray-600" required>
          </div>
          <div class="mb-4">
            <label class="block text-black font-semibold mb-1">Email</label>
            <input type="email" class="w-full px-4 py-2 border border-black rounded focus:outline-none focus:border-gray-600" required>
          </div>
          <div class="mb-6">
            <label class="block text-black font-semibold mb-1">Password</label>
            <input type="password" class="w-full px-4 py-2 border border-black rounded focus:outline-none focus:border-gray-600" required>
          </div>
          <button type="submit" class="w-full bg-black text-white py-2 rounded hover:bg-gray-800 transition">Daftar</button>
        </form>
        <div class="mt-4 flex justify-between items-center text-sm">
          <button onclick="showLogin()" class="text-black hover:text-gray-600">Sudah punya akun?</button>
          <button onclick="toggleLoginModal()" class="text-black hover:text-gray-600">Tutup</button>
        </div>
      </div>
  
    </div>
  </div>
  

  
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobileMenu');
        
        let isOpen = false;
        
        // Fungsi untuk toggle menu
        toggle.addEventListener('click', function() {
            isOpen = !isOpen;
            
            if (isOpen) {
                // Menampilkan menu
                mobileMenu.classList.remove('translate-y-[-100%]');
                mobileMenu.classList.add('translate-y-0', 'opacity-100', 'pointer-events-auto');
            } else {
                // Menyembunyikan menu
                mobileMenu.classList.remove('translate-y-0', 'opacity-100', 'pointer-events-auto');
                mobileMenu.classList.add('translate-y-[-100%]', 'opacity-0', 'pointer-events-none');
            }
        });

        // Reset max-height saat resize ke desktop
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                mobileMenu.classList.remove('translate-y-0', 'opacity-100', 'pointer-events-auto');
                mobileMenu.classList.add('translate-y-[-100%]', 'opacity-0', 'pointer-events-none');
                isOpen = false; // Menutup menu jika diresize ke desktop
            }
        });
    });



    function toggleLoginModal() {
        const modal = document.getElementById('loginModal');
        const modalBox = modal.querySelector('div');

        // Tutup mobile menu jika terbuka
        const mobileMenu = document.getElementById('mobileMenu');
        mobileMenu.classList.remove('translate-y-0', 'opacity-100', 'pointer-events-auto');
        mobileMenu.classList.add('translate-y-[-100%]', 'opacity-0', 'pointer-events-none');

        const isHidden = modal.classList.contains('pointer-events-none');

        if (isHidden) {
            modal.classList.remove('opacity-0', 'pointer-events-none');
            modal.classList.add('opacity-100', 'pointer-events-auto');
            modalBox.classList.remove('scale-95');
            modalBox.classList.add('scale-100');
        } else {
            modal.classList.remove('opacity-100', 'pointer-events-auto');
            modal.classList.add('opacity-0', 'pointer-events-none');
            modalBox.classList.remove('scale-100');
            modalBox.classList.add('scale-95');
        }
    }
    function showRegister() {
    document.getElementById('loginForm').classList.add('hidden');
    document.getElementById('registerForm').classList.remove('hidden');
  }

  function showLogin() {
    document.getElementById('registerForm').classList.add('hidden');
    document.getElementById('loginForm').classList.remove('hidden');
  }
</script>
