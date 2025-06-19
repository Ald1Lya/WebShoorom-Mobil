{{-- Form untuk input merek baru --}}
<form action="{{ route('admin.konten.katalog.store') }}" method="POST" class="mb-6">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-end">
        <div>
            <label for="merek_baru" class="block text-gray-700 font-semibold">Input Merek Baru</label>
            <input type="text" id="merek_baru" name="merek_baru" class="w-full p-2 border rounded" placeholder="Masukkan merek baru" required>
            @error('merek_baru')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button type="submit" name="action" value="simpan_merek" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700">
                Simpan Merek
            </button>
        </div>
    </div>
</form>
{{-- Tabel untuk daftar merek --}}
@if(session('successkatalog'))
    <div class="text-green-600 mb-4">
        {{ session('successkatalog') }}
    </div>
@endif

@if(session('error'))
    <div class="text-red-600 mb-4">
        {{ session('error') }}
    </div>
@endif

@if($mereks->isEmpty())
    <p class="text-gray-600">Belum ada merek yang ditambahkan.</p>
@else
    <table class="w-full border-collapse mt-6">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="border px-4 py-2">No</th>
                <th class="border px-4 py-2">Nama Merek</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mereks as $index => $merek)
                <tr class="hover:bg-gray-50">
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>

                    {{-- Form Edit --}}
                    <td class="border px-4 py-2">
                        <form action="{{ route('admin.konten.katalog.updateMerek', $merek->id) }}" method="POST" class="flex items-center space-x-2">
                            @csrf
                            @method('PUT')
                            <input type="text" name="nama_merek" value="{{ $merek->nama_merek }}" class="border rounded px-2 py-1 w-full" required>
                            <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">
                                Simpan
                            </button>
                        </form>
                    </td>

                    {{-- Tombol Hapus --}}
                    <td class="border px-4 py-2">
                        <form action="{{ route('admin.konten.katalog.destroyMerek', $merek->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus merek ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif


{{-- Form untuk input katalog mobil --}}
<form action="{{ route('admin.konten.katalog.store') }}" method="POST" enctype="multipart/form-data" class="mb-8">
    @csrf

    @if(session('successkatalog'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
            <strong class="font-bold">Berhasil!</strong>
            <span class="block sm:inline">{{ session('successkatalog') }}</span>
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label for="nama" class="block text-gray-700 font-semibold">Nama Mobil</label>
            <input type="text" id="nama" name="nama" class="w-full p-2 border rounded" value="{{ old('nama') }}" required>
        </div>

        <div>
            <label for="harga" class="block text-gray-700 font-semibold">Harga</label>
            <input type="number" id="harga" name="harga" class="w-full p-2 border rounded" value="{{ old('harga') }}" required>
        </div>

        <div>
            <label for="tahun" class="block text-gray-700 font-semibold">Tahun</label>
            <input type="number" id="tahun" name="tahun" class="w-full p-2 border rounded" value="{{ old('tahun') }}" required>
        </div>

        <div>
            <label for="transmisi" class="block text-gray-700 font-semibold">Transmisi</label>
            <select id="transmisi" name="transmisi" class="w-full p-2 border rounded" required>
                <option value="">-- Pilih Transmisi --</option>
                <option value="Manual" {{ old('transmisi') == 'Manual' ? 'selected' : '' }}>Manual</option>
                <option value="Otomatik" {{ old('transmisi') == 'Otomatik' ? 'selected' : '' }}>Otomatik</option>
            </select>
        </div>

        <div>
            <label for="bahan_bakar" class="block text-gray-700 font-semibold">Bahan Bakar</label>
            <select id="bahan_bakar" name="bahan_bakar" class="w-full p-2 border rounded" required>
                <option value="">-- Pilih Bahan Bakar --</option>
                <option value="Bensin" {{ old('bahan_bakar') == 'Bensin' ? 'selected' : '' }}>Bensin</option>
                <option value="Solar" {{ old('bahan_bakar') == 'Solar' ? 'selected' : '' }}>Solar</option>
                <option value="Listrik" {{ old('bahan_bakar') == 'Listrik' ? 'selected' : '' }}>Listrik</option>
            </select>
        </div>

        <div>
            <label for="kilometer" class="block text-gray-700 font-semibold">Kilometer</label>
            <input type="number" id="kilometer" name="kilometer" class="w-full p-2 border rounded" value="{{ old('kilometer') }}" required>
        </div>

        <div class="md:col-span-2">
            <label for="deskripsi" class="block text-gray-700 font-semibold">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" class="w-full p-2 border rounded" rows="3">{{ old('deskripsi') }}</textarea>
        </div>

        <div>
            <label for="foto_utama" class="block text-gray-700 font-semibold">Foto Utama</label>
            <input type="file" id="foto_utama" name="foto_utama" class="w-full p-2 border rounded" accept="image/*">
        </div>
        <div>
            <label for="foto1" class="block text-gray-700 font-semibold">Foto Depan</label>
            <input type="file" id="foto1" name="foto1" class="w-full p-2 border rounded" accept="image/*">
        </div>
        <div>
            <label for="foto2" class="block text-gray-700 font-semibold">Foto Belakang</label>
            <input type="file" id="foto2" name="foto2" class="w-full p-2 border rounded" accept="image/*">
        </div>
        <div>
            <label for="foto3" class="block text-gray-700 font-semibold">Foto Dalam</label>
            <input type="file" id="foto3" name="foto3" class="w-full p-2 border rounded" accept="image/*">
        </div>

        <div>
            <label for="status" class="block text-gray-700 font-semibold">Status</label>
            <select id="status" name="status" class="w-full p-2 border rounded" required>
                <option value="">-- Pilih Status --</option>
                <option value="tersedia" {{ old('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="terjual" {{ old('status') == 'terjual' ? 'selected' : '' }}>Terjual</option>
            </select>
        </div>

        <div class="md:col-span-2">
            <label for="merek_id" class="block text-gray-700 font-semibold mb-2">Pilih Merek</label>
            
            @isset($mereks)
                @if($mereks->count() > 0)
                    <select name="merek_id" id="merek_id" class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="">-- Pilih Merek --</option>
                        @foreach($mereks as $merek)
                            <option value="{{ $merek->id }}" {{ old('merek_id') == $merek->id ? 'selected' : '' }}>
                                {{ $merek->nama_merek }}
                            </option>
                        @endforeach
                    </select>
                @else

                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-yellow-700">
                                    Data merek belum tersedia. 
                                    <a href="#" class="font-medium underline text-yellow-700 hover:text-yellow-600">
                                        Tambahkan merek terlebih dahulu
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            @else
                <div class="bg-red-50 border-l-4 border-red-400 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-red-700">
                                Variabel $mereks tidak terdefinisi
                            </p>
                        </div>
                    </div>
                </div>
            @endisset
        </div>
    </div>

<select name="makelar_id" required class="border rounded p-2 w-full">
    <option disabled selected>📋 Pilih Makelar yang Menangani</option>
    @foreach ($makelars as $makelar)
        <option value="{{ $makelar->id }}">
            🚗 {{ $makelar->nama }} – 📞 {{ $makelar->no_wa }}
        </option>
    @endforeach
</select>




    <div class="mt-6 text-center">
        <button type="submit" name="action" value="simpan_katalog" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
            Simpan Katalog
        </button>
    </div>
</form>






@if($katalogs->count())
<div class="mt-10">
    <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">📋 Daftar Mobil</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($katalogs as $mobil)
        <!-- Kartu Mobil -->
        <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">
            <!-- Foto -->
            @if($mobil->foto_utama)
                <img src="{{ url('storage/' . $mobil->foto_utama) }}"
                     alt="Foto Mobil"
                     class="w-full h-48 object-cover cursor-pointer"
                     onclick="openModal('modal-{{ $mobil->id }}')">
            @else
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500 cursor-pointer"
                     onclick="openModal('modal-{{ $mobil->id }}')">
                    <span>Foto tidak tersedia</span>
                </div>
            @endif

            <!-- Info -->
            <div class="p-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-1">{{ $mobil->nama }}</h3>
                <p class="text-gray-600 mb-3">Rp {{ number_format($mobil->harga, 0, ',', '.') }}</p>

                <!-- Aksi -->
                <div class="flex gap-2">
                    <button onclick="openModal('modal-{{ $mobil->id }}')"
                            class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700 text-sm">
                        Edit
                    </button>
                    <form action="{{ route('admin.konten.katalog.destroy', $mobil->id) }}" method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus mobil ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-600 text-white px-4 py-1 rounded hover:bg-red-700 text-sm">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        <div id="modal-{{ $mobil->id }}"
             class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 opacity-0 invisible transition-opacity duration-300">
            <div class="bg-white w-full max-w-3xl rounded-lg shadow-lg overflow-y-auto max-h-[90vh] transform scale-95 transition-all duration-300 p-6">
                <!-- Header -->
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold">Edit Mobil</h3>
                    <button onclick="closeModal('modal-{{ $mobil->id }}')" class="text-gray-500 hover:text-gray-700">
                        ✖
                    </button>
                </div>

                <!-- Form -->
                <form action="{{ route('admin.konten.katalog.update', $mobil->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach (['foto_utama' => 'Foto Utama', 'foto1' => 'Foto 1', 'foto2' => 'Foto 2', 'foto3' => 'Foto 3'] as $field => $label)
                            <div>
                                <label class="block font-medium mb-1">{{ $label }}</label>
                                @if($mobil->$field)
                                    <img src="{{ asset('storage/' . $mobil->$field) }}" alt="{{ $label }}"
                                         class="w-full h-40 object-cover rounded mb-2">
                                @endif
                                <input type="file" name="{{ $field }}" class="w-full border p-2 rounded">
                            </div>
                        @endforeach

                        <div>
                            <label class="block font-medium mb-1">Nama Mobil</label>
                            <input type="text" name="nama" value="{{ old('nama', $mobil->nama) }}"
                                   class="w-full border p-2 rounded" required>
                        </div>

                        <div>
                            <label class="block font-medium mb-1">Merek</label>
                            <select name="merek_id" class="w-full border p-2 rounded" required>
                                @foreach($mereks as $merek)
                                    <option value="{{ $merek->id }}" {{ $mobil->merek_id == $merek->id ? 'selected' : '' }}>
                                        {{ $merek->nama_merek }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block font-medium mb-1">Makelar</label>
                           <select name="makelar_id" required class="border rounded p-2 w-full">
                                <option disabled selected>📋 Pilih Makelar yang Menangani</option>
                                @foreach ($makelars as $makelar)
                                    <option value="{{ $makelar->id }}" {{ $mobil->makelar_id == $makelar->id ? 'selected' : '' }}>
                                        🚗 {{ $makelar->nama }} – 📞 {{ $makelar->no_wa }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block font-medium mb-1">Harga</label>
                            <input type="number" name="harga" value="{{ old('harga', $mobil->harga) }}"
                                   class="w-full border p-2 rounded" required>
                        </div>

                        <div>
                            <label class="block font-medium mb-1">Tahun</label>
                            <input type="number" name="tahun" value="{{ old('tahun', $mobil->tahun) }}"
                                   class="w-full border p-2 rounded" required>
                        </div>

                        <div>
                            <label class="block font-medium mb-1">Transmisi</label>
                            <select name="transmisi" class="w-full border p-2 rounded" required>
                                <option value="Manual" {{ $mobil->transmisi == 'Manual' ? 'selected' : '' }}>Manual</option>
                                <option value="Otomatik" {{ $mobil->transmisi == 'Otomatik' ? 'selected' : '' }}>Otomatik</option>
                            </select>
                        </div>

                        <div>
                            <label class="block font-medium mb-1">Bahan Bakar</label>
                            <select name="bahan_bakar" class="w-full border p-2 rounded" required>
                                <option value="Bensin" {{ $mobil->bahan_bakar == 'Bensin' ? 'selected' : '' }}>Bensin</option>
                                <option value="Solar" {{ $mobil->bahan_bakar == 'Solar' ? 'selected' : '' }}>Solar</option>
                                <option value="Listrik" {{ $mobil->bahan_bakar == 'Listrik' ? 'selected' : '' }}>Listrik</option>
                            </select>
                        </div>

         

                        <div>
                            <label class="block font-medium mb-1">Kilometer</label>
                            <input type="number" name="kilometer" value="{{ old('kilometer', $mobil->kilometer) }}"
                                   class="w-full border p-2 rounded" required>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block font-medium mb-1">Deskripsi</label>
                            <textarea name="deskripsi" rows="4" class="w-full border p-2 rounded">{{ old('deskripsi', $mobil->deskripsi) }}</textarea>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end gap-3">
                        <button type="button" onclick="closeModal('modal-{{ $mobil->id }}')"
                                class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                            Batal
                        </button>
                        <button type="submit"
                                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif

<script>
function openModal(id) {
    const modal = document.getElementById(id);
    modal.classList.remove('opacity-0', 'invisible');
    modal.classList.add('opacity-100', 'visible');
}

function closeModal(id) {
    const modal = document.getElementById(id);
    modal.classList.add('opacity-0', 'invisible');
    modal.classList.remove('opacity-100', 'visible');
}
</script>
