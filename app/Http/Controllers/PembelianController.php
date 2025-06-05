<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Katalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class PembelianController extends Controller
{
    /**
     * Menyimpan data pembelian dari form konfirmasi.
     */
    public function confirm(Request $request)
    {
        // Validasi input pengguna
        $request->validate([
            'katalog_id'        => 'required|exists:katalogs,id',
            'nama'              => 'required|string|max:255',
            'email'             => 'required|email|max:255',
            'no_telepon'        => 'required|string|max:20',
            'alamat'            => 'required|string|max:1000',
            'metode_pembayaran' => 'required|string',
        ]);

        // Simpan data pembelian ke database
        $pembelian = Pembelian::create([
            'katalog_id'         => $request->katalog_id,
            'user_id'            => session('user_logins')->id ?? null, // Optional jika user login
            'nama'               => $request->nama,
            'email'              => $request->email,
            'no_telepon'         => $request->no_telepon,
            'alamat'             => $request->alamat,
            'metode_pembayaran'  => $request->metode_pembayaran,
            'nomor_order'        => 'ORD' . rand(10000000, 99999999),
            'tanggal_pembelian'  => now(),
        ]);

        // Simpan ID pembelian ke session untuk ditampilkan nanti
        $pembelianIds = Session::get('pembelian_ids', []);
        $pembelianIds[] = $pembelian->id;
        Session::put('pembelian_ids', $pembelianIds);

        // Redirect ke halaman status pembelian
        return redirect()->route('statuspembelian')
                         ->with('success', 'Pembelian berhasil dikonfirmasi!');
    }

    /**
     * Cetak bukti pembelian dalam bentuk PDF.
     */
    public function cetakBukti($id)
    {
        // Ambil data pembelian beserta relasi ke katalog
        $pembelian = Pembelian::with('katalog')->findOrFail($id);

        // Generate PDF dari view
        $pdf = Pdf::loadView('bukti_pembayaran', compact('pembelian'));

        // Tampilkan PDF ke browser
        return $pdf->stream('bukti-pembelian-' . $pembelian->nomor_order . '.pdf');
    }
}
