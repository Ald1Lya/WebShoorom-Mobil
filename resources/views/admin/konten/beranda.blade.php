@php
    $beranda = $berandas->first();
@endphp

@php
    use Illuminate\Support\Str;
    function fixImagePath($path) {
        return Str::startsWith($path, ['http://', 'https://']) ? $path : asset('storage/' . $path);
    }
@endphp

<form action="{{ route('admin.konten.beranda.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
    @csrf

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
            <strong class="font-bold">Berhasil!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Hero Section -->
    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
        <h2 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b border-gray-200">
            <i class="fas fa-image mr-2 text-blue-500"></i> Hero Section 1 (Bagian Atas)
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="judul1" class="block font-medium text-gray-700 mb-1">Judul Utama</label>
                <input type="text" name="judul1" id="judul1" value="{{ old('judul1', $beranda?->judul1) }}" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                @error('judul1') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="deskripsi1" class="block font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="deskripsi1" id="deskripsi1" rows="3"
                          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">{{ old('deskripsi1', $beranda?->deskripsi1) }}</textarea>
                @error('deskripsi1') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="md:col-span-2">
                <label for="gambar1" class="block font-medium text-gray-700 mb-1">Gambar Hero</label>
                <div class="flex items-center space-x-4">
                    <div class="flex-1">
                        <input type="file" name="gambar1" id="gambar1" 
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        <p class="text-xs text-gray-500 mt-1">Format: JPG/PNG</p>
                        @error('gambar1') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    @if($beranda?->gambar1)
                        <div class="w-24 h-24 bg-gray-100 rounded-md overflow-hidden border border-gray-200">
                            <img src="{{ fixImagePath( $beranda->gambar1) }}" alt="Gambar Hero" class="w-full h-full object-cover">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Tentang Kami Section -->
    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
        <h2 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b border-gray-200">
            <i class="fas fa-info-circle mr-2 text-blue-500"></i> Section 3 Tentang kami
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="judul2" class="block font-medium text-gray-700 mb-1">Judul Tentang Kami</label>
                <input type="text" name="judul2" id="judul2" value="{{ old('judul2', $beranda?->judul2) }}" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                @error('judul2') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="deskripsi2" class="block font-medium text-gray-700 mb-1">Deskripsi Tentang Kami</label>
                <textarea name="deskripsi2" id="deskripsi2" rows="4"
                          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">{{ old('deskripsi2', $beranda?->deskripsi2) }}</textarea>
                @error('deskripsi2') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="md:col-span-2">
                <label for="gambar2" class="block font-medium text-gray-700 mb-1">Gambar Tentang Kami</label>
                <div class="flex items-center space-x-4">
                    <div class="flex-1">
                        <input type="file" name="gambar2" id="gambar2" 
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        <p class="text-xs text-gray-500 mt-1">Format: JPG/PNG</p>
                        @error('gambar2') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    @if($beranda?->gambar2)
                        <div class="w-24 h-24 bg-gray-100 rounded-md overflow-hidden border border-gray-200">
                            <img src="{{ fixImagePath( $beranda->gambar2) }}" alt="Gambar Tentang Kami" class="w-full h-full object-cover">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Kontak Information -->
    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
        <h2 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b border-gray-200">
            <i class="fas fa-address-book mr-2 text-blue-500"></i> Informasi Alamat
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label for="alamat" class="block font-medium text-gray-700 mb-1">Alamat Lengkap</label>
                <input type="text" name="alamat" id="alamat" value="{{ old('alamat', $beranda?->alamat) }}" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                @error('alamat') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>
            
            <div>
                <label for="email" class="block font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $beranda?->email) }}" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                @error('email') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="google_maps" class="block font-medium text-gray-700 mb-1">Google Maps URL</label>
                <input 
                    type="url" 
                    name="google_maps" 
                    id="google_maps" 
                    value="{{ old('google_maps', $beranda?->google_maps) }}" 
                    placeholder="https://www.google.com/maps/place/..." 
                    pattern="https://.*" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                >
                @error('google_maps') 
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p> 
                @enderror
            </div>


        </div>
    </div>

    <!-- Gallery Section -->
    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
        <h2 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b border-gray-200">
            <i class="fas fa-images mr-2 text-blue-500"></i> Card (4 Gambar) Section 2
        </h2>
        
        <div class="mb-6">
            <label for="judulsec3" class="block font-medium text-gray-700 mb-1">Judul Card</label>
            <input type="text" name="judulsec3" id="judulsec3" value="{{ old('judulsec3', $beranda?->judulsec3) }}" 
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
            @error('judulsec3') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach(['gambarsec3', 'gambarsec4', 'gambarsec5', 'gambarsec6'] as $img)
                <div class="border border-gray-200 rounded-lg p-4">
                    <label for="{{ $img }}" class="block font-medium text-gray-700 mb-2">Gambar</label>
                    <input type="file" name="{{ $img }}" id="{{ $img }}" 
                           class="w-full border border-gray-300 rounded-lg px-3 py-1 mb-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                    @error($img) <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                    
                    @if($beranda?->$img)
                        <div class="mt-2 w-full h-32 bg-gray-100 rounded-md overflow-hidden border border-gray-200">
                            <img src="{{ fixImagePath($beranda->$img) }}" alt="Gallery Image" class="w-full h-full object-cover">
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <!-- Submit Button -->
    <div class="flex justify-end">
        <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition flex items-center">
            <i class="fas fa-save mr-2"></i> Simpan Perubahan
        </button>
    </div>
</form>