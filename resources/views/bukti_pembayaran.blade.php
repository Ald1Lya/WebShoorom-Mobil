<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Bukti Pembayaran</title>
  <style>
    body { font-family: sans-serif; font-size: 14px; }
    .container { padding: 20px; }
    .header { text-align: center; margin-bottom: 30px; }
    .header h2 { margin: 0; }
    .detail p { margin: 4px 0; }
    .highlight { font-weight: bold; font-size: 16px; }
    .footer { margin-top: 30px; text-align: center; font-size: 12px; color: #666; }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h2>Bukti Pembayaran</h2>
      <p>Order{{ $pembelian->nomor_order }}</p>
    </div>

    <div class="detail">  
      <p class="highlight">Nama Mobil: {{ $pembelian->katalog->nama }}</p>
      <p>Merek: {{ $pembelian->katalog->merek->nama_merek }}</p>
      <p>Tahun: {{ $pembelian->katalog->tahun }}</p>
      <p>Harga: Rp {{ number_format($pembelian->katalog->harga, 0, ',', '.') }}</p>
      <p>Metode Pembayaran: {{ $pembelian->metode_pembayaran }}</p>
      <p>Tanggal Pembelian: {{ \Carbon\Carbon::parse($pembelian->tanggal_pembelian)->format('d M Y') }}</p>
      <p>Status: {{ strtoupper($pembelian->status) }}</p>
    </div>

    <div class="footer">
      <p>Dicetak pada {{ now()->format('d M Y H:i') }}</p>
      <p>Terima kasih telah membeli di showroom kami.</p>
    </div>
  </div>
</body>
</html>
