<h2 class="text-2xl font-bold mb-4">📦 Daftar Pembelian Mobil</h2>

@if($pembelians->count())
    <div class="overflow-x-auto">
        <table class="min-w-full table-auto border border-gray-300">
           <thead class="bg-gray-100">
    <tr>
        <th class="px-4 py-2 border">No</th>
        <th class="px-4 py-2 border">Nama</th>
        <th class="px-4 py-2 border">Email</th>
        <th class="px-4 py-2 border">Telepon</th>
        <th class="px-4 py-2 border">Alamat</th>
        <th class="px-4 py-2 border">Mobil</th>
        <th class="px-4 py-2 border">Metode</th>
        <th class="px-4 py-2 border">Tanggal</th>
        <th class="px-4 py-2 border">Nomor Order</th>
        <th class="px-4 py-2 border">Status</th>
        <th class="px-4 py-2 border">Aksi</th>
    </tr>
</thead>
<tbody>
    @foreach($pembelians as $pembelian)
        <tr class="border-t">
            <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
            <td class="px-4 py-2 border">{{ $pembelian->nama }}</td>
            <td class="px-4 py-2 border">{{ $pembelian->email }}</td>
            <td class="px-4 py-2 border">{{ $pembelian->no_telepon }}</td>
            <td class="px-4 py-2 border">{{ $pembelian->alamat }}</td>
            <td class="px-4 py-2 border">{{ $pembelian->katalog->nama ?? '-' }}</td>
            <td class="px-4 py-2 border">{{ $pembelian->metode_pembayaran }}</td>
            <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($pembelian->tanggal_pembelian)->format('d M Y') }}</td>
            <td class="px-4 py-2 border font-mono text-sm">{{ $pembelian->nomor_order }}</td>
            <td class="px-4 py-2 border capitalize">{{ $pembelian->status }}</td>
            <td class="px-4 py-2 border">
                <form action="{{ route('admin.statuspembelian.update', $pembelian->id) }}" method="POST" class="flex gap-1">
                    @csrf
                    @method('PUT')
                    <select name="status" class="border rounded px-2 py-1 text-sm">
                        <option value="menunggu" {{ $pembelian->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="disetujui" {{ $pembelian->status == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                        <option value="ditolak" {{ $pembelian->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                    <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded text-sm">✔</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>

        </table>
    </div>
@else
    <p class="text-gray-500">Belum ada pembelian.</p>
@endif
