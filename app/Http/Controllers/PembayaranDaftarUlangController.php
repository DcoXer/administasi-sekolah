<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\PembayaranDaftarUlang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Helpers\QrCodeHelper;
use App\Exports\PembayaranDaftarUlangExport;
use App\Imports\PembayaranDaftarUlangImport;
use Maatwebsite\Excel\Facades\Excel;

class PembayaranDaftarUlangController extends Controller
{
    public function index()
    {
        $pembayaran = PembayaranDaftarUlang::with('siswa')->get();

        $jumlahSudah = $pembayaran->where('status', 'sudah_bayar')->count();
        $jumlahBelum = $pembayaran->where('status', 'belum_bayar')->count();

        $totalSudah = $pembayaran->where('status', 'sudah_bayar')->sum('nominal');
        $totalBelum = $pembayaran->where('status', 'belum_bayar')->sum('nominal');

        return view('keuangan.daftar-ulang.index', compact(
            'pembayaran',
            'jumlahSudah',
            'jumlahBelum',
            'totalSudah',
            'totalBelum'
        ));
    }


    public function create()
    {
        $kelas = Siswa::select('kelas')->distinct()->get();
        $siswa = Siswa::all();
        return view('keuangan.daftar-ulang.create', compact('kelas', 'siswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required|exists:siswas,id',
            'tahun' => 'required|digits:4',
            'nominal' => 'required|numeric',
        ]);

        PembayaranDaftarUlang::create([
            'nama_siswa' => $request->nama_siswa,  // ini ID siswa
            'tahun_ajaran' => $request->tahun,
            'nominal' => $request->nominal,
            'status' => $request->status
        ]);

        return redirect()->route('daftar-ulang.index')->with('success', 'Pembayaran berhasil disimpan.');
    }

    public function edit($id)
    {
        $data = PembayaranDaftarUlang::findOrFail($id);
        $siswa = Siswa::all();
        return view('keuangan.daftar-ulang.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'tahun_ajaran' => 'required',
            'nominal' => 'required|numeric',
            'tanggal_bayar' => 'nullable|date',
            'status' => 'required',
        ]);

        $data = PembayaranDaftarUlang::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('daftar-ulang.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = PembayaranDaftarUlang::findOrFail($id);
        $data->delete();

        return redirect()->route('daftar-ulang.index')->with('success', 'Data berhasil dihapus.');
    }
    public function preview($id)
    {
        $buktiDaftarUlang = PembayaranDaftarUlang::with('siswa')->findOrFail($id);

        $qrText = "Tanda Tangan Digital TU\n"
            . "Nama: Putri Amalia, S.Os\n"
            . "Jabatan: Staff Tata Usaha\n"
            . "Tanggal: " . now()->format('d M Y') . "\n"
            . "Kode Verifikasi: TU-DU-Darul-Hasan-" . now()->format('Ymd') . "-" . $buktiDaftarUlang->id;

        $qrCodeBase64 = QrCodeHelper::generateBase64($qrText);

        return view('keuangan.daftar-ulang.preview-daftar-ulang', compact('buktiDaftarUlang', 'qrCodeBase64'));
    }

    public function download($id)
    {
        $buktiDaftarUlang = PembayaranDaftarUlang::with('siswa')->findOrFail($id);

        $qrText = "Tanda Tangan Digital TU\n"
            . "Nama: Putri Amalia, S.Os\n"
            . "Jabatan: Staff Tata Usaha\n"
            . "Tanggal: " . now()->format('d M Y') . "\n"
            . "Kode Verifikasi: TU-DU-Darul-Hasan-" . now()->format('Ymd') . "-" . $buktiDaftarUlang->id;

        $qrCodeBase64 = QrCodeHelper::generateBase64($qrText);

        $pdf = Pdf::loadView('keuangan.daftar-ulang.download-daftar-ulang', compact('buktiDaftarUlang', 'qrCodeBase64'))
            ->setPaper('A4', 'landscape');

        return $pdf->download('bukti-pembayaran-daftar-ulang-' . $buktiDaftarUlang->siswa->nama . '.pdf');
    }

    public function export()
    {
        return Excel::download(new PembayaranDaftarUlangExport, 'pembayaran_daftar_ulang.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        Excel::import(new PembayaranDaftarUlangImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data daftar ulang berhasil diimport!');
    }
}
