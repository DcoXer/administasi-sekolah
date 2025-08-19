<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\PembayaranDaftarUlang;
use App\Models\PembayaranSpp;
use App\Models\Siswa;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // Total siswa
        $totalSiswa = Siswa::count();

        if ($user->role === 'staff_keuangan') {

            // 🔹 Hitung siswa per kelas (1-6)
            $siswaPerKelas = [];
            for ($i = 1; $i <= 6; $i++) {
                $siswaPerKelas[] = Siswa::where('kelas', $i)->count();
            }

            // === Daftar Ulang ===
            $duSudah = PembayaranDaftarUlang::where('status', 'sudah_bayar')->count();
            $duBelum = $totalSiswa - $duSudah;

            $duTotalSudah = PembayaranDaftarUlang::where('status', 'sudah_bayar')->sum('nominal');
            $duChart = collect([
                ['status' => 'Sudah Bayar', 'nominal' => $duSudah],
                ['status' => 'Belum Bayar', 'nominal' => $duBelum],
            ]);

            /// === SPP ===
            $sppSudah = PembayaranSpp::where('status', 'sudah')->count();
            $sppBelum = $totalSiswa - $sppSudah;

            $sppTotalSudah = PembayaranSpp::where('status', 'sudah')->sum('jumlah');

            // Ambil data per bulan (isi semua 12 bulan, kalau ga ada → nol)
            $sppPerBulanRaw = PembayaranSpp::selectRaw('MONTH(tanggal_bayar) as bulan, SUM(jumlah) as total')
                ->where('status', 'sudah')
                ->groupByRaw('MONTH(tanggal_bayar)')
                ->orderByRaw('MONTH(tanggal_bayar)')
                ->pluck('total', 'bulan');

            // Generate data 12 bulan biar ga bolong
            $bulanIndo = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            $sppLabels = [];
            $sppData = [];

            foreach ($bulanIndo as $no => $nama) {
                $sppLabels[] = $nama;
                $sppData[] = $sppPerBulanRaw[$no] ?? 0;
            }

            return view('dashboard', compact(
                'user',
                'duSudah',
                'duBelum',
                'duTotalSudah',
                'duChart',
                'sppSudah',
                'sppBelum',
                'sppTotalSudah',
                'sppLabels',
                'sppData',
                'totalSiswa',
                'siswaPerKelas'
            ));
        }

        return view('dashboard', compact('user'));
    }
}
