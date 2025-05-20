<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembelian;
use Illuminate\Http\Request;

class StatusPembelianController extends Controller
{
    public function index()
    {
        $pembelians = Pembelian::with('katalog')->latest()->get();
        return view('admin.konten.statuspembelian', compact('pembelians'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:menunggu,disetujui,ditolak',
        ]);

        $pembelian = Pembelian::findOrFail($id);
        $pembelian->status = $request->status;
        $pembelian->save();

        return redirect()->back()->with('success', 'Status pembelian berhasil diperbarui.');
    }


}
