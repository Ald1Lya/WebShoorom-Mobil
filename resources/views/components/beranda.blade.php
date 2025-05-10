<!-- Hero Section -->
<section class="flex flex-col lg:flex-row items-center justify-between px-10 py-16">
    <!-- Text Content -->
    <div class="max-w-xl space-y-6">
        
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
                <button onclick="this.parentElement.remove()" class="ml-auto text-red-600 hover:text-red-900">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif
    </div>
    <style>
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate-fade-in {
        animation: fade-in 0.3s ease-out;
    }
</style>

@endif

        <h1 class="text-5xl font-bold leading-tight">
            Temukan Mobil<br>Impian Anda
        </h1>
        <p class="text-gray-700 text-lg">
            <strong>Selamat Datang di Panji Shoorom</strong><br>
            Temukan mobil impian Anda di tempat yang tepat! Kami menghadirkan berbagai pilihan mobil berkualitas dengan harga kompetitif, pelayanan ramah, dan proses transaksi yang mudah.
        </p>
        <a href="#mobil" class="inline-flex items-center bg-black text-white px-6 py-3 rounded hover:bg-gray-800">
            TEMUKAN MOBIL
            <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10.293 15.707a1 1 0 010-1.414L13.586 11H4a1 1 0 110-2h9.586l-3.293-3.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"/></svg>
        </a>
    </div>

    <!-- Car Images -->
    <div class="mt-10 lg:mt-0">
        <img src="{{ asset('images/White And Brown Minimalist Cookies Menu Prototype Tablet (3).png') }}" alt="Mobil" class="max-w-full h-auto">
    </div>
</section>