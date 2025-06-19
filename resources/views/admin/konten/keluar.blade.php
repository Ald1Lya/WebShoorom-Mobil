@php
    $tersedia = $katalogs->where('status', 'tersedia');
    $terjual = $katalogs->where('status', 'terjual');
@endphp

@if($terjual->count())
<div class="mt-16">
    <h2 class="text-2xl font-bold text-gray-800 text-center mb-2">Status Mobil Keluar (Terjual)</h2>
    <p class="text-center text-sm text-gray-600 mb-4">
        Total mobil terjual: <span class="font-semibold text-red-600">{{ $terjual->count() }}</span>
    </p>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-xl overflow-hidden">
            <thead>
                <tr class="bg-gray-100 text-gray-700 text-left">
                    <th class="px-6 py-3">Nama Mobil</th>
                    <th class="px-6 py-3">Harga</th>
                    <th class="px-6 py-3">Tahun</th>
                    <th class="px-6 py-3">Transmisi</th>
                    <th class="px-6 py-3">Merek</th>
                    <th class="px-6 py-3">Makelar</th>
                    <th class="px-6 py-3">Tanggal Terjual</th>
                </tr>
            </thead>
            <tbody>
                @foreach($terjual as $mobil)
                <tr class="border-t">
                    <td class="px-6 py-4">{{ $mobil->nama }}</td>
                    <td class="px-6 py-4">Rp {{ number_format($mobil->harga, 0, ',', '.') }}</td>
                    <td class="px-6 py-4">{{ $mobil->tahun }}</td>
                    <td class="px-6 py-4">{{ $mobil->transmisi }}</td>
                    <td class="px-6 py-4">{{ $mobil->merek->nama_merek ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $mobil->makelar->nama ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $mobil->updated_at->format('d M Y, H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@else
<div class="mt-16 text-center text-gray-500">
    <p>Belum ada mobil yang terjual.</p>
</div>
@endif
