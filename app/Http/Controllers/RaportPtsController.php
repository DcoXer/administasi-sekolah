<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RaportPTS;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\NilaiPTS;
use Barryvdh\DomPDF\PDF;

class RaportPtsController extends Controller
{
    public function create()
    {
        $siswas = Siswa::with('kelas')->get();
        return view('raport_pts.create', compact('siswas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'kelakuan' => 'required',
            'kerajinan' => 'required',
            'kerapian' => 'required',
        ]);

        RaportPts::create([
            'siswa_id' => $request->siswa_id,
            'kelakuan' => $request->kelakuan,
            'kerajinan' => $request->kerajinan,
            'kerapian' => $request->kerapian,
            'sakit' => $request->sakit,
            'izin' => $request->izin,
            'tanpa_keterangan' => $request->tanpa_keterangan,
            'catatan' => $request->catatan,
            'wali_kelas_id' => auth()->id(),
        ]);

        return redirect()->route('raport-pts.create')->with('success', 'Data Raport PTS berhasil disimpan!');
    }
    
    public function print($id)
    {
        $siswa = Siswa::with('kelas')->findOrFail($id);
        $nilaiPTS = NilaiPTS::with('mapel')->where('siswa_id', $id)->get();

        $pdf = app('dompdf.wrapper')->loadView('raport_pts.print', compact('siswa', 'nilaiPTS'))
            ->setPaper('a4', 'portrait');
        return $pdf->stream('raport_pts_' . $siswa->nama_siswa . '.pdf');
    }
}
