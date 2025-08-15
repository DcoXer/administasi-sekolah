<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\PembayaranSpp;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Helpers\QrCodeHelper;

class PembayaranSppController extends Controller
{
    public function index()
    {
        $data = PembayaranSpp::with('siswa')->get();

        $jumlahSudah = $data->where('status', 'sudah')->count();
        $jumlahBelum = $data->where('status', 'belum')->count();
        $totalSudah = $data->where('status', 'sudah')->sum('jumlah');
        $totalBelum = $data->where('status', 'belum')->sum('jumlah');

        return view('keuangan.spp.index', compact(
            'data',
            'jumlahSudah',
            'jumlahBelum',
            'totalSudah',
            'totalBelum'
        ));
    }

    public function create()
    {
        $siswas = Siswa::all();
        return view('keuangan.spp.create', compact('siswas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'siswa_id'      => 'required|exists:siswas,id',
            'tahun'         => 'required|integer',
            'bulan'         => 'required|string',
            'jumlah'        => 'required|integer',
            'tanggal_bayar' => 'required|date',
            'status'        => 'required|in:sudah,belum',
        ]);

        PembayaranSpp::create($validated);

        return redirect()->route('pembayaran-spp.index')->with('success', 'Data berhasil disimpan.');
    }

    public function edit($id)
    {
        $pembayaranSpp = PembayaranSpp::findOrFail($id);
        $siswas = Siswa::all();

        return view('keuangan.spp.edit', compact('pembayaranSpp', 'siswas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bulan'         => 'required',
            'tahun'         => 'required|digits:4',
            'jumlah'        => 'required|numeric',
            'tanggal_bayar' => 'nullable|date',
            'status'        => 'required',
        ]);

        $data = PembayaranSpp::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('pembayaran-spp.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = PembayaranSpp::findOrFail($id);
        $data->delete();

        return redirect()->route('pembayaran-spp.index')->with('success', 'Data berhasil dihapus.');
    }

    public function preview($id)
    {
        $buktiSpp = PembayaranSpp::with('siswa')->findOrFail($id);

        $qrText = "Tanda Tangan Digital TU\n"
            . "Nama: Putri Amalia, S.Os\n"
            . "Jabatan: Staff Tata Usaha\n"
            . "Tanggal: " . now()->format('d M Y') . "\n"
            . "Kode Verifikasi: TU-MI-Darul-Hasan-" . now()->format('Ymd') . "-" . $buktiSpp->id;

        $qrCodeBase64 = QrCodeHelper::generateBase64($qrText);

        return view('keuangan.spp.preview-spp', compact('buktiSpp', 'qrCodeBase64'));
    }

    public function download($id)
    {
        $buktiSpp = PembayaranSpp::with('siswa')->findOrFail($id);

        $qrText = "Tanda Tangan Digital TU\n"
            . "Nama: Putri Amalia, S.Os\n"
            . "Jabatan: Staff Tata Usaha\n"
            . "Tanggal: " . now()->format('d M Y') . "\n"
            . "Kode Verifikasi: TU-MI-Darul-Hasan-" . now()->format('Ymd') . "-" . $buktiSpp->id;

        $qrCodeBase64 = QrCodeHelper::generateBase64($qrText);

        $pdf = Pdf::loadView('keuangan.spp.download-spp', compact('buktiSpp', 'qrCodeBase64'))
            ->setPaper('A4', 'landscape');

        return $pdf->download('bukti-pembayaran-spp-' . $buktiSpp->siswa->nama . '.pdf');
    }
}
