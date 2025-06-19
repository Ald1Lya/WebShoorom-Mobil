<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Mobil</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        h2 { text-align: center; margin-top: 10px; }
    </style>
</head>
<body>
    <h2>LAPORAN MOBIL MASUK (TERSERDIA)</h2>
    <p>Total: {{ $tersedia->count() }} mobil</p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mobil</th>
                <th>Harga</th>
                <th>Tahun</th>
                <th>Transmisi</th>
                <th>Merek</th>
                <th>Makelar</th>
                <th>Tanggal Masuk</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tersedia as $i => $mobil)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $mobil->nama }}</td>
                <td>Rp {{ number_format($mobil->harga, 0, ',', '.') }}</td>
                <td>{{ $mobil->tahun }}</td>
                <td>{{ $mobil->transmisi }}</td>
                <td>{{ $mobil->merek->nama_merek ?? '-' }}</td>
                <td>{{ $mobil->makelar->nama ?? '-' }}</td>
                <td>{{ \Carbon\Carbon::parse($mobil->created_at)->translatedFormat('d F Y, H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2 style="margin-top:40px;">LAPORAN MOBIL KELUAR (TERJUAL)</h2>
    <p>Total: {{ $terjual->count() }} mobil</p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mobil</th>
                <th>Harga</th>
                <th>Tahun</th>
                <th>Transmisi</th>
                <th>Merek</th>
                <th>Makelar</th>
                <th>Tanggal Masuk</th>
                <th>Terjual Pada</th>
            </tr>
        </thead>
        <tbody>
            @foreach($terjual as $i => $mobil)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $mobil->nama }}</td>
                <td>Rp {{ number_format($mobil->harga, 0, ',', '.') }}</td>
                <td>{{ $mobil->tahun }}</td>
                <td>{{ $mobil->transmisi }}</td>
                <td>{{ $mobil->merek->nama_merek ?? '-' }}</td>
                <td>{{ $mobil->makelar->nama ?? '-' }}</td>
                <td>{{ \Carbon\Carbon::parse($mobil->created_at)->translatedFormat('d F Y, H:i') }}</td>
                <td>{{ \Carbon\Carbon::parse($mobil->updated_at)->translatedFormat('d F Y, H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
