{{-- Notif --}}
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
@endif

<style>
@keyframes fade-in {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in {
    animation: fade-in 0.3s ease-out;
}
</style>

{{-- Section 1 --}}
@php
    $section1 = $berandas->firstWhere('section', 'section1');
@endphp

@if($section1)
<section class="flex flex-col lg:flex-row items-center mt-5 justify-between px-10 py-16">
    <div class="max-w-xl space-y-6">
        <h1 class="text-5xl font-bold leading-tight">
            {{ $section1->judul }}
        </h1>
        <p class="text-gray-700 text-lg">
            {!! nl2br(e($section1->deskripsi)) !!}
        </p>
        <a href="#mobil" class="inline-flex items-center bg-black text-white px-6 py-3 rounded hover:bg-gray-800 transition">
            TEMUKAN MOBIL
            <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10.293 15.707a1 1 0 010-1.414L13.586 11H4a1 1 0 110-2h9.586l-3.293-3.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"/>
            </svg>
        </a>
    </div>
    <div class="mt-10 lg:mt-0">
        <img src="{{ asset('storage/' . $section1->gambar) }}" alt="Mobil" class="max-w-full h-auto">
    </div>
</section>
@endif  <!-- Pastikan ini ada -->

{{-- Section 2 --}}
@php
    $section2 = $berandas->firstWhere('section', 'section2');
@endphp

@if($section2)
<section class="max-w-7xl mx-auto my-16 px-4 md:px-8">
    <div class="bg-white rounded-2xl shadow-xl flex flex-col md:flex-row gap-8 overflow-hidden">
        <div class="bg-black text-white p-8 flex flex-col justify-between w-full md:w-1/3">
            <div>
                <h2 class="text-3xl font-bold mb-4">{{ $section2->judul }}</h2>
                <p class="text-sm md:text-base leading-relaxed text-gray-300">
                    {!! nl2br(e($section2->deskripsi)) !!}
                </p>
            </div>
            <button class="mt-6 bg-white text-black text-xs font-semibold px-5 py-2 rounded-full self-start hover:bg-gray-200 transition">
                CONTACT US!
            </button>
        </div>
        <div class="w-full md:w-1/3 p-4 flex items-center justify-center">
            <img src="{{ asset('storage/' . $section2->gambar) }}" alt="Car" class="rounded-xl shadow-lg w-full max-h-80 object-cover object-center">
        </div>
    </div>
</section>
@endif  <!-- Pastikan ini ada -->
