<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;

class StatusPembelianController extends Controller
{
    public function index()
    {
        // Ambil objek user dari session
        $user = session('user_logins');

        // Jika tidak ada user, redirect ke login
        if (!$user) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Ambil id user dari objek user
        $userId = $user->id;

        // Query data pembelian berdasarkan user_id
        $pembelians = Pembelian::where('user_id', $userId)
            ->with('katalog.merek')
            ->orderBy('created_at', 'desc')
            ->get();

        // Kirim data ke view
        return view('statuspembelian', compact('pembelians'));
    }
}
