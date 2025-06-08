<form action="{{ route('admin.konten.berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-2xl shadow-md max-w-4xl mx-auto">
    @csrf

    <h2 class="text-xl font-semibold text-gray-800 mb-4">Tambah Berita Baru</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded-lg">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="video_url" class="block text-sm font-medium text-gray-700">Link Video (Opsional)</label>
            <input type="url" name="video_url" id="video_url" value="{{ old('video_url') }}" class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="https://youtube.com/...">
        </div>

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Judul Berita <span class="text-red-500">*</span></label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan judul berita">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="image1" class="block text-sm font-medium text-gray-700">Gambar 1</label>
            <input type="file" name="image1" id="image1" class="mt-1 block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:border file:rounded-xl file:text-sm file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
        </div>

        <div>
            <label for="image2" class="block text-sm font-medium text-gray-700">Gambar 2</label>
            <input type="file" name="image2" id="image2" class="mt-1 block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:border file:rounded-xl file:text-sm file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
        </div>
    </div>

    <div>
        <label for="text1" class="block text-sm font-medium text-gray-700">Teks 1</label>
        <textarea name="text1" id="text1" rows="4" class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan isi teks pertama">{{ old('text1') }}</textarea>
    </div>

    <div>
        <label for="text2" class="block text-sm font-medium text-gray-700">Teks 2</label>
        <textarea name="text2" id="text2" rows="4" class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan isi teks kedua">{{ old('text2') }}</textarea>
    </div>

    <div>
        <label for="highlights" class="block text-sm font-medium text-gray-700">Highlight Poin</label>
        <textarea name="highlights" id="highlights" rows="3" class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Pisahkan dengan koma, contoh: Poin 1, Poin 2">{{ old('highlights') }}</textarea>
        <p class="text-sm text-gray-500 mt-1">Masukkan poin-poin penting, pisahkan dengan koma (,)</p>
    </div>

    <div class="flex justify-end">
        <button type="submit" class="inline-flex items-center px-6 py-2 bg-blue-600 border border-transparent rounded-xl font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Simpan Berita
        </button>
    </div>
</form>
