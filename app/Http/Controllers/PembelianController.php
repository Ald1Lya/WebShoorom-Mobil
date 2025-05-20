<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Katalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class PembelianController extends Controller
{

    public function confirm(Request $request)
    {
        $request->validate([
            'katalog_id' => 'required|exists:katalogs,id',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telepon' => 'required|string|max:20',
            'alamat' => 'required|string|max:1000',
            'metode_pembayaran' => 'required|string',
        ]);

        $pembelian = Pembelian::create([
        'katalog_id' => $request->katalog_id,
        'user_id' => session('user_logins')->id ?? null,
        'nama' => $request->nama,
        'email' => $request->email,
        'no_telepon' => $request->no_telepon,
        'alamat' => $request->alamat,
        'metode_pembayaran' => $request->metode_pembayaran,
        'nomor_order' => 'ORD' . rand(10000000, 99999999),
        'tanggal_pembelian' => now(),
    ]);


        // Simpan ID pembelian ke session
        $pembelianIds = Session::get('pembelian_ids', []);
        $pembelianIds[] = $pembelian->id;
        Session::put('pembelian_ids', $pembelianIds);

        // Jika mau simpan data diri ke database, bisa ditambahkan di sini

        return redirect()->route('statuspembelian')->with('success', 'Pembelian berhasil dikonfirmasi!');
    }

    public function cetakBukti($id)
        {
            $pembelian = Pembelian::with('katalog')->findOrFail($id);

            // Bisa return view khusus cetak bukti (akan dibuat terpisah)
            return view('pembelian.cetak_bukti', compact('pembelian'));
        }

}
