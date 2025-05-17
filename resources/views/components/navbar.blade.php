<!-- Tambahkan link Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<!-- NAVBAR -->
<nav class="w-full flex items-center justify-between px-6 py-3 bg-white fixed top-0 z-50 shadow-lg transition-all duration-500 ease-[cubic-bezier(0.22,1,0.36,1)]">
    <!-- Kiri: Logo + Brand -->
    <div class="flex items-center space-x-4">
        <img 
            src="{{ asset('images/White And Brown Minimalist Cookies Menu Prototype Tablet (1).png') }}" 
            alt="Logo" 
            class="w-12 h-12 transition-all duration-500 hover:scale-110 hover:rotate-[8deg]"
        >
        <span class="text-2xl font-bold text-black hover:text-gray-600 transition-all duration-500 hover:tracking-wider">
            Panji Shoorom
        </span>
    </div>

    <!-- Kanan: Menu Desktop -->
    <div class="hidden md:flex items-center space-x-8">
        <a href="/" class="group relative text-lg font-medium text-black transition-all duration-500">
            <span class="group-hover:text-gray-500">BERANDA</span>
            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-black group-hover:w-full transition-all duration-500"></span>
        </a>
        
        <a href="/katalog" class="group relative text-lg font-medium text-black transition-all duration-500">
            <span class="group-hover:text-gray-500">KATALOG MOBIL</span>
            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-black group-hover:w-full transition-all duration-500 delay-100"></span>
        </a>
        
        @if(session('user_logins'))
        <a href="/statuspembelian" class="group relative text-lg font-medium text-black transition-all duration-500">
            <span class="group-hover:text-gray-500">STATUS PEMBELIAN</span>
            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-black group-hover:w-full transition-all duration-500 delay-150"></span>
        </a>
        @endif

        @if(session('user_logins'))
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button 
                    type="submit" 
                    class="relative overflow-hidden bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-900 transition-all duration-500 hover:px-8 group"
                >
                    <span class="relative z-10">LOGOUT</span>
                    <span class="absolute inset-0 bg-white scale-x-0 origin-left group-hover:scale-x-100 transition-transform duration-500"></span>
                </button>
            </form>
        @else
            <button 
                onclick="toggleLoginModal(); showLogin();" 
                class="relative overflow-hidden bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-900 transition-all duration-500 hover:px-8 group"
            >
                <span class="relative z-10">MASUK</span>
                <span class="absolute inset-0 bg-gray-300 text-black scale-x-0 origin-left group-hover:scale-x-100 transition-transform duration-500"></span>
            </button>
        @endif
    </div>

    <!-- Tombol Menu Mobile -->
    <div class="md:hidden">
        <button 
            id="menu-toggle" 
            class="relative w-10 h-10 flex flex-col items-center justify-center gap-2 group focus:outline-none"
        >
            <span class="w-6 h-0.5 bg-black transition-all duration-500 group-hover:bg-gray-600 group-hover:w-8"></span>
            <span class="w-6 h-0.5 bg-black transition-all duration-500 group-hover:bg-gray-600 group-hover:w-8"></span>
            <span class="w-6 h-0.5 bg-black transition-all duration-500 group-hover:bg-gray-600 group-hover:w-8"></span>
        </button>
    </div>
</nav>

<!-- MENU MOBILE -->
<div id="mobile-menu" class="md:hidden hidden flex flex-col bg-white shadow-lg px-6 py-4 space-y-4 mt-[72px] fixed w-full z-40">
    <a href="/" class="text-lg font-semibold text-black hover:text-gray-400 hover:underline">BERANDA</a>
    <a href="/katalog" class="text-lg font-semibold text-black hover:text-gray-400 hover:underline">KATALOG MOBIL</a>
    @if(session('user_logins'))
        <a href="#" class="text-lg font-semibold text-black hover:text-gray-400 hover:underline">STATUS PEMBELIAN</a>
    @endif

    @if(session('user_logins'))
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800 hover:scale-105 transition">LOGOUT</button>
        </form>
    @else
        <a href="javascript:void(0)" onclick="toggleLoginModal(); showLogin();" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-300 hover:text-black hover:scale-105 transition">MASUK</a>
    @endif
</div>


<!-- Mobile Dropdown Menu -->
<div id="mobileMenu" class="md:hidden fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-90 flex flex-col items-center justify-center space-y-6 transform translate-y-[-100%] opacity-0 pointer-events-none transition-all duration-500 ease-in-out z-50">
    <a href="/" class="text-white text-lg font-semibold hover:text-gray-400 pointer-events-auto">BERANDA</a>
    <a href="/katalog" class="text-white text-lg font-semibold hover:text-gray-400 pointer-events-auto">KATALOG MOBIL</a>

    @if(session('user_logins'))
        <a href="#" class="text-white text-lg font-semibold hover:text-gray-400 pointer-events-auto">STATUS PEMBELIAN</a>
        
        <!-- Tombol Logout -->
        <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                class="bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-700 hover:scale-105 transition pointer-events-auto">
                LOGOUT
         </button>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>

    @else
        <!-- Tombol Masuk -->
        <a href="javascript:void(0)" onclick="toggleLoginModal(); showLogin();" 
           class="bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-300 hover:text-black hover:scale-105 transition pointer-events-auto">
            MASUK
        </a>
    @endif
</div>




<!-- Modal Login/Register -->
<div id="loginModal" class="fixed inset-0 backdrop-blur-sm bg-white/30 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300">
    <div class="bg-white w-full max-w-sm p-6 rounded-lg shadow-xl transform scale-95 transition-transform duration-300">

        <!-- LOGIN FORM -->
        <div id="loginForm">
            <h2 class="text-2xl font-bold text-center text-black mb-4">Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-black font-semibold mb-1">Email</label>
                    <input type="email" name="email" class="w-full px-4 py-2 border border-black rounded focus:outline-none focus:border-gray-600" required>
                </div>
                <div class="mb-6">
                    <label class="block text-black font-semibold mb-1">Password</label>
                    <input type="password" name="password" class="w-full px-4 py-2 border border-black rounded focus:outline-none focus:border-gray-600" required>
                </div>
                <button type="submit" class="w-full bg-black text-white py-2 rounded hover:bg-gray-800 transition">Login</button>
            </form>
            <div class="mt-4 flex justify-between items-center text-sm">
                <button onclick="showRegister()" class="text-black hover:text-gray-600">Belum punya akun?</button>
                <button onclick="toggleLoginModal()" class="text-black hover:text-gray-600">Tutup</button>
            </div>
        </div>

        <!-- REGISTER FORM -->
        <div id="registerForm" class="hidden">
            <h2 class="text-2xl font-bold text-center text-black mb-4">Daftar</h2>
            <form action="{{ route('register.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-black font-semibold mb-1">Nama</label>
                    <input type="text" name="name" class="w-full px-4 py-2 border border-black rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block text-black font-semibold mb-1">Email</label>
                    <input type="email" name="email" class="w-full px-4 py-2 border border-black rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block text-black font-semibold mb-1">Password</label>
                    <input type="password" name="password" class="w-full px-4 py-2 border border-black rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block text-black font-semibold mb-1">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="w-full px-4 py-2 border border-black rounded" required>
                </div>
                <button type="submit" class="w-full bg-black text-white py-2 rounded">Daftar</button>
      

            </form>
            <div class="mt-4 flex justify-between items-center text-sm">
                <button onclick="showLogin()" class="text-black hover:text-gray-600">Sudah punya akun?</button>
                <button onclick="toggleLoginModal()" class="text-black hover:text-gray-600">Tutup</button>
            </div>
        </div>

    </div>
</div>

<!-- SCRIPT -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobileMenu');
        let isOpen = false;

        toggle.addEventListener('click', function () {
            isOpen = !isOpen;
            if (isOpen) {
                mobileMenu.classList.remove('translate-y-[-100%]');
                mobileMenu.classList.add('translate-y-0', 'opacity-100', 'pointer-events-auto');
            } else {
                mobileMenu.classList.remove('translate-y-0', 'opacity-100', 'pointer-events-auto');
                mobileMenu.classList.add('translate-y-[-100%]', 'opacity-0', 'pointer-events-none');
            }
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                mobileMenu.classList.remove('translate-y-0', 'opacity-100', 'pointer-events-auto');
                mobileMenu.classList.add('translate-y-[-100%]', 'opacity-0', 'pointer-events-none');
                isOpen = false;
            }
        });
    });

    function toggleLoginModal() {
        const modal = document.getElementById('loginModal');
        const modalBox = modal.querySelector('div');
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
