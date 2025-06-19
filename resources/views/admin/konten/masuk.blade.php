@php
    $tersedia = $katalogs->where('status', 'tersedia');
    $terjual = $katalogs->where('status', 'terjual');
@endphp

@if($tersedia->count())
<div class="mt-16">
    <h2 class="text-2xl font-bold mb-4 text-gray-800 text-center">Status Mobil Masuk</h2>

        <p class="text-center text-sm text-gray-600 mb-4">
        Total mobil tersedia: <span class="font-semibold text-blue-600">{{ $tersedia->count() }}</span>
    </p>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-xl overflow-hidden">
            <thead>
                <tr class="bg-gray-100 text-gray-700 text-left">
                    <th class="px-6 py-3">Nama Mobil</th>
                    <th class="px-6 py-3">Status Saat Ini</th>
                    <th class="px-6 py-3">Tanggal Unit Mobil Masuk</th>
                    <th class="px-6 py-3">Ubah Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tersedia as $mobil)
                <tr class="border-t">
                    <td class="px-6 py-4">{{ $mobil->nama }}</td>
                    <td class="px-6 py-4 capitalize">{{ $mobil->status }}</td>
                      <td class="px-6 py-4">{{ $mobil->created_at->format('d M Y, H:i') }}</td>
                    <td class="px-6 py-4">
                        <form action="{{ route('admin.konten.katalog.update', $mobil->id) }}" method="POST" class="flex items-center gap-2">
                            @csrf
                            @method('PUT')
                            <select name="status" class="border rounded p-1 text-sm">
                                <option value="tersedia" {{ $mobil->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                                <option value="terjual" {{ $mobil->status == 'terjual' ? 'selected' : '' }}>Terjual</option>
                            </select>
                            <button type="submit" class="bg-blue-500 text-white text-sm px-3 py-1 rounded hover:bg-blue-600">
                                Simpan
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
