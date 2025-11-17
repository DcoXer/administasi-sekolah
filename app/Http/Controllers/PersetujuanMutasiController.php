<?php

namespace App\Http\Controllers;

use App\Models\MutasiSiswa;
use Illuminate\Http\Request;

class PersetujuanMutasiController extends Controller
{
    // Daftar pengajuan mutasi pending
    public function index()
    {
        $mutasi = MutasiSiswa::where('status', 'pending')->with('siswa')->get();
        return view('kepsek.mutasi.index', compact('mutasi'));
    }

    // Detail pengajuan
    public function show($id)
    {
        $data = MutasiSiswa::with('siswa')->findOrFail($id);
        return view('kepsek.mutasi.show', compact('data'));
    }

    // Aksi ACC atau Tolak
    public function update(Request $request, $id)
    {
        $mutasi = MutasiSiswa::findOrFail($id);

        $request->validate([
            'status' => 'required|in:disetujui,ditolak',
            'keterangan_penolakan' => 'nullable|string'
        ]);

        $mutasi->update([
            'status' => $request->status,
            'keterangan_penolakan' => $request->status === 'ditolak' ? $request->keterangan_penolakan : null,
            'tanggal_persetujuan' => now(),
        ]);

        return redirect()->route('kepsek.mutasi.index')->with('success', 'Status pengajuan mutasi berhasil diperbarui!');
    }
}
