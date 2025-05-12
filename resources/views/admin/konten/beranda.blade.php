<form action="{{ route('admin.konten.beranda.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
    @csrf
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
        <strong class="font-bold">Berhasil Ubah Beranda!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif

    <!-- Section 1 -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="judul1" class="block font-semibold text-gray-700 mb-2">Judul Section 1</label>
            <input type="text" name="judul1" id="judul1" value="{{ old('judul1') }}" class="w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 p-3">
            @error('judul1') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="deskripsi1" class="block font-semibold text-gray-700 mb-2">Deskripsi Section 1</label>
            <textarea name="deskripsi1" id="deskripsi1" class="w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 p-3">{{ old('deskripsi1') }}</textarea>
            @error('deskripsi1') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="gambar1" class="block font-semibold text-gray-700 mb-2">Gambar Section 1</label>
            <input type="file" name="gambar1" id="gambar1" class="w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 p-3">
            @error('gambar1') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <!-- Section 2 -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
        <div>
            <label for="judul2" class="block font-semibold text-gray-700 mb-2">Judul Section 2</label>
            <input type="text" name="judul2" id="judul2" value="{{ old('judul2') }}" class="w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 p-3">
            @error('judul2') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="deskripsi2" class="block font-semibold text-gray-700 mb-2">Deskripsi Section 2</label>
            <textarea name="deskripsi2" id="deskripsi2" class="w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 p-3">{{ old('deskripsi2') }}</textarea>
            @error('deskripsi2') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="gambar2" class="block font-semibold text-gray-700 mb-2">Gambar Section 2</label>
            <input type="file" name="gambar2" id="gambar2" class="w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 p-3">
            @error('gambar2') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="alamat" class="block font-semibold text-gray-700 mb-2">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 p-3">
            @error('alamat') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="email" class="block font-semibold text-gray-700 mb-2">Email</label>
            <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 p-3">
            @error('email') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="nomor" class="block font-semibold text-gray-700 mb-2">Nomor</label>
            <input type="number" name="nomor" id="nomor" class="w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 p-3">
            @error('nomor') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="mt-8 text-center">
        <button type="submit" class="px-8 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition duration-300 ease-in-out">
            Simpan
        </button>
    </div>
</form>
