<?php

namespace App\Http\Controllers;

use App\Models\Raport;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\NilaiSiswa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RaportController extends Controller
{
    // Wali kelas can view raports for their class
    public function index()
    {
        $this->authorize('viewAny', Raport::class);

        $user = auth()->user();
        $guru = Guru::where('nip', $user->email)->first() ?? Guru::where('nama', $user->name)->first();

        if (!$guru) {
            return redirect()->back()->with('error', 'Guru tidak ditemukan');
        }

        $raports = Raport::where('wali_kelas_id', $guru->id)->with('siswa')->paginate(15);

        return view('raport.index', compact('raports'));
    }

    // Generate raport for a specific student and semester
    public function create()
    {
        $this->authorize('create', Raport::class);

        $siswas = Siswa::all();
        $semesters = ['1', '2'];
        $tahunAjaran = date('Y');

        return view('raport.create', compact('siswas', 'semesters', 'tahunAjaran'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Raport::class);

        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'semester' => 'required|in:1,2',
            'tahun_ajaran' => 'required|numeric',
            'wali_kelas_id' => 'required|exists:gurus,id',
        ]);

        // Check if raport already exists
        $existingRaport = Raport::where('siswa_id', $validated['siswa_id'])
            ->where('semester', $validated['semester'])
            ->where('tahun_ajaran', $validated['tahun_ajaran'])
            ->first();

        if ($existingRaport) {
            return redirect()->back()->with('error', 'Raport sudah dibuat untuk siswa dan semester ini');
        }

        // Calculate average grade
        $nilaiTotal = NilaiSiswa::where('siswa_id', $validated['siswa_id'])->avg('nilai_akhir');

        $raport = Raport::create([
            ...$validated,
            'nilai_rata_rata' => $nilaiTotal ? round($nilaiTotal, 2) : 0,
        ]);

        return redirect()->route('raport.show', $raport->id)->with('success', 'Raport berhasil dibuat');
    }

    public function show(Raport $raport)
    {
        $this->authorize('view', $raport);

        $nilaiSiswa = NilaiSiswa::where('siswa_id', $raport->siswa_id)
            ->with('guruBidang.bidang', 'guruBidang.guru')
            ->get();

        return view('raport.show', compact('raport', 'nilaiSiswa'));
    }

    public function edit(Raport $raport)
    {
        $this->authorize('update', $raport);

        $gurus = Guru::all();
        return view('raport.edit', compact('raport', 'gurus'));
    }

    public function update(Request $request, Raport $raport)
    {
        $this->authorize('update', $raport);

        $validated = $request->validate([
            'catatan_wali_kelas' => 'nullable|string',
            'catatan_kepala_sekolah' => 'nullable|string',
            'wali_kelas_id' => 'required|exists:gurus,id',
        ]);

        $raport->update($validated);

        return redirect()->route('raport.show', $raport->id)->with('success', 'Raport berhasil diperbarui');
    }

    // Print raport as PDF
    public function printPdf(Raport $raport)
    {
        $this->authorize('view', $raport);

        $nilaiSiswa = NilaiSiswa::where('siswa_id', $raport->siswa_id)
            ->with('guruBidang.bidang', 'guruBidang.guru')
            ->get();

        $pdf = Pdf::loadView('raport.pdf', compact('raport', 'nilaiSiswa'));
        
        $raport->update([
            'sudah_dicetak' => true,
            'tanggal_cetak' => now(),
        ]);

        return $pdf->download("Raport_{$raport->siswa->nama}_{$raport->semester}.pdf");
    }

    public function destroy(Raport $raport)
    {
        $this->authorize('delete', $raport);

        $raport->delete();
        return redirect()->route('raport.index')->with('success', 'Raport berhasil dihapus');
    }
}
