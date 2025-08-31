<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\PembayaranDaftarUlang;
use App\Models\PembayaranSpp;
use App\Models\Siswa;
use App\Models\Guru;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $totalSiswa = Siswa::count();
        $totalGuru = Guru::count();

        if ($user->role === 'staff_keuangan') {
            // 🔹 Hitung siswa per kelas (1-6)
            $siswaPerKelas = [];
            for ($i = 1; $i <= 6; $i++) {
                $siswaPerKelas[$i] = Siswa::where('kelas', $i)->count();
            }

            // === Daftar Ulang ===
            $duSudah = PembayaranDaftarUlang::where('status', 'sudah_bayar')->count();
            $duBelum = $totalSiswa - $duSudah;

            $duTotalSudah = PembayaranDaftarUlang::where('status', 'sudah_bayar')->sum('nominal');
            $duChart = collect([
                ['status' => 'Sudah Bayar', 'nominal' => $duSudah],
                ['status' => 'Belum Bayar', 'nominal' => $duBelum],
            ]);

            // === SPP ===
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

        if ($user->role === 'operator') {
            // 🔹 jumlah siswa per kelas
            $jumlahSiswa = Siswa::select('kelas')
                ->selectRaw('COUNT(*) as total')
                ->groupBy('kelas')
                ->pluck('total', 'kelas');

            // 🔹 jumlah guru per mapel
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

        // default buat role lain
        return view('dashboard', compact('user', 'totalSiswa', 'totalGuru'));
    }
}
