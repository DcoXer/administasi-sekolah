<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\PembayaranDaftarUlang;
use App\Models\PembayaranSpp;
use App\Models\MutasiSiswa;
use App\Models\Siswa;
use App\Models\Guru;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $totalSiswa = Siswa::count();
        $totalGuru = Guru::count();

        // ================= STAFF KEUANGAN =================
        if ($user->hasRole('staff_keuangan')) {
            $siswaPerKelas = [];
            for ($i = 1; $i <= 6; $i++) {
                $siswaPerKelas[$i] = Siswa::where('kelas', $i)->count();
            }

            // Daftar Ulang
            $duSudah = PembayaranDaftarUlang::where('status', 'sudah_bayar')->count();
            $duBelum = $totalSiswa - $duSudah;
            $duTotalSudah = PembayaranDaftarUlang::where('status', 'sudah_bayar')->sum('nominal');
            $duChart = collect([
                ['status' => 'Sudah Bayar', 'nominal' => $duSudah],
                ['status' => 'Belum Bayar', 'nominal' => $duBelum],
            ]);

            // SPP
            $sppSudah = PembayaranSpp::where('status', 'sudah')->count();
            $sppBelum = $totalSiswa - $sppSudah;
            $sppTotalSudah = PembayaranSpp::where('status', 'sudah')->sum('jumlah');

            $sppPerBulanRaw = PembayaranSpp::selectRaw('EXTRACT(MONTH from tanggal_bayar) as bulan, SUM(jumlah) as total')
                ->where('status', 'sudah')
                ->groupByRaw('EXTRACT(MONTH from tanggal_bayar)')
                ->orderByRaw('EXTRACT(MONTH from tanggal_bayar)')
                ->pluck('total', 'bulan');

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

        // ================= OPERATOR =================
        if ($user->hasRole('operator')) {
            $jumlahSiswa = Siswa::select('kelas')
                ->selectRaw('COUNT(*) as total')
                ->groupBy('kelas')
                ->pluck('total', 'kelas');

            $jumlahGuru = Guru::select('mapel')
                ->selectRaw('COUNT(*) as total')
                ->groupBy('mapel')
                ->pluck('total', 'mapel');

            return view('dashboard', compact(
                'user',
                'totalSiswa',
                'jumlahSiswa',
                'jumlahGuru'
            ))->with([
                'jumlahSiswa' => $jumlahSiswa->toArray() ?? [],
                'jumlahGuru' => $jumlahGuru->toArray() ?? [],
            ]);
        }

        // ================= KEPALA MADRASAH (renamed from kepala_sekolah) =================
        if ($user->hasRole('kepala_madrasah')) {
            // 🔹 Import model MutasiSiswa (pastikan di atas file udah ada)
            // use App\Models\MutasiSiswa;

            // 🔹 Total mutasi
            $totalMutasi = MutasiSiswa::count();

            // 🔹 Detail per status
            $totalMutasiMenunggu = MutasiSiswa::where('status', 'pending')->count();
            $totalMutasiDisetujui = MutasiSiswa::where('status', 'disetujui')->count();
            $totalMutasiDitolak = MutasiSiswa::where('status', 'ditolak')->count();

            // 🔹 Data grafik per kelas
            $kelasTersedia = Siswa::select('kelas')->distinct()->pluck('kelas');
            $grafikKelas = [];
            foreach ($kelasTersedia as $kelas) {
                $grafikKelas[$kelas] = Siswa::where('kelas', $kelas)->count();
            }

            // 🔹 Data keuangan
            $totalSPPSudah = PembayaranSpp::where('status', 'sudah')->sum('jumlah');
            $totalDU = PembayaranDaftarUlang::where('status', 'sudah_bayar')->sum('nominal');

            $kelasTersedia = Siswa::select('kelas')->distinct()->pluck('kelas');
            $grafikKelas = [];
            foreach ($kelasTersedia as $kelas) {
                $grafikKelas[$kelas] = Siswa::where('kelas', $kelas)->count();
            }

            return view('dashboard', compact(
                'user',
                'totalMutasi',
                'totalMutasiMenunggu',
                'totalMutasiDisetujui',
                'totalMutasiDitolak',
                'totalSiswa',
                'totalGuru',
                'totalSPPSudah',
                'totalDU',
                'grafikKelas'
            ));
        }

        // ================= DEFAULT (jaga-jaga) =================
        return view('dashboard', compact('user', 'totalSiswa', 'totalGuru'));
    }
}
