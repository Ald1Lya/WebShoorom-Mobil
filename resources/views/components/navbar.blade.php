<!-- Tambahkan link Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<!-- NAVBAR -->
<div class="w-full flex justify-center px-4 fixed top-0 z-50">
    <nav class="w-full max-w-4xl flex items-center justify-between px-8 py-3 bg-white/80 rounded-full my-3 shadow-lg transition-all duration-500 ease-[cubic-bezier(0.22,1,0.36,1)]">
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

        <div class="hidden md:flex items-center space-x-8">
            <a href="/" class="group relative text-lg font-medium text-black transition-all duration-500">
                <span class="group-hover:text-gray-500">BERANDA</span>
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-black group-hover:w-full transition-all duration-500"></span>
            </a>
            <a href="/katalog" class="group relative text-lg font-medium text-black transition-all duration-500">
                <span class="group-hover:text-gray-500">KATALOG MOBIL</span>
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-black group-hover:w-full transition-all duration-500 delay-100"></span>
            </a>
            <a href="/berita" class="group relative text-lg font-medium text-black transition-all duration-500">
                <span class="group-hover:text-gray-500">BERITA DAN REVIEW</span>
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-black group-hover:w-full transition-all duration-500 delay-100"></span>
            </a>
        </div>

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
</div>

<!-- Mobile Dropdown Menu -->
<div id="mobileMenu" class="md:hidden fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-90 flex flex-col items-center justify-center space-y-6 transform translate-y-[-100%] opacity-0 pointer-events-none transition-all duration-500 ease-in-out z-50 text-center">
    <a href="/" class="text-white text-lg font-semibold hover:text-gray-400 pointer-events-auto">BERANDA</a>
    <a href="/katalog" class="text-white text-lg font-semibold hover:text-gray-400 pointer-events-auto">KATALOG MOBIL</a>
    <a href="/berita" class="text-white text-lg font-semibold hover:text-gray-400 pointer-events-auto">BERITA DAN RIVIEW</a>
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