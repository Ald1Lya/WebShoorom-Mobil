<!-- Form Input -->
<form action="{{ isset($editData) ? route('admin.konten.beranda.update', $editData->id) : route('admin.konten.beranda.store') }}"
      method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @if(isset($editData))
        @method('PUT')
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Section -->
        <div>
            <label for="section" class="block font-medium text-gray-700 mb-1">Section</label>
            <select name="section" id="section" required
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200"
                    {{ isset($editData) ? 'disabled' : '' }}>
                <option value="section1" {{ (old('section') ?? $editData->section ?? '') == 'section1' ? 'selected' : '' }}>Section 1</option>
                <option value="section2" {{ (old('section') ?? $editData->section ?? '') == 'section2' ? 'selected' : '' }}>Section 2</option>
            </select>
            @if (isset($editData))
                <p class="text-sm text-gray-500 mt-2">Section ini sudah terisi, Anda hanya bisa mengedit atau menghapus.</p>
            @endif
            @error('section') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Judul -->
        <div>
            <label for="judul" class="block font-medium text-gray-700 mb-1">Judul</label>
            <input type="text" name="judul" id="judul"
                   value="{{ old('judul') ?? $editData->judul ?? '' }}"
                   class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required
                   {{ isset($editData) ? 'readonly' : '' }}>
            @error('judul') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <!-- Deskripsi -->
    <div>
        <label for="deskripsi" class="block font-medium text-gray-700 mb-1">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" rows="4"
                  class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200"
                  required>{{ old('deskripsi') ?? $editData->deskripsi ?? '' }}</textarea>
        @error('deskripsi') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Gambar -->
    <div>
        <label for="gambar" class="block font-medium text-gray-700 mb-1">Gambar</label>
        <input type="file" name="gambar" id="gambar"
               class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200"
               {{ isset($editData) ? 'disabled' : '' }}>
        @if(isset($editData) && $editData->gambar)
            <div class="mt-2">
                <span class="text-sm text-gray-600">Gambar Saat Ini:</span>
                <img src="{{ asset('storage/images/' . $editData->gambar) }}" class="w-32 mt-2 rounded shadow">
            </div>
        @endif
        @error('gambar') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Tombol -->
    <div>
        <button type="submit"
                class="px-6 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition"
                {{ isset($editData) ? 'disabled' : '' }}>
            {{ isset($editData) ? 'Update' : 'Simpan' }}
        </button>
    </div>
</form>

<hr class="my-10">

<!-- Tabel Daftar Konten -->
<div class="max-w-5xl mx-auto mt-6 bg-white shadow rounded-xl p-6">
    <h3 class="text-xl font-semibold mb-4 text-gray-800">Daftar Konten</h3>

    <table class="w-full table-auto text-left border">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="px-4 py-2 border">Section</th>
                <th class="px-4 py-2 border">Judul</th>
                <th class="px-4 py-2 border text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-800">
            @forelse($berandas as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border">{{ $item->section }}</td>
                    <td class="px-4 py-2 border">{{ $item->judul }}</td>
                    <td class="px-4 py-2 border text-center">
                        <a href="javascript:void(0)" onclick="openEditModal('{{ route('admin.konten.beranda.index', ['edit' => $item->id]) }}')"
                           class="text-blue-600 hover:underline mr-3">Edit</a>
                        <a href="javascript:void(0)" onclick="openDeleteModal('{{ route('admin.konten.beranda.destroy', $item->id) }}')"
                           class="text-red-600 hover:underline">Hapus</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="px-4 py-4 text-center text-gray-500">Belum ada konten.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Modal Edit -->
<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden justify-center items-center z-50">
    <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6">
        <h3 class="text-xl font-semibold mb-4">Konfirmasi Edit</h3>
        <p>Apakah Anda yakin ingin mengedit konten ini?</p>
        <div class="flex justify-end mt-4">
            <button onclick="closeModal()" class="px-4 py-2 bg-gray-400 text-white rounded-lg mr-2">Batal</button>
            <form action="" method="GET" id="editForm" class="inline-block">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Edit</button>
            </form>
        </div>
    </div>
</div>

<!-- Modal Hapus -->
<div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden justify-center items-center z-50">
    <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6">
        <h3 class="text-xl font-semibold mb-4">Konfirmasi Hapus</h3>
        <p>Apakah Anda yakin ingin menghapus konten ini?</p>
        <div class="flex justify-end mt-4">
            <button onclick="closeModal()" class="px-4 py-2 bg-gray-400 text-white rounded-lg mr-2">Batal</button>
            <form action="" method="POST" id="deleteForm" class="inline-block">
                @csrf @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg">Hapus</button>
            </form>
        </div>
    </div>
</div>
<style>
    /* CSS untuk Animasi Modal */
#editModal, #deleteModal {
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 9999;
    background-color: rgba(0, 0, 0, 0.5); /* Background gelap */
    visibility: hidden; /* Modal disembunyikan */
    opacity: 0;
    transform: scale(0.9); /* Mulai dari skala kecil */
    transition: visibility 0s, opacity 0.3s ease, transform 0.3s ease;
}

#editModal.show, #deleteModal.show {
    visibility: visible;
    opacity: 1;
    transform: scale(1); /* Skala kembali ke ukuran normal */
}
</style>


<script>
// Fungsi untuk membuka modal Edit
// Fungsi untuk membuka modal Edit
function openEditModal(url) {
    document.getElementById('editForm').action = url;
    document.getElementById('editModal').classList.add('show'); // Tampilkan modal dengan animasi
}

// Fungsi untuk membuka modal Hapus
function openDeleteModal(url) {
    document.getElementById('deleteForm').action = url;
    document.getElementById('deleteModal').classList.add('show'); // Tampilkan modal dengan animasi
}

// Fungsi untuk menutup modal
function closeModal() {
    document.getElementById('editModal').classList.remove('show'); // Hilangkan modal dengan animasi
    document.getElementById('deleteModal').classList.remove('show'); // Hilangkan modal dengan animasi
}

// AJAX untuk edit
document.getElementById('editForm').addEventListener('submit', function(e) {
    e.preventDefault();
    var url = this.action;
    var formData = new FormData(this);

    fetch(url, {
        method: 'POST',  // Pastikan Anda menggunakan POST atau PUT sesuai kebutuhan
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Konten berhasil diperbarui!');
            location.reload(); // Reload untuk melihat perubahan
        } else {
            alert('Terjadi kesalahan saat mengedit konten.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat mengedit konten.');
    });
});

// AJAX untuk hapus
document.getElementById('deleteForm').addEventListener('submit', function(e) {
    e.preventDefault();
    var url = this.action;
    var formData = new FormData(this);

    fetch(url, {
        method: 'POST',  // Pastikan Anda menggunakan POST atau DELETE sesuai kebutuhan
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Konten berhasil dihapus!');
            location.reload(); // Reload untuk menghapus data dari halaman
        } else {
            alert('Terjadi kesalahan saat menghapus konten.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat menghapus konten.');
    });
});


</script>