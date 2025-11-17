<?php

namespace App\Http\Controllers;

use App\Models\GuruBidang;
use App\Models\NilaiSiswa;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    // Guru bidang can input grades for their subjects
    public function index()
    {
        $this->authorize('viewAny', NilaiSiswa::class);
        
        $user = auth()->user();
        $guru = $user->getGuruRecord();

        if (!$guru) {
            return redirect()->back()->with('error', 'Guru tidak ditemukan');
        }

        $guruBidangs = GuruBidang::where('guru_id', $guru->id)->with('bidang')->get();

        return view('nilai.index', compact('guruBidangs'));
    }

    public function inputNilai($guruBidangId)
    {
        $this->authorize('view', GuruBidang::class);

        $guruBidang = GuruBidang::with('bidang', 'guru')->findOrFail($guruBidangId);
        
        // Get students in this class
        $siswas = Siswa::where('kelas', $guruBidang->kelas)->get();
        
        // Get existing grades
        $nilais = NilaiSiswa::where('guru_bidang_id', $guruBidangId)->get();

        return view('nilai.input', compact('guruBidang', 'siswas', 'nilais'));
    }

    public function storeNilai(Request $request, $guruBidangId)
    {
        $this->authorize('create', NilaiSiswa::class);

        $guruBidangId = (int) $guruBidangId;

        $validated = $request->validate([
            'nilai.*.siswa_id' => 'required|exists:siswas,id',
            'nilai.*.nilai_tugas' => 'nullable|numeric|min:0|max:100',
            'nilai.*.nilai_uts' => 'nullable|numeric|min:0|max:100',
            'nilai.*.nilai_uas' => 'nullable|numeric|min:0|max:100',
            'nilai.*.catatan_guru' => 'nullable|string',
        ]);

        foreach ($validated['nilai'] as $nilaiData) {
            $nilaiSiswa = NilaiSiswa::firstOrCreate(
                [
                    'siswa_id' => $nilaiData['siswa_id'],
                    'guru_bidang_id' => $guruBidangId,
                ],
                [
                    'nilai_tugas' => $nilaiData['nilai_tugas'] ?? null,
                    'nilai_uts' => $nilaiData['nilai_uts'] ?? null,
                    'nilai_uas' => $nilaiData['nilai_uas'] ?? null,
                    'catatan_guru' => $nilaiData['catatan_guru'] ?? null,
                ]
            );

            // Calculate final grade if all values exist
            if ($nilaiData['nilai_tugas'] && $nilaiData['nilai_uts'] && $nilaiData['nilai_uas']) {
                $nilaiSiswa->calculateNilaiAkhir();
                $nilaiSiswa->save();
            }
        }

        return redirect()->back()->with('success', 'Nilai berhasil disimpan');
    }

    public function editNilai($nilaiId)
    {
        $nilai = NilaiSiswa::with('siswa', 'guruBidang.bidang', 'guruBidang.guru')->findOrFail($nilaiId);
        $this->authorize('view', $nilai);
        return view('nilai.edit', compact('nilai'));
    }

    public function updateNilai(Request $request, $nilaiId)
    {
        $nilai = NilaiSiswa::findOrFail($nilaiId);
        $this->authorize('update', $nilai);

        $validated = $request->validate([
            'nilai_tugas' => 'nullable|numeric|min:0|max:100',
            'nilai_uts' => 'nullable|numeric|min:0|max:100',
            'nilai_uas' => 'nullable|numeric|min:0|max:100',
            'catatan_guru' => 'nullable|string',
        ]);

        $nilai->update($validated);

        // Recalculate
        if ($validated['nilai_tugas'] && $validated['nilai_uts'] && $validated['nilai_uas']) {
            $nilai->calculateNilaiAkhir();
        }

        $nilai->save();

        return redirect()->back()->with('success', 'Nilai berhasil diperbarui');
    }
}
