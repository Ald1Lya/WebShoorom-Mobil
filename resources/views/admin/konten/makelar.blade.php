<h2 class="text-2xl font-semibold mb-4">Tambah Makelar Baru</h2>

@if(session('successkatalog'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('successkatalog') }}</div>
@endif

@if($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('admin.konten.makelar.store') }}">
    @csrf
    <div class="mb-4">
        <label for="nama" class="block mb-1 font-medium">Nama Makelar</label>
        <input id="nama" name="nama" type="text" required class="w-full border rounded px-3 py-2" value="{{ old('nama') }}">
    </div>

    <div class="mb-4">
        <label for="no_wa" class="block mb-1 font-medium">No WA</label>
        <input id="no_wa" name="no_wa" type="text" required class="w-full border rounded px-3 py-2" value="{{ old('no_wa') }}">
    </div>

    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan Makelar</button>
</form>

<h2 class="text-2xl font-semibold mt-10 mb-4">Daftar Makelar</h2>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
@endif

<table class="w-full border border-gray-300 text-left mb-6">
    <thead>
        <tr class="bg-gray-100">
            <th class="border px-4 py-2">No</th>
            <th class="border px-4 py-2">Nama</th>
            <th class="border px-4 py-2">No WA</th>
            <th class="border px-4 py-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($makelars as $index => $makelar)
            <tr>
                <td class="border px-4 py-2">
                    {{ 
                        method_exists($makelars, 'currentPage') 
                        ? ($makelars->currentPage() - 1) * $makelars->perPage() + $index + 1 
                        : $index + 1 
                    }}
                </td>
                <td class="border px-4 py-2">{{ $makelar->nama }}</td>
                <td class="border px-4 py-2">
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $makelar->no_wa) }}" class="text-blue-600 hover:underline" target="_blank">
                        {{ $makelar->no_wa }}
                    </a>
                </td>
                <td class="border px-4 py-2">
                    <form method="POST" action="{{ route('admin.konten.makelar.update', $makelar->id) }}" class="inline-block">
                        @csrf
                        @method('PUT')
                        <input type="text" name="nama" value="{{ $makelar->nama }}" class="border px-2 py-1 text-sm w-24" required>
                        <input type="text" name="no_wa" value="{{ $makelar->no_wa }}" class="border px-2 py-1 text-sm w-32" required>
                        <button type="submit" class="bg-yellow-500 text-white px-2 py-1 rounded text-sm">Update</button>
                    </form>

                    <form method="POST" action="{{ route('admin.konten.makelar.destroy', $makelar->id) }}" class="inline-block ml-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus makelar ini?')" class="bg-red-500 text-white px-2 py-1 rounded text-sm">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center py-3">Belum ada data makelar.</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{-- Pagination hanya tampil jika $makelars menggunakan paginator dan jumlah total data > per page --}}
@if(method_exists($makelars, 'links') && $makelars->total() > $makelars->perPage())
    <div class="mt-4">
        {{ $makelars->links() }}
    </div>
@endif
