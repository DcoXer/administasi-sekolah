<?php

namespace App\Http\Controllers;

use App\Models\MutasiSiswa;
use App\Models\Siswa;
use Illuminate\Http\Request;

class MutasiSiswaController extends Controller
{
    // Tampilkan daftar pengajuan mutasi
    public function index()
    {
        $mutasi = MutasiSiswa::with('siswa')->latest()->get();
        return view('mutasi_siswa.index', compact('mutasi'));
    }

    // Form pengajuan baru
    public function create()
    {
        $siswas = Siswa::all();
        return view('mutasi_siswa.create', compact('siswas'));
    }

    // Simpan pengajuan baru
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'alasan' => 'required|string',
            'tujuan_sekolah' => 'required|string|max:255',
        ]);

        MutasiSiswa::create([
            'siswa_id' => $request->siswa_id,
            'alasan' => $request->alasan,
            'tujuan_sekolah' => $request->tujuan_sekolah,
            'tanggal_pengajuan' => now(),
        ]);

        return redirect()->route('mutasi.index')->with('success', 'Pengajuan mutasi berhasil dikirim!');
    }
}
